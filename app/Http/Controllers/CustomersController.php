<?php

namespace App\Http\Controllers;

use App\Customers;
use App\Invoice;
use App\Sale;
use App\Sales;
use App\SaleDes;
use App\SalesCustomers;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests\CustomersFormRequest;
use Session;

class CustomersController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('customers.index');
    }

    public function create(Request $request)
    {
        dd($request);
    }

    public function store(Request $request)
    {
//        dd($request);
        if ($request->type == 'new') {
            $user = new Customers();
            $user->client = $request->clientname;
            $user->id_user = auth()->user()->id;
            $user->client_address = $request->clientadd;
            $user->client_poskod = $request->clientzip;
            $user->client_telephone = $request->clienttel;
            $user->client_email = $request->clientemail;
            $user->client_mobile = $request->clientmob;
            $user->address_line2 = $request->clientaddd;
            $user->city = $request->clientcity;
            $user->state_province = $request->clientstate;
            $user->country = $request->clientcountry;
            $user->delivery_add = $request->delivery_add;
            $user->save();

            return redirect('/customers/index');
        } elseif ($request->type == 'update') {
            $user = Customers::where('id', $request->repeatcust)->get();
            $user2 = Customers::where('id', $request->id)->get();
            if($user->count() > 0) {
                foreach ($user as $user) {
                    $user->client = $request->clientname;
                    $user->client_address = $request->clientadd;
                    $user->client_poskod = $request->clientzip;
                    $user->client_telephone = $request->clienttel;
                    $user->client_email = $request->clientemail;
                    $user->client_mobile = $request->clientmob;
                    $user->address_line2 = $request->clientaddd;
                    $user->city = $request->clientcity;
                    $user->state_province = $request->clientstate;
                    $user->country = $request->clientcountry;
                    $user->delivery_add = $request->delivery_add;
                    $user->save();
                }
            }elseif($user2->count() > 0) {
                foreach ($user2 as $user) {
                    $user->client = $request->client;
                    $user->client_address = $request->client_address;
                    $user->client_poskod = $request->client_poskod;
                    $user->client_telephone = $request->client_telephone;
                    $user->client_email = $request->client_email;
                    $user->client_mobile = $request->client_mobile;
                    $user->address_line2 = $request->address_line2;
                    $user->city = $request->city;
                    $user->state_province = $request->state_province;
                    $user->country = $request->country;
                    if($user->save()){
                        session()->flash('flash_message', 'Data Updated Successful!');
                        return redirect("/customers/edit/{$user->id}");
                    }
                }
            }else{
                $user = new Customers();
                $user->client = $request->clientname;
                $user->id_user = auth()->user()->id;
                $user->client_address = $request->clientadd;
                $user->client_poskod = $request->clientzip;
                $user->client_telephone = $request->clienttel;
                $user->client_email = $request->clientemail;
                $user->client_mobile = $request->clientmob;
                $user->address_line2 = $request->clientaddd;
                $user->city = $request->clientcity;
                $user->state_province = $request->clientstate;
                $user->country = $request->clientcountry;
                $user->delivery_add = $request->delivery_add;
                $user->save();
            }

            $inv = Invoice::where(['id' => $request->invoiceId, 'status' => 0, 'RegNumber' => null, 'engNum' => null])->get();
            foreach ($inv as $invoice) {
                $invoice->ClientId = $user->id;
                $invoice->id_user = auth()->user()->id;
                $invoice->make = $request->make;
                $invoice->model = $request->model;
                // $invoice->weight = $request->weight;
                $invoice->engNum = $request->engNum;
                $invoice->colour = $request->colour;
                // $invoice->bodyStyle = $request->bodyStyle;
                // $invoice->exported = $request->exported;
                // $invoice->gearBox = $request->gearBox;
                $invoice->ModelSetupDate = $request->modelSetupDate;
                $invoice->firRegis = $request->firRegis;
                $invoice->RegNumber = $request->regNum;
                $invoice->price = $request->total_price;
                $invoice->quantity = $request->quantity;
                $invoice->warranty = $request->warranty;
                $invoice->delivery_fee = $request->delivery_fee;
                $invoice->delivery_add = $request->delivery_add;
                $invoice->delivery_add2 = $request->delivery_add2;
                $invoice->delivery_city = $request->delivery_city;
                $invoice->delivery_poskod = $request->delivery_poskod;
                $invoice->delivery_country = $request->delivery_country;
                $invoice->deposit_paid = $request->deposit_paid;
                $invoice->part_exchange = $request->part_exchange;
                $invoice->discount = $request->discount;
                $invoice->custom_field = $request->custom_field;
                $invoice->finance_paid = $request->finance_paid;
                $invoice->total_price = $request->total_price;

                $invoice->businessName = $request->business_name;
                $invoice->businessEmail = $request->business_email;

                $invoice->chassisNumber = $request->chassisNumber;
                $invoice->transmission = $request->transmission;
                $invoice->dateRegist = $request->dateRegist;
                $invoice->currentMileage = $request->currentMileage;
                $invoice->mot = $request->mot;
                $invoice->roadtax = $request->roadtax;

                $invoice->warrantyCost = $request->warrantyCost;
                // $invoice->delivery_add = $request->delivery_add;
                $invoice->part_exchange_detail = $request->part_exchange_detail;
                if($request->VAT){
                    $invoice->VAT = $request->VAT;
                }
                $invoice->vatNum = $request->vatNum;
                $invoice->payment_method = $request->payment_method;
                $invoice->status = 1;
                $invoice->invoiceDate = $request->invoiceDate;

                $invoice->save();
            }

            $salen = new Sale();
            $salen->id = $invoice->id;
            $salen->invoice_num = $invoice->id;
            $salen->user_id = auth()->user()->id;
            $salen->customer_id = $invoice->id;

            $salen->save();

            $salesn = new Sales();
            $salesn->id = $invoice->id;
            $salesn->id_user = auth()->user()->id;
            $salesn->date_sale = $salen->created_at;
            $salesn->registration_num = $request->registration_num;
            $salesn->total_price = $request->total_price;
            $salesn->warranty = $request->warranty;
            $salesn->delivery_fee = $request->delivery_fee;
            $salesn->custom_field = $request->custom_field;
            $salesn->discount = $request->discount;
            $salesn->part_exchange = $request->part_exchange;
            $salesn->deposit_paid = $request->deposit_paid;
            $salesn->finance_paid = $request->finance_paid;
            echo $salesn;

            $salesn->save();

            $salenDes = new SaleDes();
            $salenDes->sale_id = $invoice->id;
            $salenDes->description = $request->make . ' ' . $request->model;
            $salenDes->quantity = 1;
            $salenDes->amount = 0;

            $salenDes->save();

            $salenCus = new SalesCustomers();
            $salenCus->id_sales = $salesn->id;
            $salenCus->id_customer = $user->id;
            $salenCus->id = $invoice->id;

            $salenCus->save();

            // message to confirm storing data
            // return redirect("/sales/create1");
            $newUrl = "/printpdf/".$invoice->id;

            session()->flash('newurlpdf', $newUrl);
            return redirect("/sales/index");
            //
        }
    }

    public function show(Customers $customers)
    {
        //
    }

    public function edit(Customers $customers)
    {
        return view('customers.edit', compact(['customers']));
    }

    // public function edit2(Customers $customer)
    // {

    // 	return "ok";
    // 	// return view('sales.create', compact(['customers']));
    // }

    public function update(CustomersFormRequest $request, Customers $customers)
    {
        dd($request);
        echo 'ok';

        // $duit = Customers::find($customers->id)
        // 		->update(request([
        // 			'client', 'client_email', 'client_address', 'address_line2', 'city', 'state_province', 'client_poskod', 'client_telephone', 'client_mobile', 'updated_at',
        // 		]));
        // // $customers->touch();
        // // info when update success
        // Session::flash('flash_message', 'Data successfully edited!');
        // return redirect(route('customers.index'));
    }

    public function destroy(Customers $customers)
    {
        //
        Customers::destroy($customers->id);
        return redirect(route('customers.index'));
    }

    public function search(Request $request)
    {
        $valid = true;
        $cust = Customers::where('client', $request->client)->count();
        $cust_email = Customers::where(
            'client_email',
            $request->client_email
        )->count();
        $cust_phone = Customers::where(
            'client_phone',
            $request->client_phone
        )->count();
        // dd($cust);

        if ($cust == 1) {
            $valid = false;
        } else {
            if ($cust_phone == 1) {
                $valid = false;
            } else {
                if ($cust_email == 1) {
                    $valid = false;
                } else {
                    $valid = true;
                }
            }
        }

        return response()->json(['valid' => $valid]);
    }
}
