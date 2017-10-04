<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\ProductDescription;
use App\ProductInfoFile;

use Carbon\Carbon;
use DB;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

     /**
     * Show the form for creating a new resource.
     * all products
     * @return \Illuminate\Http\Response
     */

    public function add_new_products()
    {
        return view('products.add_new_products');
    }

     /**
     * Show the form for updating resource.
     * all products`price and quantity
     * @return \Illuminate\Http\Response
     */
     
    public function edit_products_quantity_prices()
    {
        return view('products.edit_products_quantity_prices');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_new_products(Request $request)
    {
       $sheetData = ProductInfoFile::upload_file($request);

       foreach ($sheetData as $data) {
            if($product = Product::create([
                'model'     => $data['A'], 
                'sku'       => '',
                'upc'       => '',
                'ean'       => '',
                'jan'       => '',
                'isbn'      => '',
                'mpn'       => '',
                'location'  => '',     
                'quantity'  => $data['C'], 
                'stock_status_id'=> 0,
                'manufacturer_id'=> 5,     
                'price'     => $data['E'], 
                'tax_class_id'  => 0,     
                'date_available'=> Carbon::now(),
                'date_added'    => Carbon::now(),
                'date_modified' => Carbon::now(),
            ])) {
            
            $id = $product->id;
    
            ProductDescription::create([
                'product_id'        => $id,
                'language_id'       => 1,
                'name'              => $data['B'],
                'description'       => '',
                'tag'               => '',
                'meta_title'        => $data['B'],
                'meta_description'  => '',
                'meta_keyword'      => '',

                ]);
            }//end if
        }//endforeach

        return view('home');        
    }

    /**
     * Update resource in storage
     * all products` quantity and prices
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update_products_quantity_prices(Request $request)
    {
       $sheetData = ProductInfoFile::upload_file($request);

       foreach ($sheetData as $data) {
        //VAR 1
        // DB::table('product')
        //     ->where('model', $data['A'])
        //     ->update([
        //             'quantity'      => $data['C'],
        //             'price'         => $data['E'],
        //             'date_modified' => Carbon::now(),
        //             ]);

        //VAR 2
        $product = Product::where('model', '=', $data['A'])->first();
        $product->quantity  = $data['C'];
        $product->price     = $data['E'];
        $product->date_modified     = Carbon::now();

        $product->save();
       
        }//endforeach

        return view('home');        
    }


    /**
     * Display search form for getting 
     * specific product info
     *
     * 
     */
    public function get_product_info()
    {
       return view('products.search_product');
    }

    public function get_product_info_by_model(Request $request)
    {
        $product = Product::where('model', '=', $request->model)->first();
        $productDescriptions = ProductDescription::where('product_id', '=', $product->product_id)->first();

        $response[] = array(
                'name'      => $productDescriptions->name,
                'id'        => $product->product_id,
                'model'     => $product->model,
                'quantity'  => $product->quantity,
                'price'     => $product->price,               
            ); 
        
         
        return response()->json($response);

        
        
    }

    public function get_product_info_by_name(Request $request)    
    {

        $productDescriptions = ProductDescription::where('name', 'like', '%' . $request->name . '%')->get();
        $response = array();
        foreach ($productDescriptions as $pd) {
            $id = $pd->product_id;
            $product = Product::where('product_id', '=', $id)->first();

            $response[] = array(
                'name'      => $pd->name,
                'id'        => $pd->product_id,
                'model'     => $product->model,
                'quantity'  => $product->quantity,
                'price'     => $product->price,               
            ); 
        }
         
        return response()->json($response);
        
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
