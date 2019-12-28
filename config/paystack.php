<?php

/*
 * This file is part of the Laravel Paystack package.
 *
 * (c) Prosper Otemuyiwa <prosperotemuyiwa@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

return [

    /**
     * Public Key From Paystack Dashboard
     *
     */
    'publicKey' => env('PAYSTACK_PUBLIC_KEY','pk_test_66d3966f37c5dd2252248fcc6df0c230ec7e60bb'),

    /**
     * Secret Key From Paystack Dashboard
     *
     */
    'secretKey' => env('PAYSTACK_SECRET_KEY','sk_test_c86e5e9720977df09b886aebd8496e7ce2701735'),

    /**
     * Paystack Payment URL
     *
     */
    'paymentUrl' => env('PAYSTACK_PAYMENT_URL','https://api.paystack.co'),

    /**
     * Optional email address of the merchant
     *
     */
    'merchantEmail' => env('MERCHANT_EMAIL','fanan.dala@stu.cu.edu.ng'),

];
