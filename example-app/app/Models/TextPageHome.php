<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TextPageHome extends Model
{
     protected $fillable = ['title', 'text'];
    use HasFactory;
}
