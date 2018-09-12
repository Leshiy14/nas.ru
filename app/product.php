<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
	  public function tags()
    {
        return $this->belongsToMany('App\Tag');
        // Строку следует читать так:
        // «Эта сущность (товар) относится ко многим тегам;
        // вернуть множество этих тегов»
                
        // То же самое можно было бы записать иначе:
        // $this->belongsToMany('App\Tag');
    }
	protected $fillable = ['name', 'description', 'price', 'count'];
    //
}
