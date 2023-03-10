<?php

namespace App\Services\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
      protected $fillable = ['title','titleLtext', 'image' ];
    use HasFactory;
}
