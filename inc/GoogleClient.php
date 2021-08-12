<?php
require WP_PLUGIN_DIR . '/Kittle Map/vendor/autoload.php';

function getGoogleClient()
{
    $client = new Google_Client();
    $client->setAuthConfig(WP_PLUGIN_DIR . '/Kittle Map/credentials.json');
    $client->setScopes(Google_Service_Sheets::SPREADSHEETS);
    $client->setAccessType('offline');
    $client->setApprovalPrompt('force');

    $credentialsPath = WP_PLUGIN_DIR . '/Kittle Map/credentials.json';
    $tokenPath       = WP_PLUGIN_DIR . '/Kittle Map/token.json';

    if (file_exists($tokenPath)) {
        $accessToken = json_decode(file_get_contents($tokenPath), true);
        $client->setAccessToken($accessToken);
    }

    if ($client->getRefreshToken()) {
        $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());

        // Save the token to a file
        if (!file_exists(dirname($tokenPath))) {
            mkdir(dirname($tokenPath), 0700, true);
        }

        file_put_contents($tokenPath, json_encode($client->getAccessToken()));
    }

    // // If there is no previous token or it's expired.
    // if ($client->isAccessTokenExpired()) {
    //     // Refresh the token if possible, else fetch a new one.
    //     if ($client->getRefreshToken()) {
    //         $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
    //     } else {
    //         // Request authorization from the user.
    //         $authUrl = $client->createAuthUrl();
    //         printf("Open the following link in your browser:\n%s\n", $authUrl);
    //         print 'Enter verification code: ';
    //         $authCode = trim(fgets(STDIN));

    //         // Exchange authorization code for an access token.
    //         $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
    //         $client->setAccessToken($accessToken);

    //         // Check to see if there was an error.
    //         if (array_key_exists('error', $accessToken)) {
    //             throw new Exception(join(', ', $accessToken));
    //         }
    //     }
    //     // Save the token to a file.
    //     if (!file_exists(dirname($tokenPath))) {
    //         mkdir(dirname($tokenPath), 0700, true);
    //     }
    //     file_put_contents($tokenPath, json_encode($client->getAccessToken()));
    // }
    return $client;
}
