<?php

namespace App\Containers\YoutubeApi\Tasks;

use App\Ship\Parents\Tasks\Task;
use Illuminate\Support\Facades\Config;
use Google_Client;
use Google_Exception;

/**
 * Class CountAllUsersTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class GenerateClientTask extends Task
{
    protected Google_Client $client;

    protected array $apiKey;

    /**TODO: ADD Exception if config is not configured **/
    /**TODO: Add check for auth with json file **/

    /**
     * GenerateClientTask constructor.
     * @param Google_Client $client
     */
    public function __construct(Google_Client $client)
    {
        $this->client = $client;

        $this->apiKey = [
            'application' => Config::get("youtube-api.project_id"),
            'redirectUri' => Config::get("youtube-api.redirect_uri"),
            'client-id' => Config::get("youtube-api.client_id"),
            'client-secret' => Config::get("youtube-api.client_secret")
        ];

    }


    /**
     * Genera il link per l'autenticazione Oauth2
     * @return Google_Client client configurato
     */
    public function run() : Google_Client
    {
        $this->client->setApplicationName($this->apiKey['application']);
        $this->client->setScopes([
            'https://www.googleapis.com/auth/youtube.upload',
        ]);
        $this->client->setRedirectUri(url('/youtube/callback'));
        try {
            $this->client->setClientId($this->apiKey['client-id']);
            $this->client->setClientSecret($this->apiKey['client-secret']);
        } catch (Google_Exception $e) {
            echo "Authentication failed <br>";
            echo $e->getMessage();
        }
        $this->client->setAccessType('offline');

        return $this->client;
    }
}
