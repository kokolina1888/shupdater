<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Excel;
use File;
use PHPExcel; 
use PHPExcel_IOFactory;

class ProductInfoFile extends Model
{
    public static function upload_file($request)
    {
    	$filename = $request->file('quantities_prices')->getClientOriginalName();
       	$request->file('quantities_prices')->move('temp', $filename);


      	$path = public_path().'//temp/'.$filename;
      
      	/**  Identify the type of $inputFileName  **/
		$inputFileType = PHPExcel_IOFactory::identify($path);

		/**  Create a new Reader of the type that has been identified  **/
		$objReader = PHPExcel_IOFactory::createReader($inputFileType);
		$objReader->setReadDataOnly(true);


		/**  Load $inputFileName to a PHPExcel Object  **/
		$objPHPExcel = $objReader->load($path);
		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);

		return $sheetData;
    }

}
