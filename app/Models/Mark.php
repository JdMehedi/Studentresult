<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    use HasFactory;
    protected $fillable=[
        'subject_id',
        'student_id',
        'group_id',
        'marks',
    ];


    public function subject(){
        return $this->belongsTo( Subject::class);
    }

    public function student(){
        return $this->belongsTo( Student::class);
    }
    public function group(){
        return $this->belongsTo( Group::class);
    }

}
