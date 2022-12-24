<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSubject extends Model
{
    use HasFactory;
    protected $table='users_messages';
    public $timestamps=false;
    protected $fillable = [
        'user_id',
        'subject',
        'expert_id',
        'expert_name',
       
        'description'
        
    ];
   
    protected $hidden = [
        'remember_token',
        
    ];
}
