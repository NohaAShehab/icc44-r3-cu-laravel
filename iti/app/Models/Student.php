<?php

namespace App\Models;

use Carbon\Traits\Creator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    # specify table name
    protected $table = 'students';
    protected $fillable=["name", "email", "grade", "gender",
        "image", "track_id", "creator_id"];

    # relation track
    function track(){ # define track property
        return $this->belongsTo(Track::class);
        # select * from tracks where id = $this->track_id;
        ## relation --> with track object
    }

    function creator(){
        return $this->belongsTo(User::class);
    }
}
