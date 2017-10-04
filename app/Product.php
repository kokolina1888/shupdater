<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
    	'model', 
    	'sku',
    	'upc',
    	'ean',
    	'jan',
    	'isbn',
    	'mpn',
    	'location',    	
    	'quantity', 
    	'stock_status_id',
    	'manufacturer_id',    	
    	'price', 
    	'tax_class_id',    	
    	'date_available',
    	'date_added',
    	'date_modified',
    ];  

    protected $table = 'product';
    public $timestamps = false;
    protected $primaryKey = 'product_id';

    public function product_description()  
    {
    	return $this->hasOne('App\ProductDescription');
    }
}
