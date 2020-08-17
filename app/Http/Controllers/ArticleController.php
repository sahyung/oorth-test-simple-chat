<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    function index(Request $request) {
        $page = $request->query('page') ? $request->query('page') : 1;
        $limit = $request->query('limit') ? $request->query('limit') : 10;
        $offset = $page * $limit - $limit;
        $client = new Client();
        $response = $client->request('GET', env('BASE_API_URL') . "/articles?offset=$offset&limit=$limit");
        // $response = $client->request('GET', 'https://conduit.productionready.io/api' . "/articles?offset=$offset&limit=$limit");
        $statusCode = $response->getStatusCode();
        $body = json_decode($response->getBody()->getContents());
        if ($statusCode === 200) {
            $data['articles'] = $body->articles;
            $data['articlesCount'] = $body->articlesCount;
            $data['pageCount'] = ceil($body->articlesCount / $limit);
            $data['pageCurrent'] = $page;
        }

        return view('articles')->with($data);
    }
}
