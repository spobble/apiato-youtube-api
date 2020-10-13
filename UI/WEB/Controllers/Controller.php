<?php

namespace App\Containers\YoutubeApi\UI\WEB\Controllers;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Parents\Controllers\WebController;
use App\Ship\Transporters\DataTransporter;

class Controller extends WebController
{
    public function index()
    {
        $link = Apiato::call('YoutubeApi@GenerateOAuthLoginAction');

        return redirect($link);
    }
}
