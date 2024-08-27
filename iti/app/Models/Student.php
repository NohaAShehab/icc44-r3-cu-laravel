<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    # specify table name
    protected $table = 'students';
    protected $fillable=["name", "email", "grade", "gender", "image", "track_id"];
}
