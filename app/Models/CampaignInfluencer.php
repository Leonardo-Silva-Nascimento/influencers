<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CampaignInfluencer extends Pivot
{
    protected $table = 'campaign_influencer'; 

    public $timestamps = true; 

    protected $fillable = [
        'influencer_id', 
        'campaign_id'
    ];
}
