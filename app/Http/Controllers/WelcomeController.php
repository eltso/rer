<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{
    public function index()
    {
        $items = array(
            'items' => [
                'Pack luggage',
                'Go to airport',
                'Arrive in San Juan'
            ]
        );
        dd($items);
        return view('welcome');
    }
}
