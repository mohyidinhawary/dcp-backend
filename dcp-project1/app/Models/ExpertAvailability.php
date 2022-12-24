<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpertAvailability extends Model
{
    use HasFactory;
    protected $table='experts-avilableity';
    public $timestamps=false;
    protected $fillable = [
        'expert_id',
        'today',
        'date',
        'from',
        'to'
    ];
   
    protected $hidden = [
        'remember_token',
        
    ];
}
