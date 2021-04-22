<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rescuer extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'res_name',
        'res_lname',
        'res_addr',
        'res_phone',

    ];
    public function animal(){
       return $this->belongsToMany(Animal::class)->withTimestamps();
    }
}
