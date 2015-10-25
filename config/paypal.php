<?php
return array(
    // set your paypal credential
    'client_id' => 'AaUGEP49DpUI7z_M6YRDRB1boYHJ7YdEtJLPikM9j3eVkrlTdacADIVQWrhX7_RYSOtW0xCGSFVoWkch',
    'secret'    => 'EJRp4tuCxWElQ0oNSs81afgK5UbDh6DimVyQ2gEEjiYuWyyg5dldcf7nGsDtUuhA2KdEF2T_Dy4TD3hs',
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