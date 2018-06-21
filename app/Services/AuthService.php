<?php

namespace App\Services;

use GuzzleHttp\Client;

class AuthService
{
    private $client_id;
    private $client_secret;

    public function __construct()
    {
        $this->client_id = config('apibase.passwordgrant_client_id');
        $this->client_secret = config('apibase.passwordgrant_client_secret');
    }

    /**
     * Attempt to create an access token using user credentials
     *
     * @param string $email
     * @param string $password
     * @return bool|mixed|\Psr\Http\Message\ResponseInterface
     */
    public function attemptLogin($email, $password)
    {
        $http = new Client;

        try {
            $response = $http->post(url('/') . '/oauth/token', [
                'form_params' => [
                    'grant_type' => 'password',
                    'client_id' => $this->client_id,
                    'client_secret' => $this->client_secret,
                    'username' => $email,
                    'password' => $password,
                    'scope' => '',
                ],
            ]);

            $response = json_decode((string)$response->getBody(), true);

            return $response;

        } catch (\Exception $exception) {
            report($exception);
            return false;
        }
    }

    /**
     * Attempt to refresh the access token used a refresh token that
     * has been saved in a cookie
     */
    public function attemptRefresh()
    {

    }


    /**
     * Logs out the user. We revoke access token and refresh token.
     * Also instruct the client to forget the refresh cookie.
     */
    public function logout()
    {

    }
}