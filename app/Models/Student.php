<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{   
    protected $table = 'students';
    protected $primaryKey = 'id'; 
    
    // Define the fillable fields
    protected $fillable = ['name', 'address', 'mobile', 'teacher_id'];

    // Define the relationship to the Teacher model
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    use HasFactory;
}
