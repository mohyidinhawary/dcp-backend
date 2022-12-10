<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpertDetails extends Model
{
    use HasFactory;
    protected $table='experts_details';
    protected $fillable = [
       
        'photo',
        'experiences',
        'details_of_experiences',
        'phone_number',
        'address',
        'available_times_during_the_week',
        'type_of_Consulting'

    ];
}
