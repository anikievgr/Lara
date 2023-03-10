<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['price','quantity','user_id', 'product', 'status','date'];

    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class,    'user_id', 'id' );
    }
}
