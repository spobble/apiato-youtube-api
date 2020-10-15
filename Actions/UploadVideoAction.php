<?php

namespace App\Containers\YoutubeApi\Actions;

use App\Containers\Club\UI\WEB\Requests\GetRefreshTokenRequest;
use App\Ship\Parents\Actions\Action;
use Apiato\Core\Foundation\Facades\Apiato;
use Illuminate\Support\Facades\Session;
use Google_Service_Exception;
use Google_Service_YouTube;

/**
 * Class UploadVideoAction
 *
 * @author  Andrea Civita <andreacivita994@gmail.com>
 */
class UploadVideoAction extends Action
{
    /**
     * @return mixed
     */
    public function run($code)
    {
        $client = Apiato::call("YoutubeApi@GenerateClientTask");

        $client->setAccessToken($client->fetchAccessTokenWithAuthCode($code));

        $this->service = new Google_Service_YouTube($client);

        $videoData = Session::get('video-data')->toArray();

        $video = Apiato::call("YoutubeApi@GenerateGoogleVideoTask",[$videoData]);

        $response = "";

        try {
            $response = $this->service->videos->insert(
                'snippet',
                $video,
                array(
                    'data' => file_get_contents(asset($videoData['path'])),
                    'mimeType' => 'application/octet-stream',
                    'uploadType' => 'multipart'
                )
            );
        } catch (Google_Service_Exception $e) {
            echo "[{$e->getCode()}] {$e->getMessage()}";
        }
        return $response;
    }
}
