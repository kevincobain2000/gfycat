<?php
namespace kevincobain2000;

use Requests;

class Gfycat
{
    public function __construct($clientId, $clientSecret)
    {
        $this->initConfig();

        $this->clientId     = $clientId;
        $this->clientSecret = $clientSecret;
    }
    private function initConfig()
    {
        // todo: optionally read a config file
        return $this->config = [
            'api'                  => 'https://api.gfycat.com/v1',
        ];
    }

    public function search($query)
    {
        $api = $this->config['api'] . '/gfycats/search?search_text=' . $query;
        $access_token = $this->getOauthToken();

        $headers = [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $access_token
        ];

        $params = [];

        $request = Requests::get($api, $headers, $params);
        return json_decode($request->body, true);
    }

    public function get($gifyid)
    {
        $api = $this->config['api'] . '/gfycats/' . $gifyid;
        $access_token = $this->getOauthToken();

        $headers = [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $access_token
        ];

        $params = [];

        $request = Requests::get($api, $headers, $params);
        return json_decode($request->body, true);
    }

    public function getOauthToken()
    {
        $api = $this->config['api'] . '/oauth/token';

        $headers = ['Accept' => 'application/json'];
        $params = json_encode([
                    'client_id'      => $this->clientId,
                    'client_secret'  => $this->clientSecret,
                    'grant_type'     => 'client_credentials',
                ]);


        $request = Requests::post($api, $headers, $params);
        $arr = json_decode($request->body, true);
        return $arr['access_token'];
    }
}
