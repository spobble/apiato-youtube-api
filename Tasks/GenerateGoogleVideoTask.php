<?php

namespace App\Containers\YoutubeApi\Tasks;

use App\Ship\Parents\Tasks\Task;
use Google_Client;
use Google_Exception;
use Google_Service_YouTube_Video;
use Google_Service_YouTube_VideoSnippet;

/**
 * Class CountAllUsersTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class GenerateGoogleVideoTask extends Task
{
    protected Google_Service_YouTube_Video $video;
    protected Google_Service_YouTube_VideoSnippet $snippet;


    public function __construct(Google_Service_YouTube_Video $video, Google_Service_YouTube_VideoSnippet $snippet)
    {
        $this->video = $video;
        $this->snippet = $snippet;
    }


    public function run(array $videoData)
    {
        $this->snippet->setTitle($videoData['title']);
        $this->video->setSnippet($this->snippet);

        return $this->video;
    }
}
