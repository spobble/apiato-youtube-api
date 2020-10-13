<?php

namespace App\Containers\YoutubeApi\Actions;

use App\Ship\Parents\Actions\Action;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class UploadVideoAction
 *
 * @author  Andrea Civita <andreacivita994@gmail.com>
 */
class GenerateOAuthLoginAction extends Action
{

    public function run()
    {
        $refreshToken = "";

        $client = Apiato::call("YoutubeApi@GenerateClientTask");

        return $client->createAuthUrl();

    }
}
