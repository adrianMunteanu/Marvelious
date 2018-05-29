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
}
