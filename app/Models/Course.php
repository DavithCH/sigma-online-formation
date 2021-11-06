<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses';
    protected $fillable = ['name', 'description', 'image', 'price','rate','user_id'];

    public function getUser() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function getChapters() {
        return $this->hasMany(Chapter::class,'courses_id', 'id');
    }
}
