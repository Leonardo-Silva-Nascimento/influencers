<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $fillable = ['name', 'budget', 'description', 'start_date', 'end_date'];

    public function influencers()
    {
        return $this->belongsToMany(Influencer::class, 'campaign_influencer');
    }
}
