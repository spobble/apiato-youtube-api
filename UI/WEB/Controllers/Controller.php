<?php

namespace App\Containers\YoutubeApi\UI\WEB\Controllers;

use App\Ship\Parents\Controllers\WebController;
use Google_Client;


class Controller extends WebController
{
    public function index()
    {
        $client = new Google_Client();
        $client->setApplicationName('Vanda Spobble');
        $client->setScopes([
            'https://www.googleapis.com/auth/youtube.upload',
        ]);

        try {
            $client->setAuthConfig(base_path("vandakey.json"));
        } catch (\Google_Exception $e) {
            $message = "Auth config non riuscito";
            return view('youtubeapi::index')->with('message',$message)->with('exception',$e->getMessage());
        }
        $client->setAccessType('offline');

        $link = "<a class='btn btn-primary' href='{$client->createAuthUrl()}'>Login</a>";
        return view('youtubeapi::index',[
            'link' => $link
        ]);
    }

}
