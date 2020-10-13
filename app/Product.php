<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Product extends Model
{
    protected $fillable = [
        'user_id', 'product_name', 'product_price',
    ];   

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public static function discount($oprice,$dprice)
    {
        return ((($oprice-$dprice)/$oprice)*100) . "%";
    }
}
