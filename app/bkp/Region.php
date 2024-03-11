<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'city',
        'geometry',
        'center',
    ];

    public function streets()
    {
        return $this->hasMany(Street::class);
    }

    public function roadNetworks()
    {
        return $this->hasMany(RoadNetwork::class);
    }
}
