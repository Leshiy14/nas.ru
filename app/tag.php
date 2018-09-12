<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
	public function products()
    {
        return $this->belongsToMany('App\Product');
        // Строку следует читать так:
        // «Эта сущность (тег) относится ко многим товарам»;
        // вернуть множество этих товаров»

        // То же самое можно было бы записать иначе:
        // $this->belongsToMany('App\Product');
    }
	protected $fillable = ['name'];
    //
}
