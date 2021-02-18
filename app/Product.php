<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Product extends Model
{
    protected $fillable = [
        'product_name', 'product_price','product_quantity','category',
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
