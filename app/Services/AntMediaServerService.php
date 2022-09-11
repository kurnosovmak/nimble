<?php


namespace App\Services;


use App\Http\Requests\Stream\StoreRequest;
use App\Models\Stream;
use App\Models\UserStreamKey;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AntMediaServerService extends Service
{
    // todo create config
    const ANT_MEDIA_SERVER_URL = 'http://89.22.229.228:5080/TestApp/rest/v2';


    public function __construct()
    {
    }


    /**
     * @param string $name
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function generateStreamKey(string $name): string
    {
        $client = new Client();

        $res = $client->request('POST', self::ANT_MEDIA_SERVER_URL . '/broadcasts/create');

        if ($res->getStatusCode() !== 200) {
            throw new \Exception('Ant media server broadcasts create error');
        }

        return json_decode($res->getBody())->streamId;
    }

    /**
     * @param string $key
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getStream(string $key)
    {
        $client = new Client();

        $res = $client->request('GET', self::ANT_MEDIA_SERVER_URL . '/broadcasts/' . $key);

        if ($res->getStatusCode() !== 200) {
            throw new \Exception('Ant media server broadcasts create error');
        }

        return json_decode($res->getBody());
    }
}
