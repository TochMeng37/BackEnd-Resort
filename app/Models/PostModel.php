<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostModel extends Model
{
    use HasFactory;
    protected $table = 'post';
    protected $fillable = ['title', 'description', 'price' , 'checked-in', 'checked-out' , 'image' ];
}
