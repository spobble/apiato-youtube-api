<?php

return [

    /*
   |--------------------------------------------------------------------------
   | YoutubeApi Configuration File
   |--------------------------------------------------------------------------
   |
   | This file manage all youtube_api credentials configuration.
   | If you provide credential.json path, all data will be taken from file.
   | If you do not provide credential.json file, you will have to set in env file all configurations
   |
   */

    'credential_json' => env('YOUTUBE_CREDENTIAL_JSON_PATH', false),

    /*
     * Project ID. If not provided, is setted to null
     */
    'project_id' => env('YOUTUBE_PROJECT_ID', null),

    /*
     * Client ID. If not provided, is setted to null
     */
    'client_id' => env('YOUTUBE_CLIENT_ID', null),

    /*
     * Client SECRET. If not provided, is setted to null
     */
    'client_secret' => env('YOUTUBE_CLIENT_SECRET', null),

    /*
     * Setting redirect_uri, you are providing url to redirect after Oauth2 Login
     * redirect_uri must be identical to uri provided to google.
     */
    'redirect_uri' => env('REDIRECT_URI', null),


    /*
     * Setting redirect_uri, you are providing authorized Javascript Origin
     * javascript_origins must be identical to uri provided to google.
     */
    'javascript_origins' => env('JAVASRIPT_ORIGIN', null),

];
