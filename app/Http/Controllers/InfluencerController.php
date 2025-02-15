<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Influencer;

class InfluencerController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string', 
            'insta_user'    => 'required|string|insta_user:influencers',
            'follows' => 'required|integer', 
            'category' => 'required|string', 
        ]);

        $influencer = Influencer::create([
            'name'     => $validated['name'],
            'insta_user'    => $validated['insta_user'],
            'follows'    => $validated['follows'],
            'category'    => $validated['category'],
        ]);

        return response()->json([
            'message' => 'Influenciadores salvos com sucesso!',
            'influencers' => $influencer,
        ]);
    }
}
