<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;
    public function health(){
        return $this->belongsTo(Health::class);
    }
    public function rescuer(){
        return $this->hasMany(Rescuer::class);
    }

}
