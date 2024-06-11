<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index()
    {
        $data = [
            "title" => "Petaku",
        ];

        // Check if user is logged in
        if (auth()->check()){
            return view('index', $data);
        } else {
            return view('index-public', $data);
        }

    }

    public function table()
    {
        $data = [
            "title" => "Table",
        ];
        return view('table', $data);
    }
}
