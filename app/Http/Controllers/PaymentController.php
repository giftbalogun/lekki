<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use \Carbon\Carbon;
use App\User;
use App\TutorApplication;
use App\Package;
use App\State;
use App\Lga;
use App\TutorRequest;
use App\Payment;
use App\Subscription;
use Paystack;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    //

    public function showCheckout(Request $request)
    {
        $states = State::all(['id','name']);
        $tutor = User::find(session('tutor'));
        $package = Package::find(session('tutorial_package'));
        if (is_null($tutor) || is_null($package)) {
            return redirect(route('select-tutor'));
        } else if (!$tutor->hasRole('tutor')) {
            return redirect(route('select-tutor'));
        }
        return view('checkout')->with('tutor', session('tutor'))->with('package', session('tutorial_package'))->with('states', $states);
    }

    public function packagePaymentRedirectToGateway(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email',
            'amount' => 'required|numeric',
            'tutor' => 'required',
            'package' => 'required',
            'state' => 'required|numeric',
            'lga' => 'required|numeric',
            'durationKind' => 'required|string',
            'durationValue' => 'required|numeric',
            'reference' => 'required',
            'key' => 'required',
            'start_date' => 'required'
        ]);

        $startDate = new Carbon($request->start_date);
        $today = Carbon::now();
        if (!$startDate->gt($today)) {
            return back()->with('error','Error! Choose a date greater than today.');
        }
        $packageId = session('tutorial_package');
        $package = Package::find($packageId);
        $pricing = $package->getPackagePricing($request->lga,$request->state);
        //validate price here
        if ($pricing == NULL) {
            return back()->with('error','Error occurred, Please refresh the page and try again');
        }
        $unitPrice = $pricing[$request->durationKind];
        $requiredPrice = $unitPrice * $request->durationValue * 100;
        if ($requiredPrice != $request->amount) {
            return back()->with('error','Error occurred, Please refresh the page and try again');
        }

        $metadata = [
            "tutor" => $request->tutor,
            "package" => $request->package,
            "start_date" => $request->start_date,
            "durationKind" => $request->durationKind,
            "durationAmount" => $request->durationValue,
            "state" => $request->state,
            "lga" => $request->lga
        ];
        $request->metadata = json_encode($metadata);
        return Paystack::getAuthorizationUrl()->redirectNow();
    }

    public function paymentCallback(Request $request)
    {
        $paymentDetails = Paystack::getPaymentData();
        //security check to prevent recompiling payment already made
        $pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';
        if ($pageWasRefreshed ) {
            return redirect(route('select-tutor'))->with('success','Successful Payment');
        }
        //get tutor, package, duration, duration unit and start daate
        $tutorId = $paymentDetails['data']['metadata']['tutor'];
        $packageId = $paymentDetails['data']['metadata']['package'];
        $startDate = $paymentDetails['data']['metadata']['start_date'];
        $stateId = $paymentDetails['data']['metadata']['state'];
        $lgaId = $paymentDetails['data']['metadata']['lga'];
        $durationType = $paymentDetails['data']['metadata']['durationKind'];
        $durationAmount = $paymentDetails['data']['metadata']['durationAmount'];
        //get objects from ID
        $package = Package::find($packageId);
        $state = State::find($stateId);
        $lga = Lga::find($lgaId);
        $startDate = new Carbon($startDate);
        $cloneOfStart = clone $startDate; //this is to create end date without affecting start
        switch ($durationType) {
            case "month":
                $endDate = $cloneOfStart->addMonths($durationAmount);
                break;
            case "hour":
                $endDate = $cloneOfStart->addHours($durationAmount);
                break;
            default:
                $endDate = $cloneOfStart->addMonths($durationAmount);
        }

        //populate payment table
        $payment = new Payment;
        $payment->fill([
            'user_id' => Auth::user()->id,
            'payment_for' => $package->name . " Package",
            'payment_details' => $package->name. " package in " . $lga->name . ", " . $state->name,
            'payment_status' => $paymentDetails['data']['status'],
            'payment_via' => 'Paystack',
            'reference' => $paymentDetails['data']['reference'],
            'amount' => $paymentDetails['data']['amount'] / 100,
            'paid_at' => $paymentDetails['data']['paid_at'],
            'payment_id' => $paymentDetails['data']['id'],
            'ip_address' => $paymentDetails['data']['ip_address'],
            'attempts' => $paymentDetails['data']['log']['attempts'],
            'channel' => $paymentDetails['data']['channel'],
            'currency' => $paymentDetails['data']['currency'],
            'fees' => $paymentDetails['data']['fees'] / 100,
            'customer_email' => $paymentDetails['data']['customer']['email'],
            'customer_code' => $paymentDetails['data']['customer']['customer_code'],
            'customer_risk_action' => $paymentDetails['data']['customer']['risk_action'],
            'payment_date' => $paymentDetails['data']['transaction_date']
        ]);
        $payment->save();
        //populate tutor requests table
        $tutorRequest = TutorRequest::create([
            'client_id' => Auth::user()->id,
            'tutor_id' => $tutorId,
            'package_id' => $packageId,
            'duration_type' => $durationType,
            'duration_amount' => $durationAmount
        ]);
        //populate subscription table
        Subscription::create([
            'user_id' => Auth::user()->id,
            'tutor_id' => $tutorId,
            'tutor_request_id' => $tutorRequest->id,
            'start' => $startDate,
            'end' => $endDate
        ]);
        return redirect(route('select-tutor'))->with('success','Successful Payment');
    }
}