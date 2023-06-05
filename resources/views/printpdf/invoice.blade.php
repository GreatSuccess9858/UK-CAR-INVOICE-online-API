<?php

// load model
use App\Sale;
use App\Sales;
use App\SalesItems;
use App\SlipPostage;
use App\Customers;
use App\Product;
use App\ProductCategory;
use App\ProductImage;
use App\Payments;
use App\SlipNumbers;
use App\SalesTax;
use App\SalesCustomers;
use App\Preferences;
use App\Taxes;
use App\Banks;
use App\Invoice;
use App\User;
use Crabbly\Fpdf\Fpdf as Fpdf;
use Carbon\Carbon;

function my($string)
{
    $rt = Carbon::createFromFormat('Y-m-d', $string);
    return date('d F Y', mktime(0, 0, 0, $rt->month, $rt->day, $rt->year));
}

function base64ToImage($base64_string, $output_file)
{
    $ext = explode('/', $output_file);
    $filename = 'storage/images/pdfimages/' . $base64_string;
//    dd($filename);
//    file_put_contents(base64_decode($base64_string));
    return $filename;
}

    $GLOBALS['user'] = User::find($sales->id_user);
    $GLOBALS['sales'] = $sales;

class PDF extends Fpdf
{
    function Header()
    {
        $user = $GLOBALS['user'];
        $lo1 = Preferences::find(1);
        $user2 = auth()->user();
        $this->Image(
            base64ToImage($user->user_logo_image, $user->user_logo_mime),
            10,7,35
        );
        $this->SetLeftMargin(60);
        $this->SetFont('Arial', 'B', 12);
        $this->MultiCell(0, 5, $user->bname, 0, 'L');
        $this->MultiCell(0, 5, $user->baddress, 0, 'L');
        $this->MultiCell(0, 5, $user->baddress2, 0, 'L');
        // $this->MultiCell(0, 5, 'City : '.$user->city, 0, 'L');
        // $this->MultiCell(0, 5, 'Country : '.$user->country, 0, 'L');
        $this->MultiCell(0, 5, $user->postcode, 0, 'L');
        $this->MultiCell(0, 5, $user->businesspn, 0, 'L');
        $this->MultiCell(0, 5, $user->businessemail, 0, 'L');
        $this->MultiCell(230, 5, 'VAT Number : ' . $user->vat, 0, 'C');
        $this->SetFont('arial', 'B', 20);
        $this->SetRightMargin(10);
        $this->SetY(10);
        $this->MultiCell(0, 5, 'Vehicle Invoice', 0, 'R');
        $this->Ln(5);
    }
    function Footer()
    {
        $lo2 = Preferences::find(1);
        $this->SetLeftMargin(10);
        $this->SetTextColor(128);
        $this->SetY(-23);
        $this->SetFont('arial', 'I', 6);
        $this->Cell(
            0,
            5,
            $lo2->company_address . ' ' . $lo2->company_postcode,
            0,
            1,
            'C'
        );
        $this->SetFont('Arial', 'I', 5);
        $this->Cell(0, 5, 'Page ' . $this->PageNo() . '/{nb}', 0, 1, 'C');
    }
}
$lo = Preferences::find(1);
$pdf = new PDF('P', 'mm', 'A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetTitle('Invoice ');
$pdf->SetFont('Arial', 'B', 15);
$pdf->SetTextColor(145, 0, 181);
$pdf->SetFillColor(200, 220, 255);
$pdf->Line(0, 45, 250, 45);
$pdf->Ln(10);
$pdf->SetLeftMargin(10);
$pdf->SetFont('Arial', 'B', 11);
$pdf->SetTextColor(0, 0, 0);
$pdf->Ln(5);
$customer = SalesCustomers::where(['id_sales' => $sales->id])->first();
$lo2 = Customers::where(['id' => $customer->id_customer])->first();
$pdf->SetRightMargin(0);
$pdf->SetFont('Arial', 'B', 11);
$pdf->SetLeftMargin(150);
$pdf->SetY(47);
    //$pdf->SetX(110);
$pdf->MultiCell(0, 5, 'Sold to : ', 0, 'L');
$pdf->SetFont('Arial', '', 11);

$vehicle = Invoice::where(['id' => $sales->id, 'ClientId' => $lo2->id])->get();
foreach ($vehicle as $vehicle) {
    if ($vehicle->businessName != "") {
        $pdf->MultiCell(0, 5, $vehicle->businessName, 0, 'L');
    }
    if($lo2->client != "") {
        $pdf->MultiCell(0, 5, $lo2->client , 0, 'L');
    }
    if ($lo2->client_address != "") {
        $pdf->MultiCell(0, 5, $lo2->client_address, 0, 'L');
    }
    if ($lo2->address_line2 != "") {
        $pdf->MultiCell(0, 5, $lo2->address_line2, 0, 'L');
    }
    if ($lo2->city != "") {
        $pdf->MultiCell(0, 5, $lo2->city, 0, 'L');
    }
    if ($lo2->client_poskod != "") {
        $pdf->MultiCell(0, 5, $lo2->client_poskod, 0, 'L');
    }
    if ($lo2->country != "") {
        $pdf->MultiCell(0, 5, $lo2->country, 0, 'L');
    }
    if ($lo2->client_mobile != "") {
        $pdf->MultiCell(0, 5, $lo2->client_mobile, 0, 'L');
    }
    if ($lo2->client_email != "") {
        $pdf->MultiCell(0, 5, $lo2->client_email, 0, 'L');
    }
    if ($vehicle->vatNum != "") {
        $pdf->MultiCell(0, 5, $vehicle->vatNum, 0, 'L');
    }
}
$pdf->MultiCell(0, 5, '', 0, 'L');
$pdf->SetFont('Arial', 'B', 11);
$pdf->MultiCell(0, 5, 'Delivery Address :', 0, 'L');
$pdf->SetFont('Arial', '', 11);
$vehicle = Invoice::where(['id' => $sales->id, 'ClientId' => $lo2->id])->get();
foreach ($vehicle as $vehicle) {
    // $pdf->SetY(90);
    if($vehicle->delivery_add != "") {
        $pdf->MultiCell(0, 5, $vehicle->delivery_add, 0, 'L');
    }
    if($vehicle->delivery_add2 != "") {
        $pdf->MultiCell(0, 5, $vehicle->delivery_add2, 0, 'L');
    }
    if($vehicle->delivery_poskod != "") {
        $pdf->MultiCell(0, 5, $vehicle->delivery_poskod, 0, 'L');
    }
    if($vehicle->delivery_city != "") {
        $pdf->MultiCell(0, 5, $vehicle->delivery_city, 0, 'L');
    }
    if($vehicle->delivery_country != "") {
        $pdf->MultiCell(0, 5, $vehicle->delivery_country, 0, 'L');
    }
$sacust = SalesCustomers::where(['id_sales' => $sales->id])->get();


foreach ($sacust as $key) {
    $cust = Customers::findOrFail($key->id_customer);
}
$pdf->SetFont('Arial', 'B', 11);
$pdf->SetRightMargin(10);
$pdf->SetLeftMargin(10);
$pdf->SetY(47);
$pdf->MultiCell(0, 5, 'Invoice Number : ', 0, 'L');
$pdf->MultiCell(0, 5, 'Invoice Date : ', 0, 'L');
$pdf->MultiCell(0, 5, 'Vehicle Reg : ', 0, 'L');
$pdf->MultiCell(0, 5, 'Make : ', 0, 'L');
$pdf->MultiCell(0, 5, 'Transmission : ', 0, 'L');
$pdf->MultiCell(0, 5, 'Model : ', 0, 'L');
$pdf->MultiCell(0, 5, 'Color : ', 0, 'L');
$pdf->MultiCell(0, 5, 'Chassis Number : ', 0, 'L');
$pdf->MultiCell(0, 5, 'Engine Number : ', 0, 'L');
$pdf->MultiCell(0, 5, 'Date of Registration : ', 0, 'L');
$pdf->MultiCell(0, 5, 'Current Mileage : ', 0, 'L');
$pdf->MultiCell(0, 5, 'MOT Included : ', 0, 'L');
$pdf->MultiCell(0, 5, 'TAX Included : ', 0, 'L');

    $pdf->SetFont('Arial', '', 11);
    $pdf->SetRightMargin(10);
    $pdf->SetLeftMargin(60);
    $pdf->SetY(47);
    $pdf->MultiCell(0, 5, $sales->id, 0, 'L');
    $pdf->MultiCell(0, 5, date('d/m/Y', strtotime($vehicle->invoiceDate)), 0, 'L');
    $pdf->MultiCell(0, 5, $vehicle->RegNumber, 0, 'L');
    $pdf->MultiCell(0, 5, $vehicle->make, 0, 'L');
    $pdf->MultiCell(0, 5, $vehicle->transmission, 0, 'L');
    $pdf->MultiCell(0, 5, $vehicle->model, 0, 'L');
    $pdf->MultiCell(0, 5, $vehicle->colour, 0, 'L');
    $pdf->MultiCell(0, 5, $vehicle->chassisNumber, 0, 'L');
    $pdf->MultiCell(0, 5, $vehicle->engNum, 0, 'L');
    $pdf->MultiCell(0, 5, $vehicle->dateRegist, 0, 'L');
    $pdf->MultiCell(0, 5, $vehicle->currentMileage, 0, 'L');
    $pdf->MultiCell(0, 5, $vehicle->mot. ' Months', 0, 'L');
    $pdf->MultiCell(0, 5, $vehicle->roadtax. ' Months', 0, 'L');
    $pdf->Ln(10);
    $pdf->SetFont('Arial', 'B', 15);
    $pdf->SetTextColor(145, 0, 181);
    $pdf->SetFillColor(200, 220, 255);
    $pdf->Line(0, 140, 250, 140);
    $pdf->Ln(5);
    $pdf->SetX(10);
    $pdf->SetRightMargin(10);
    $pdf->SetLeftMargin(10);
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Ln(16);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(130, 7, 'Description', 1, 0, 'C');
    $pdf->Cell(30, 7, 'Quantity', 1, 0, 'C');
    $pdf->Cell(30, 7, 'Amount', 1, 1, 'C');
    $pdf->SetFont('Arial', '', 10);
   
    if($vehicle->VAT) {
          $vat = $vehicle->price * $vehicle->quantity - (($vehicle->price * $vehicle->quantity) / $vehicle->VAT);
     }
  
    if ($vehicle->VAT) {
        $amount = $vehicle->price * $vehicle->quantity - $vat;
        
        $total_amount =
        $amount +
        $vat -
        $vehicle->finance_paid -
        $vehicle->deposit_paid -
        $vehicle->part_exchange +
        $vehicle->delivery_fee +
        $vehicle->warrantyCost -
        $vehicle->discount;
    }
    else {
        $amount = $vehicle->price * $vehicle->quantity;
        $total_amount =
        $amount +        
        $vehicle->finance_paid -
        $vehicle->deposit_paid +
        $vehicle->part_exchange +
        $vehicle->delivery_fee +
        $vehicle->warrantyCost -
        $vehicle->discount;
    }

    $pdf->Cell(
        130,
        7,
        $vehicle->make.', '.$vehicle->model.', '.$vehicle->colour,
        1,
        0,
        'C'
    );
    $pdf->Cell(30, 7, $vehicle->quantity, 1, 0, 'C');

    $pdf->Cell(30, 7, number_format($amount), 1, 1, 'C');

    // if ($vehicle->business_name) {
    //     $pdf->Cell(130, 7, 'VAT Qualifying Vehicle', 1, 0, 'C');
    //     $pdf->Cell(30, 7, '1.2%', 1, 0, 'C');
    //     $pdf->Cell(30, 7, number_format($amount - $amount / 1.2), 1, 1, 'C');
    // }


    if ($vehicle->VAT) {
        $pdf->Cell(130, 7, 'VAT', 1, 0, 'C');
        $pdf->Cell(30, 7, '1', 1, 0, 'C');
        if ($vehicle->VAT > 0) {
            $pdf->Cell(30, 7, $vehicle->VAT, 1, 1, 'C');
        }
    }
    if ($vehicle->warranty) {
        $pdf->Cell(130, 7, 'Warranty', 1, 0, 'C');
        $pdf->Cell(30, 7, $vehicle->warranty. ' Months', 1, 0, 'C');
        $pdf->Cell(
            30,
            7,
            number_format($vehicle->warrantyCost),
            1,
            1,
            'C'
        );
    }

    if ($vehicle->delivery_fee) {
        $pdf->Cell(
            130,
            7,
            'Delivery Fee',
            1,
            0,
            'C'
        );
        $pdf->Cell(30, 7, '1', 1, 0, 'C');
        $pdf->Cell(30, 7, number_format($vehicle->delivery_fee), 1, 1, 'C');
    }
    if ($vehicle->discount) {
        $pdf->Cell(130, 7, 'Discount', 1, 0, 'C');
        $pdf->Cell(30, 7, '1', 1, 0, 'C');
        if ($vehicle->discount > 0) {
            $pdf->Cell(30, 7, number_format($vehicle->discount), 1, 1, 'C');
        } else {
            $pdf->Cell(30, 7, number_format($vehicle->discount), 1, 1, 'C');
        }
    }
    if ($vehicle->part_exchange) {
        $pdf->Cell(
            130,
            7,
            'Part Exchange,' . $vehicle->part_exchange,
            1,
            0,
            'C'
        );
        $pdf->Cell(30, 7, '1', 1, 0, 'C');
        if ($vehicle->part_exchange > 0) {
            $pdf->Cell(
                30,
                7,
                number_format($vehicle->part_exchange),
                1,
                1,
                'C'
            );
        } else {
            $pdf->Cell(
                30,
                7,
                number_format($vehicle->part_exchange),
                1,
                1,
                'C'
            );
        }
    }

    if ($vehicle->deposit_paid) {
        $pdf->Cell(130, 7, 'Deposit Paid', 1, 0, 'C');
        $pdf->Cell(30, 7, '1', 1, 0, 'C');
        if ($vehicle->deposit_paid > 0) {
            $pdf->Cell(30, 7, number_format($vehicle->deposit_paid), 1, 1, 'C');
        } else {
            $pdf->Cell(30, 7, number_format($vehicle->deposit_paid), 1, 1, 'C');
        }
    }

    if ($vehicle->finance_paid) {
        $pdf->Cell(130, 7, 'Finance Paid', 1, 0, 'C');
        $pdf->Cell(30, 7, '1', 1, 0, 'C');
        if ($sales->finance_paid > 0) {
            $pdf->Cell(30, 7, number_format($vehicle->finance_paid), 1, 1, 'C');
        } else {
            $pdf->Cell(30, 7, number_format($vehicle->finance_paid), 1, 1, 'C');
        }
    }

    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Cell(130, 7, '', 0, 0, 'C');
    $pdf->Cell(30, 7, 'Total', 1, 0, 'C');
    $pdf->Cell(30, 7, '' . number_format($total_amount), 1, 1, 'C');
    $pdf->Cell(130, 7, '', 0, 0, 'C');
    $pdf->Cell(30, 7, 'Paid', 1, 0, 'C');
    $pdf->Cell(30, 7, $vehicle->payment_method, 1, 1, 'C');

    $pdf->Ln(5);
}
$pdf->SetFont('Arial', '', 6);
$pdf->SetY(-31);
$pdf->Cell(
    0,
    4,
    'Invoice was created on a computer and is valid without the signature and seal.',
    0,
    1,
    'L'
);
$pdf->Cell(
    0,
    4,
    'NOTICE: A finance charge of 1.5% will be made on unpaid balances after 30 days from the date of the invoice.',
    0,
    1,
    'L'
);

$filename = 'Invoice for ' . $cust->client . '.pdf';

$pdf->Output('I', $filename);


?>
