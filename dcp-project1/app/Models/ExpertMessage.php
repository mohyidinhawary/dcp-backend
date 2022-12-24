<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpertMessage extends Model
{
    use HasFactory;
    protected $table='experts_messages';
    public $timestamps=false;
    protected $fillable = [
        'expert_id',
        'subject',
        'user_name',
        'user_id',
       
        'description'
        
    ];
   
    protected $hidden = [
        'remember_token',
        
    ];
}
