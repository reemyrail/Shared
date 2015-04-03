<?php
/**
 * ZfcUser Configuration
 *
 * If you have a ./config/autoload/ directory set up for your project, you can
 * drop this config file in it and change the values as you wish.
 */
$settings = array(

    /**
     * Email Address that will appear in the 'From' of outbound emails
     *
     * Default: empty
     */
    'email_from_address' => 'adamlundrigan@cdli.ca',

    /**
     * Subject line of the email address verification message which is
     * sent out when a user enters their email address in Step 1
     *
     * Default: 'Email Address Verification'
     */
    //'verification_email_subject_line' => 'Email Address Verification',

);


/**
 * You do not need to edit below this line
 */
return array(
    'cdli-twostagesignup' => $settings,
);
