<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable=[
        'email',
        'gender',
        'mobile_number',
        'student_name',
        'group_id',
    ];

    public function marks(){
        return $this->hasMany(Mark::class);
    }
    public function group(){
        return $this->belongsTo(Group::class, 'group_id');
    }


}
