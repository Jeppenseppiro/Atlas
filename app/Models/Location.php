<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;

class Location extends Model
{
    use HasFactory, UUID;

    protected $fillable = ['address', 'latitude', 'longitude'];

    public function incidents()
    {
        return $this->hasMany(Incident::class);
    }
}
