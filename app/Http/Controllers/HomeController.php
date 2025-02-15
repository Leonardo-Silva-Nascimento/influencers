<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Influencer;
use App\Models\Campaign;

class HomeController extends Controller
{
    public function home(Request $request)
    {

        $influencer = Influencer::all(); 
        $campaign = Campaign::all(); 

        return view('home', [
            'influencer' => $influencer,
            'campanha' => $campaign,
            'success' => 'Registro realizado com sucesso!'
        ]);

    }
}
