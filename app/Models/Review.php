<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',             
        'rating',           
        'comment',          
        'reviewable_id',    
        'reviewable_type',  
        'is_published'      
    ];

   
    public function reviewable()
    {
        return $this->morphTo();
    }
}