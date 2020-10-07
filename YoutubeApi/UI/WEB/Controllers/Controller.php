<?php

namespace App\Containers\YoutubeApi\UI\WEB\Controllers;

use App\Ship\Parents\Controllers\WebController;


class Controller extends WebController
{
    public function index()
    {
        return view('youtubeapi::index')
    }

}
