<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Process extends Model
{
        protected $fillable = ['nameprocess','nomerprocess','color'];
    use HasFactory;
}
