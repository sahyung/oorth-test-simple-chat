<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    function index(Request $request) {
        $offset = $request->query('offset') ? $request->query('offset') : "0";
        $limit = $request->query('limit') ? $request->query('limit') : "10";
        $client = new Client();
        $response = $client->request('GET', env('BASE_API_URL') . "/articles?offset=$offset&limit=$limit");
        // $response = $client->request('GET', 'https://conduit.productionready.io/api' . "/articles?offset=$offset&limit=$limit");
        $statusCode = $response->getStatusCode();
        $body = json_decode($response->getBody()->getContents());
        if ($statusCode === 200) {
            $data['articles'] = $body->articles;
        }

        return view('articles')->with($data);
    }
}
