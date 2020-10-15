# Apiato Youtube Api

Apiato container for managing **Youtube Data Api**. This container has been developed for internal usage and covers only 1 scopes: upload-video on Youtube. 


**Attention:** All others scope must be implemented, so feel free to submit a pull request :)

**EXTRA-ATTENTION**: When you're creating credential.json file from google-console, you **need** to setup redirect_uri to => "https://yoursite.ext/youtube/callback". In this way, you will fire Container callback that manage all upload


## Setup

### Installation

For installing this container, simply run

```
composer require spobble/apiato-youtube-api
```

### Configuring env file

You need to configurate .env files with data from credential json file

```env
YOUTUBE_PROJECT_ID = project-id
YOUTUBE_CLIENT_ID = client-id
YOUTUBE_CLIENT_SECRET = client-secret 
REDIRECT_URI = redirect-uri
```

Perfect! Container is ready to be used!


### Usage

Usage is quite simple! To keep video, you can simply add it to a session (save to storage and session the path), named "video-data". In this way, container will get video and data from session and upload it to youtube.


Usage is divided in two parts: generating authentication form & getting accessToken.

Before starting container, save video in session like:

```php
Session::put('video-data', collect($videoData));

$link = \Apiato\Core\Foundation\Facades\Apiato::call('YoutubeApi@GenerateOAuthLoginAction');

return redirect($link);

```

Above code will session video's data (title, path/to/file) and request a link to OAuth2 Login.

Done this you've finished. Callback will start and upload video to your account.
