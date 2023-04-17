<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Location;
use App\Traits\UUID;

class Incident extends Model
{
    use HasFactory, UUID;

    protected $fillable = ['location_id', 'description', 'is_active'];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
