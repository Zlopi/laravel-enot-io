<?php

return [

    /*
     * Project`s id
     */
    'project_id' => env('ENOTIO_PROJECT_ID', ''),

    /*
     * First project`s secret key
     */
    'secret_key' => env('ENOTIO_SECRET_KEY', ''),

    /*
     * Second project`s secret key
     */
    'secret_key_second' => env('ENOTIO_SECRET_KEY_SECOND', ''),

    /*
     * Allowed currenc'ies https://enot.io/knowledge/first-payment#pay_form
     *
     * If currency = null, that parameter doesn`t be setted
     */
    'currency' => null,

    /*
     *  SearchOrder
     *  Search order in the database and return order details
     *  Must return array with:
     *
     *  _orderStatus
     *  _orderSum
     */
    'searchOrder' => null, //  'App\Http\Controllers\EnotIoController@searchOrder',

    /*
     *  PaidOrder
     *  If current _orderStatus from DB != paid then call PaidOrderFilter
     *  update order into DB & other actions
     */
    'paidOrder' => null, //  'App\Http\Controllers\EnotIoController@paidOrder',

    /*
     * Customize error messages
     */
    'errors' => [
        'validateOrderFromHandle' => 'Validate Order Error',
        'searchOrder' => 'Search Order Error',
        'paidOrder' => 'Paid Order Error',
    ],

    /*
     * Url to init payment on EnotIo
     * https://enot.io/knowledge/first-payment#pay_form
     */
    'pay_url' => 'https://enot.io/pay',

    /*
     * URL where to redirect the user after successful payment.
     * (If empty, the value is taken from the store settings.
     *  This parameter is in priority for redirection)
     */
    'success_url' => null,
    /*
     * URL where to redirect the user after error payment.
     * (If empty, the value is taken from the store settings.
     *  This parameter is in priority for redirection)
     */
    'fail_url' => null,

    /*
    * URL api.enot.io
    */
    'api_url' => 'https://api.enot.io',
];
