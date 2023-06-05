<?php

namespace App\Http\Controllers;

// load model
use App\Sales;
use App\SalesItems;
use App\SlipPostage;
use App\Customers;
use App\Product;
use App\ProductCategory;
use App\Payments;
use App\SlipNumbers;
use App\SalesTax;
use App\SalesCustomers;

// for manipulating image
// http://image.intervention.io/
// use Intervention\Image\Facades\Image as Image;		<-- ajaran sesat depa... hareeyyyyy!!
use Intervention\Image\ImageManagerStatic as Image;

use Session;

use File;

use Illuminate\Http\Request;

// load validation
use App\Http\Requests\SalesFormRequest;

class SalesController extends Controller
{
	function __construct()
	{
		$this->middleware('auth');
		$this->middleware('notowned', ['only' => ['edit', 'update', 'destroy']]);
	}

	public function index()
	{
		return view('sales.index');
	}

	public function read()
	{
		return view('sales.read');
	}

	public function create()
	{
		return view('sales.create');
	}
	
	public function store(Request $request)
	{
		var_dump($request);die;
		// dd($request->all());
		// dd($request->tax);
		// dd($request->file('image'));

		####################################################
		// invoice part
		$inv = Sales::create(request([
				'id_user', 'date_sale',
			]));

		####################################################
		// slip serial number
		if ($request->serial != NULL) {
			foreach ($request->serial as $key => $val) {
				$serialtrack = SlipNumbers::create([
						'id_sales' => $inv->id,
						'tracking_number' => $val['tracking_number'],
					]);
			}
		};

		####################################################
		//image part
		if ($request->file('image') != NULL) {
			foreach ($request->file('image') as $file) {
				$mime = $file->getMimeType();
				$filename = $file->store('images');
				$imag = Image::make(storage_path().'/uploads/'.$filename);
	
				// resize the image to a height of 400 and constrain aspect ratio (auto width)
				$imag->resize(null, 400, function ($constraint) {
					$constraint->aspectRatio();
				});
				$imag->save();
				$imh = SlipPostage::where('image', base64_encode( file_get_contents( storage_path().'/uploads/'.$filename ) ));
	
				// if image already existed in the database
				if($imh->count() < 1) {
					$img = SlipPostage::create([
							'id_sales' => $inv->id,
							'image' => base64_encode( file_get_contents( storage_path().'/uploads/'.$filename ) ),
							'mime' => $mime,
						]);
				} else {
					// info when update success
					Session::flash('flash_message', 'Image already exist in the databank, therefor its not been save');
				}
			}
		}

		// clean up
		$files2 = File::allFiles(storage_path('uploads/images'));
		foreach($files2 as $h) {
			if (File::extension($h) != 'txt') {
				// echo $l.'<br />';
				File::delete($h);
			}
		}

		###################################################
		// customers part
		if ( $request->client == NULL && $request->repeatcust != NULL) {
			$sacu = SalesCustomers::create([
					'id_sales' => $inv->id,
					'id_customer' => $request->repeatcust,
				]);

		} else {
			if ( $request->client != NULL && $request->repeatcust == NULL ) {
				$cust = Customers::create([
						'client' => $request->client,
						'client_address' => $request->client_address,
						'client_poskod' => $request->client_poskod,
						'client_phone' => $request->client_phone,
						'client_email' => $request->client_email,
					]);
				$sacu = SalesCustomers::create([
						'id_sales' => $inv->id,
						'id_customer' => $cust->id,
					]);
			}
		}
		
		###################################################
		// invoice part

		foreach ($request->inv as $key => $val) {
			$invoice = SalesItems::create([
					'id_sales' => $inv->id,
					'id_product' => $val['id_product'],
					'commission' => $val['commission'],
					'retail' => $val['retail'],
					'quantity' => $val['quantity'],
				]);
		}

		###################################################
		// tax part

		if ($request->tax != NULL) {
			foreach ($request->tax as $y) {
				$invoice = SalesTax::create([
						'id_sales' => $inv->id,
						'id_tax' => $y,
					]);
			}
		}

		###################################################
		// payment part (if data not fill, then dont)
		if ($request->pay != NULL) {
			foreach ($request->pay as $key => $val) {
				$invoice = Payments::create([
						'id_sales' => $inv->id,
						'id_bank' => $val['id_bank'],
						'date_payment' => $val['date_payment'],
						'amount' => $val['amount'],
					]);
			}
		}

		###################################################
		// info when update success
		Session::flash('flash_message', 'Data successfully added!');

		return redirect()->back();      // redirect back to original route
	}
	
	public function show(Sales $sales)
	{
		//
	}
	
	public function edit(Sales $sales)
	{
		return view('sales.edit', compact(['sales']));
	}
	
	public function update(SalesFormRequest $request, Sales $sales)
	{
		// dd($request->tax);
		// dd($request->all());
		####################################################
		// invoice part
		$inv = Sales::where(['id' => $sales->id, 'deleted_at' => null]) 
					->update(request([
							'id_user', 'date_sale',
						]));

		####################################################
		// slip serial number
		if ($request->serial != NULL) {
			foreach ($request->serial as $key => $val) {
				$serialtrack = SlipNumbers::updateOrCreate(['id' => $val['id'], 'deleted_at' => null],
					[
						'id_sales' => $sales->id,
						'tracking_number' => $val['tracking_number'],
					]);
			}
		};

		####################################################
		//image part
		if($request->file('image') != null) {
			foreach ($request->file('image') as $file) {
				$mime = $file->getMimeType();
				$filename = $file->store('images');
				$imag = Image::make(storage_path().'/uploads/'.$filename);

				// resize the image to a height of 400 and constrain aspect ratio (auto width)
				$imag->resize(null, 400, function ($constraint) {
					$constraint->aspectRatio();
				});
				$imag->save();
				$imh = SlipPostage::where('image', base64_encode( file_get_contents( storage_path().'/uploads/'.$filename ) ));

				// if image already existed in the database
				if($imh->count() < 1) {
					$img = SlipPostage::updateOrCreate(['id_sales' => $sales->id, 'deleted_at' => null],
							[
								'id_sales' => $sales->id,
								'image' => base64_encode( file_get_contents( storage_path().'/uploads/'.$filename ) ),
								'mime' => $mime,
							]);
				} else {
					// info when update success
					Session::flash('flash_message', 'Image already exist in the databank, therefor its not been save');
				}
			}

			// clean up
			$files2 = File::allFiles(storage_path('uploads/images'));
			foreach($files2 as $h) {
				if (File::extension($h) != 'txt') {
					// echo $l.'<br />';
					File::delete($h);
				}
			}
		}

		###################################################
		// customers part
		// $cust = Customers::updateOrCreate(['id_sales' => $sales->id, 'deleted_at' => null],
		// 		[
		// 			'id_sales' => $sales->id,
		// 			'client' => $request->client,
		// 			'client_address' => $request->client_address,
		// 			'client_poskod' => $request->client_poskod,
		// 			'client_phone' => $request->client_phone,
		// 			'client_email' => $request->client_email,
		// 		]);

		// // customers part
		if ( $request->repeatcust != NULL ) {
			$sacu = SalesCustomers::updateOrCreate(['id' => $request->repeatcust_id, 'deleted_at' => null],
				[
					'id_customer' => $request->repeatcust,
				]);
		}
		 // else {
		// 	if ( $request->repeatcust == NULL ) {
		// 		$cust = Customers::create([
		// 				'client' => $request->client,
		// 				'client_address' => $request->client_address,
		// 				'client_poskod' => $request->client_poskod,
		// 				'client_phone' => $request->client_phone,
		// 				'client_email' => $request->client_email,
		// 				'id_sales' => $inv->id,
		// 			]);
		// 		$sacu = SalesCustomers::create([
		// 				'id_sales' => $inv->id,
		// 				'id_customer' => $cust->id,
		// 			]);
		// 	}
		// }


		###################################################
		// invoice part
		if ($request->inv != NULL) {
			foreach ($request->inv as $key => $val) {
				$invoice = SalesItems::updateOrCreate(['id' => $val['id'], 'deleted_at' => null],
					[
						'id_sales' => $sales->id,
						'id_product' => $val['id_product'],
						'commission' => $val['commission'],
						'retail' => $val['retail'],
						'quantity' => $val['quantity'],
					]);
			}
		}

		###################################################
		// tax part
		if ($request->tax != NULL) {
			SalesTax::where(['id_sales' => $sales->id])->delete();
			foreach ($request->tax as $y) {

				$invoice = SalesTax::create([
						'id_sales' => $sales->id,
						'id_tax' => $y,
					]);
			}
		} else {
			SalesTax::where(['id_sales' => $sales->id])->delete();
		}

		##################################################
		// payment part (if data not fill, then dont)
		if ($request->pay != NULL) {
			foreach ($request->pay as $key => $val) {
				$invoice = Payments::updateOrCreate(['id' => $val['id'], 'deleted_at' => null],
					[
						'id_sales' => $sales->id,
						'id_bank' => $val['id_bank'],
						'date_payment' => $val['date_payment'],
						'amount' => $val['amount'],
					]);
			}
		}

		##################################################
		// info when update success
		Session::flash('flash_message', 'Data successfully update!');

		return redirect(route('sales.index'));      // redirect back to original route
	}
	
	public function destroy(Sales $sales)
	{
		$sale = Sales::find($sales->id);
		// Sales::destroy($sales->id);
		$sale->slippostageimage()->delete();
		$sale->customer()->delete();
		$sale->invitems()->delete();
		$sale->slipnumber()->delete();
		$sale->salestaxes()->delete();
		$sale->salespayment()->delete();
		$sale->delete();

		// info when update success
		// Session::flash('flash_message', 'Data successfully deleted!');

		// return redirect(route('sales.index'));		// redirect back to original route
		return response()->json([
									'message' => 'Data deleted',
									'status' => 'success'
								]);
	}
}
