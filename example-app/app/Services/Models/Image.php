<?php

namespace App\Services\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
       protected $fillable = ['title', 'text', 'image'];
    use HasFactory;
}
