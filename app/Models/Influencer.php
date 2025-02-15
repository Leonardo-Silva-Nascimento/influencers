<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Influencer extends Model
{
    protected $fillable = ['name', 'insta_user', 'follows', 'category'];

    public function campaigns()
    {
        return $this->belongsToMany(Campaign::class, 'campaign_influencer');
    }
}