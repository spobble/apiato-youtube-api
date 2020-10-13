<?php

namespace App\Containers\User\Tasks;


use App\Ship\Parents\Tasks\Task;
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
            'application' => config("youtube-api-container.project_id"),
            'redirectUri' => config("youtube-api-container.redirect_uri"),
            'client-id' => config("youtube-api-container.client_id"),
            'client-secret' => config("youtube-api-container.client_secret")
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
        $this->client->setRedirectUri($this->apiKey['redirectUri']);
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
