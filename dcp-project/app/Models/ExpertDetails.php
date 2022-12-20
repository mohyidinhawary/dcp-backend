<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpertDetails extends Model
{
    use HasFactory;
    protected $table='experts_details';
    protected $fillable = [
       
        
        
       
        'phone_number',
        'address',
        'experience_years',
        'experiences',
        'Medical_consultations',
            'Professional_consulting',
            'Psychological_counseling',
            'Family_counseling',
        'management_consulting'
    ];
}
