<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = json_decode(file_get_contents(public_path('json/comics.json')));

//        dd($response->data->results);

        return view('home', ['comics' => $response->data->results]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function characters()
    {
        $response = json_decode(file_get_contents(public_path('json/characters.json')));

//        dd($response->data->results);

        return view('characters', ['characters' => $response->data->results]);
    }

    /**
     * Show the application dashboard.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function character($id)
    {
        $response = json_decode(file_get_contents(public_path('json/character.json')));
        $comics = json_decode(file_get_contents(public_path('json/comics.json')));

//        dd($response->data->results[0]);

        return view('character', ['character' => $response->data->results[0], 'comics' => $comics->data->results]);
    }

    /**
     * Show the application dashboard.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function events()
    {
        $response = json_decode(file_get_contents(public_path('json/comics.json')));

//        dd($response->data->results);

        return view('events', ['comics' => $response->data->results]);
    }
}
