<?php

namespace App\Containers\YoutubeApi\UI\WEB\Controllers;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Parents\Controllers\WebController;
use App\Ship\Transporters\DataTransporter;

use App\Containers\Club\UI\WEB\Requests\GetRefreshTokenRequest;

class Controller extends WebController
{
    public function index()
    {
        $link = Apiato::call('YoutubeApi@GenerateOAuthLoginAction');

        return redirect($link);
    }

    public function callback()
    {
        if(isset($_REQUEST['code']))
        $result = Apiato::call('YoutubeApi@UploadVideoAction',[$_REQUEST['code']]);

        print_r($result); die;
    }
}
