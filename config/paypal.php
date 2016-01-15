<?php
return array(
    // set your paypal credential
    'client_id' => 'AXkcdMawBDBXsFjYsU_qIA9mC82hYhLYNxBAVb0iy92pzm_BPOj-ZNE6ecw1NAU3QmcdLlov45IDhEOy',
    'secret'    => 'EJjh4c1UPZVONbUjk2i2gSrL4KXFfdkjDUYOEF8sUR_oTQthgkRjQpmTqAcDyaZv7TmvnTx8OYWdUAAm',

    /**
     * SDK configuration
     */
    'settings' => array(
        /**
         * Available option 'sandbox' or 'live'
         */
        'mode' => 'sandbox',

        /**
         * Specify the max request time in seconds
         */
        'http.ConnectionTimeOut' => 30,

        /**
         * Whether want to log to a file
         */
        'log.LogEnabled' => true,

        /**
         * Specify the file that want to write on
         */
        'log.FileName' => storage_path() . '/logs/paypal.log',

        /**
         * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
         *
         * Logging is most verbose in the 'FINE' level and decreases as you
         * proceed towards ERROR
         */
        'log.LogLevel' => 'FINE'
    ),
);