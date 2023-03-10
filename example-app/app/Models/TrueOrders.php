<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrueOrders extends Model
{
    protected $fillable =[ 'product',
        'price',
        'quantity',
        'user_id',
        'date'];
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class,    'user_id', 'id' );
    }
}
