<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;
    protected $table='favorites';
    public $timestamps=false;
    protected $fillable = [
       
        
        'user_id',
        'expert_name',
        'role',
        'experiences',
        'experience_years',

    ];
}
