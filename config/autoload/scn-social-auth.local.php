<?php
/**
 * ScnSocialAuth Configuration
 *
 * If you have a ./config/autoload/ directory set up for your project, you can
 * drop this config file in it and change the values as you wish.
 */
$settings = array(
    /**
     * Facebook Client ID
     *
     * Please specify a Facebook Client ID
     */
    //'facebook_client_id' => 'your-client-id',

    /**
     * Facebook Secret
     *
     * Please specify a Facebook Secret
     */
    //'facebook_secret' => 'your-secret',

    /**
     * Foursquare Client ID
     *
     * Please specify a Foursquare Client ID
     */
    //'foursquare_client_id' => 'your-client-id',

    /**
     * Foursquare Secret
     *
     * Please specify a Foursquare Secret
     */
    //'foursquare_secret' => 'your-secret',

    /**
     * Github Client ID
     *
     * Please specify a Github Client ID
     */
    //'github_client_id' => 'your-client-id',

    /**
     * Github Secret
     *
     * Please specify a Github Secret
     */
    //'github_secret' => 'your-secret',

    /**
     * Google Client ID
     *
     * Please specify a Google Client ID
     */
    //'google_client_id' => 'your-client-id',

    /**
     * Google Secret
     *
     * Please specify a Google Secret
     */
    //'google_secret' => 'your-secret',

    /**
     * Google Hosted Domain
     *
     * OPTIONAL: Limit Google logins to a specific hosted domain (Google Apps)
     */
    //'google_hd' => 'your-domain.tld',

    /**
     * LinkedIn Client ID
     *
     * Please specify a LinkedIn Client ID
     */
    //'linkedIn_client_id' => 'your-client-id',

    /**
     * LinkedIn Secret
     *
     * Please specify a LinkedIn Secret
     */
    //'linkedIn_secret' => 'your-secret',

    /**
     * Twitter Consumer Key
     *
     * Please specify a Twitter Consumer Key
     */
    //'twitter_consumer_key' => 'your-consumer-key',

    /**
     * Twitter Secret
     *
     * Please specify a Twitter Consumer Secret
     */
    //'twitter_consumer_secret' => 'your-consumer-secret',

    /**
     * Yahoo! Client ID
     *
     * Please specify a Yahoo! Client ID
     */
    //'yahoo_client_id' => 'your-client-id',

    /**
     * Yahoo! Secret
     *
     * Please specify a Yahoo! Secret
     */
    //'yahoo_secret' => 'your-secret',

    /**
     * tumblr Consumer Key
     *
     * Please specify a tumblr Consumer Key
     */
    //'tumblr_consumer_key' => 'your-consumer-key',

    /**
     * tumblr Secret
     *
     * Please specify a tumblr Consumer Secret
     */
    //'tumblr_consumer_secret' => 'your-consumer-secret',

    /**
     * Mailru Client ID
     *
     * Please specify a Mailru Client ID
     */
    //'mailru_client_id' => 'your-client-id',

    /**
     * Mailru Secret
     *
     * Please specify a Mailru Secret
     */
    //'mailru_secret' => 'your-secret',

    /**
     * Vkontakte Application ID
     *
     * Please specify a Vkontakte Application ID
     */
    //'vkontakte_app_id' => 'your-app-id',

    /**
     * Vkontakte Secret
     *
     * Please specify a Vkontakte Secret
     */
    //'vkontakte_secret' => 'your-secret',

    /**
     * Yandex Application ID
     *
     * Please specify a Yandex Application ID
     */
    //'yandex_app_id' => 'your-app-id',

    /**
     * Yandex Secret
     *
     * Please specify a Yandex Secret
     */
    //'yandex_secret' => 'your-secret',

    /**
     * Odnoklassniki Client ID
     *
     * Please specify a Odnoklassniki Application ID
     */
    //'odnoklassniki_app_id' => 'your-app-id',

    /**
     * Odnoklassniki Public Key
     *
     * Please specify a Odnoklassniki Public Key
     */
    //'odnoklassniki_key' => 'your-public-key',

    /**
     * Odnoklassniki Secret
     *
     * Please specify a Odnoklassniki Secret
     */
    //'odnoklassniki_secret' => 'your-secret',

    /**
     * Instagram Client ID
     *
     * Please specify a Instagram Client ID
     */
    //'instagram_client_id' => 'your-client-id',

    /**
     * Instagram Client Secret
     *
     * Please specify a Instagram Client Secret
     */
    //'instagram_client_secret' => 'your-client-secret',

    /**
     * To enable Logging, set debug_mode to true,
     * then provide a path of a writable file on debug_file on your configuration file
     *
     * Default: false
     * Accepted Values: boolean (true or false)
     * 
     * @see http://hybridauth.sourceforge.net/userguide/Debugging_and_Logging.html
     */
    // 'debug_mode' => false,

    /**
     * To enable Logging, set debug_mode to true,
     * then provide a path of a writable file on debug_file on your configuration file or hash
     *
     * Default: "/tmp/hybridauth.log"
     * Accepted Values: string
     * 
     * @see http://hybridauth.sourceforge.net/userguide/Debugging_and_Logging.html
     */
    // 'debug_file' => "/tmp/hybridauth.log",

    /**
     * End of ScnSocialAuth configuration
     */
);

/**
 * You do not need to edit below this line
 */
return array(
    'scn-social-auth' => $settings,
);
