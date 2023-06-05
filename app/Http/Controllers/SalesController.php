<?php

namespace App\Http\Controllers;

// load model
use App\Sales;
use App\Sale;
use App\Invoice;
use App\SaleDes;
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
use App\Http\Requests\CustomersFormRequest;

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

	// public function store(Request $request)
	// {
		
	
	// 	// redirect back to original route
	// 	// return redirect()->back();

	// //
	// }


	public function index()
	{
		return view('sales.index');
	}

	public function read()
	{
		return view('sales.read');
}

	public function create(Request $request)
	{
        $invoice = Invoice::where(['status' => 0, 'RegNumber' => null, 'engNum' => null])->get();
        if($invoice->count()>0){
            foreach ($invoice as $inv){
                $data['id'] = $inv->id;
                $data['date'] = now();
            }
        }else{
            $invoice = new Invoice();
            $invoice->status = 0;
            $invoice->save();
            $data['id'] = $invoice->id;
            $data['date'] = now();
        }
		return view('sales.create', $data);
	}
	public function create1(Request $request)
	{
		return view('sales.description');
	}
	public function createnew(Request $request) {
		Customers::create([
			'client' => $request->client,
			'client_address' => $request->client_address,
			'client_poskod'  => $request->client_poskod,
			'client_phone' => $request->client_phone,
			'client_email' => $request->client_email,
			]);
	
		// message to confirm storing data
		Session::flash('flash_message', 'Data successfully added!');
	}
	public function store(Request $request)
	{

		####################################################
		// invoice part

		
		$data = [
			'invoice_num'		   => $request->invoice_num,
			'user_id'              => auth()->user()->id,
			'customer_id'          => $request->repeatcust
		];

		$data2 = [
			'registration_num'     => $request->registrationNum,
			'total_price'          => $request->cost,
			'warranty'             => $request->warranty,
			'delivery_fee'         => $request->deliveryFee,
			'custom_field'         => $request->customField,
			'discount'             => $request->discount,
			'part_exchange'        => $request->partExchange,
			'deposit_paid'         => $request->depositPaid,
			'finance_paid'         => $request->financePaid
		];

		$num = $request->desc_num;

		$sale = Sale::create($data);

		$sale_id = $sale->id;

		if($num>0){
			for($i=0;$i<$num;$i++){
				$description  = 'description_'.$i+1;
				$quantity     = 'quantity_'.$i+1;
				$amount       = 'amount_'.$i+1;
				$des_data = [
					'sale_id'        =>    $sale_id,
					'description'    =>    $request->$description,
					'quantity'       =>    $request->$quantity,
					'amount'         =>    $request->$amount,
				];
				$sale = SaleDes::create($des_data);
			}
		}

		
	
		// message to confirm storing data
		// Session::flash('flash_message', 'Data successfully added!');

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
	
	public function destroy($sales)
	{
		$sale = Invoice::find($sales);
		$sale->delete();


		// info when update success
		// Session::flash('flash_message', 'Data successfully deleted!');

		// return redirect(route('sales.index'));		// redirect back to original route
		
		// return response()->json([
		// 	'message' => 'Data deleted',
		// 	'status' => 'success'
		// ]);

		return redirect(route('sales.index')); 
	}
}