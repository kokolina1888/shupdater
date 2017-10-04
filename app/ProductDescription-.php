<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDescription extends Model
{
    protected $fillable = [
    	'language_id',
        'name',
        'description',
        'tag',
        'meta_title',
        'meta_description',
        'meta_keyword',       

    ]; 

    protected $table = 'product_description';   
    public $timestamps = false;

    public function product()  
    {
        return $this->belongsTo('App\Product');
    }

}
