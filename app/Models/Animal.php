<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $fillable = [
        'id',
        'name',
        'age',
        'gender',
        'animal_type',
        'animal_breed',

    ];
    use HasFactory;
    public function health(){
        return $this->belongsTo(Health::class);
    }

      public function adopter(){
        return $this->belongsToMany(Adopter::class)->withTimestamps();
    }
    public function rescuer(){
        return $this->belongsToMany(Rescuer::class)->withTimestamps();
    }

}
