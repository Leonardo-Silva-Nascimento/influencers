<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campaign;
use App\Models\CampaignInfluencer;
use Carbon\Carbon;

class CampaignController extends Controller
{
    public function store(Request $request)
    {

        $validated = $request->validate([
            'name'        => 'required|string',
            'influencers' => 'required|array', 
            'description' => 'nullable|string',
            'budget'      => 'required|integer',
            'start_date'  => 'required|date',
            'end_date'    => 'required|date',
        ]);

        $startDate = Carbon::parse($validated['start_date'])->format('Y-m-d');
        $endDate   = Carbon::parse($validated['end_date'])->format('Y-m-d');

        $campaign = Campaign::create([
            'name'        => $validated['name'],
            'description' => $validated['description'] ?? null,
            'budget'      => $validated['budget'],
            'start_date'  => $startDate,
            'end_date'    => $endDate,
        ]);

        foreach ($validated['influencers'] as $value) {
            CampaignInfluencer::create([
                'influencer_id' => $value,
                'campaign_id'   => $campaign->id,
            ]);
        }

        return redirect('/home');

    }
}
