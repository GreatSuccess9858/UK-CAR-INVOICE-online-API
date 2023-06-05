<<@extends('layout.master')

@section('content')
@include('layout.errorform')
@include('layout.info')
<div id="regiration_form">
    {!! Form::open(['route' => 'customers.store', 'class' => 'form-horizontal', 'id' => 'form']) !!}
    @csrf
    <input type="text" name="type" value="update" hidden="">
<fieldset id="step-1">
<div id="invoice_creation" style="margin-top:80px;">
    <div id="invoice_titlebar">
        <h2 style="text-align: center;">New Invoice</h2>
    </div>
    <br />
    <div class="row">
        <div class="col-md-6" id="client_info">
            <div class="row d-flex align-center">
                <div class="form-group col-md-10" id="client_select">
                    <!-- {!! Form::label('Client : ', 'Client Details :') !!} -->
                    <?php
                        if (auth()->user()->id_group == 1) {
                            $rc = App\Customers::get();
                        } else {
                            $rc = App\Customers::where(['id_user' => auth()->user()->id])->get();
                        }
                    ?>
                    <select name="repeatcust" id="custsel" class="form-control">
                        <option value="">Choose Customer</option>
                        @if( $rc->count() > 0 )
                            @foreach( $rc as $ec ) :
                                <option value="{!! $ec->id !!}"
                                    data-client="{!! $ec->client !!}"
                                    data-client_address="{!! $ec->client_address !!}"
                                    data-id="{!! $ec->id !!}"
                                    data-date="{!! date('d/m/Y', strtotime($ec->updated_at))  !!}"
                                    data-client_poskod="{!! $ec->client_poskod !!}"
                                    data-client_email="{!! $ec->client_email !!}"
                                    data-client_phone="{!! $ec->client_telephone !!}"
                                    data-mobile_phone="{!! $ec->client_mobile !!}" data-country="{!! $ec->country !!}"
                                    data-city="{!! $ec->city !!}" data-state="{!! $ec->state_province !!}"
                                    data-address_line2="{!! $ec->address_line2 !!}">
                                    {!! $ec->client !!}
                                </option>
                            @endforeach
                        @endif
                    </select>

                </div>
                    <div class="col-md-2">
                        <input type="checkbox" name="business" id="business">
                        <label class="form-label ">business</label>
                    </div>
                </div>
            <div id="client_detail">
                <div class="form-group container " style="margin-bottom:20px">
                    <label class="form-label ">Full Name:</label>
                    <div class="form-control-wrap col-sm-12">
                        <input type="text" name="clientname" class="form-control" id="fullname" placeholder="Enter the Name"
                            >
                    </div>
                </div>
                <div class="form-group container " style="margin-bottom:20px">
                    <label class="form-label ">Email:</label>
                    <div class="form-control-wrap col-sm-8">
                        <input type="email" name="clientemail" class="form-control" id="mail" placeholder="Email" >
                    </div>
                </div>
                <div class="form-group container d-flex" style="margin-bottom:20px">
                    <div class="col-sm-6">
                        <label class="form-label ">Street Address:</label>
                        <div class="form-control-wrap  ">
                            <input type="text" name="clientadd" class="form-control" id="sAddress"
                                placeholder="Street Address" >
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <label class="form-label ">Address line 2 :</label>
                        <div class="form-control-wrap  ">
                            <input type="text" name="clientaddd" class="form-control" id="addressLine2"
                                placeholder="Address line 2" >
                        </div>
                    </div>
                </div>
                <div class="form-group container d-flex" style="margin-bottom:20px">
                    <div class="col-sm-4">
                        <label class="form-label ">City:</label>
                        <div class="form-control-wrap  ">
                            <input type="text" name="clientcity" class="form-control" id="city" placeholder="City" >
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label ">State: </label>
                        <div class="form-control-wrap  ">
                            <input type="text" name="clientstate" class="form-control" id="state" placeholder="State"
                                >
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label ">Postal/Zip Code :</label>
                        <div class="form-control-wrap  ">
                            <input type="text" name="clientzip" class="form-control" id="pos" placeholder="Postal/Zip Code"
                                >
                        </div>
                    </div>
                </div>
                <div class="form-group container d-flex" style="margin-bottom:20px">
                    <div class="col-sm-6">
                        <label class="form-label ">Telephone :</label>
                        <div class="form-control-wrap  ">
                            <input type="text" name="clienttel" class="form-control" id="tel" placeholder="Telephone"
                                >
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <label class="form-label ">Mobile :</label>
                        <div class="form-control-wrap  ">
                            <input type="text" name="clientmob" class="form-control" id="mobilePhone"
                                placeholder="Mobile Phone" >
                        </div>
                    </div>
                </div>
                <div class="form-group container" style="margin-bottom:20px">
                    <label class="form-label ">Country:</label>
                    <div class="form-control-wrap col-sm-12">
                        <input type="text" name="clientcountry" class="form-control" id="country" placeholder="Country"
                            >
                    </div>
                </div>

            <div id="business-details" class= "container" style="display:none;">
                <div class="row ">
                    <div class="form-group container  {!! ( count($errors->get('client'))  > 0 )? 'has-error' : '' !!} " >
                <!-- {!! Form::label('pel', 'Full Name :', ['class' => 'col-sm-8 control-label']) !!} -->

                        <div class="col-sm-12" style="margin-bottom: 10px">--- Business Information ---</div>
                        <div class="col-sm-12" style="margin-bottom: 20px;">
                            <input type="text"  class="form-control" name="business_name" id="business_name" placeholder="Business Name">
                        </div>
                <!-- {!! Form::label('tela', 'Email :', ['class' => 'col-sm-8 control-label']) !!} -->
                        <div class="col-sm-12" style="margin-bottom: 20px;">
                            <input type="text"  class="form-control" name="vatNum" id="vatNum" placeholder="VAT Number">
                        </div>
                    </div>
                </div><br />

                <br />
            </div>
        </div>
    </div>
    <div class="col-md-5" id="vehicle_info"><br />
            {!! Form::label('vehicle : ', 'Vehicle Details :') !!}
           <div id="VehicleError"></div>
           <table class="table table-bordered" id="vInfoTable">
           <tr>
                <th>Invoice Number :</th>
                <td>
                    <div class="row" style="padding-left: 10%;">
                        <input type="text" class="form-control col-md-8" value="{{ $id }}" readonly name="invoiceId" id="invoiceId">
                    </div>
                </td>
            </tr>
            <tr>
                <th>Invoice Date :</th>
                <td>
                    <div class="row" style="padding-left: 10%;">
                        <input type="date" class="form-control col-md-8" value="{{ $date }}" name="invoiceDate" id="invoiceDate">
                    </div>
                </td>
            </tr>
            <tr>
                <th>Vehicle registration:</th>
                <td>
                    <div class="row" style="padding-left: 10%;">
                        {!! Form::input('text', 'regNum', @$value, ['class' => 'form-control col-md-8', 'placeholder' => '',
                        'id' => 'regNum']) !!}
                        <div class="input-group-prepend">
                            <span class="btn btn-outline-primary" id="checkDataButton">Check</span>
                        </div>
                        &nbsp;&nbsp;&nbsp;
                    </div>
                </td>
            </tr>
        <tr>
            <th>Make :</th>
            <td>
                <div class="row" style="padding-left: 10%;">
                    {!! Form::input('text', 'make', @$value, ['class' => 'form-control col-md-8',
                    'placeholder' => '', 'readonly',
                    'id' => 'make']) !!}
                </div>
            </td>
        </tr>
        <tr>
            <th>Model :</th>
            <td>
                <div class="row" style="padding-left: 10%;">
                    {!! Form::input('text', 'model', @$value, ['class' => 'form-control col-md-8', 'placeholder' => '',
                    'id' => 'model', 'readonly']) !!}
                </div>
            </td>
        </tr>
        <tr>
            <th>Colour :</th>
            <td>
                <div class="row" style="padding-left: 10%;">
                    {!! Form::input('text', 'colour', @$value, ['class' => 'form-control col-md-8', 'placeholder' => '',
                    'id' => 'colour', 'readonly']) !!}
                </div>
            </td>
        </tr>
        <tr>
            <th>Transmission :</th>
            <td>
                <div class="row" style="padding-left: 10%;">
                    {!! Form::input('text', 'transmission', @$value, ['class' => 'form-control col-md-8', 'placeholder' => '',
                    'id' => 'transmission', 'readonly']) !!}
                </div>
            </td>
        </tr>
        <tr>
            <th>Chassis Number :</th>
            <td>
                <div class="row" style="padding-left: 10%;">
                    <input type="text" class="form-control col-md-8" name="chassisNumber" id="chassisNumber">
                </div>
            </td>
        </tr>
        <tr>
            <th>Engine Number :</th>
            <td>
                <div class="row" style="padding-left: 10%;">
                    {!! Form::input('engNum', 'engNum', @$value, ['class' => 'form-control col-md-8', 'placeholder' => '',
                    'id' => 'engNum', 'readonly']) !!}
                </div>
            </td>
        </tr>
        <tr>
            <th>Date of Registration :</th>
            <td>
                <div class="row" style="padding-left: 10%;">
                    <input type="text" readonly class="form-control col-md-8" name="dateRegist" id="dateRegist">
                </div>
            </td>
        </tr>
        <tr>
            <th>Current Mileage :</th>
            <td>
                <div class="row" style="padding-left: 10%;">
                    <input type="text" class="form-control col-md-8" name="currentMileage" id="currentMileage">
                </div>
            </td>
        </tr>
        <tr>
            <th>MOT :</th>
            <td>
                <div class="row" style="padding-left: 10%;">
                    <input type="text" class="form-control col-md-8" min="1" max="12" required name="mot" id="mot">
                </div>
            </td>
        </tr>
        <tr>
            <th>Road Tax :</th>
            <td>
                <div class="row" style="padding-left: 10%;">
                    <input type="text" class="form-control col-md-8" min="1" max="12" required name="roadtax" id="roadtax">
                </div>
            </td>
        </tr>
        <!-- <tr>
            <th>Weight :</th>
            <td>
                <div class="row" style="padding-left: 10%;">
                    {!! Form::input('text', 'weight', @$value, ['class' => 'form-control col-md-8', 'placeholder' => '',
                    'id' => 'weight']) !!}
                </div>
            </td>
        </tr>
        <tr>
            <th>Body Style :</th>
            <td>
                <div class="row" style="padding-left: 10%;">
                    {!! Form::input('text', 'bodyStyle', @$value, ['class' => 'form-control col-md-8', 'placeholder' =>
                    '', 'id' => 'bodyStyle']) !!}
                </div>
            </td>
        </tr>
        <tr>
            <th>Exported :</th>
            <td>
                <div class="row" style="padding-left: 10%;">
                    {!! Form::input('text', 'exported', @$value, ['class' => 'form-control col-md-8', 'placeholder' =>
                    '', 'id' => 'exported']) !!}
                </div>
            </td>
        </tr>
        <tr>
            <th>Gear box :</th>
            <td>
                <div class="row" style="padding-left: 10%;">
                    {!! Form::input('text', 'gearBox', @$value, ['class' => 'form-control col-md-8', 'placeholder' =>
                    '', 'id' => 'gearBox']) !!}
                </div>
            </td>
        </tr>
        <tr>
            <th>Model Setup Date :</th>
            <td>
                <div class="row" style="padding-left: 10%;">
                    {!! Form::input('text', 'modelSetupDate', @$value, ['class' => 'form-control col-md-8',
                    'placeholder' => '', 'id' => 'modelSetupDate']) !!}
                </div>
            </td>
        </tr>
        <tr>
            <th>First Registered :</th>
            <td>
                <div class="row" style="padding-left: 10%;">
                    {!! Form::input('text', 'firRegis', @$value, ['class' => 'form-control col-md-8', 'placeholder' =>
                    '', 'id' => 'firRegis']) !!}
                </div>
            </td>
        </tr> -->
           </table>
          </div>
<input type="button" name="next" class="next btn btn-info" value="Next" />
</fieldset>
<fieldset id="step-2">
    <div id="invoice_creation" style="margin-top:80px;">
        <div id="invoice_titlebar">
            <h2 style="text-align: center;">New Invoice</h2>
        </div>
        <br/>
            <div class="form-group container d-flex" style="margin-bottom:20px">
                <div class="col-sm-2">
                    <input type="checkbox" name="chkcc9" id="group1">
                    <label class="form-label ">Price:</label>
                </div>
                <div class="col-sm-5">

                    <div class="form-control-wrap  ">
                        <input type="text" name="total_price" class="form-control group1" id="total_price" placeholder="Price" required>
                    </div>
                </div>
                <div class="col-sm-5">
                    <!-- <input type="checkbox" name="chkcc9" id="group1"> -->
                    <!-- <label class="form-label ">Quantity:</label> -->
                    <div class="form-control-wrap  ">
                        <input type="text" name="quantity" class="form-control group2" id="state" placeholder="Quantity"
                            required>
                    </div>
                </div>

            </div>
            <div class="form-group container d-flex" style="margin-bottom:20px">
                <div class="col-sm-2">  <input type="checkbox" name="chkcc9" id="group3">
                    <label class="form-label ">Warranty:</label></div>
                <div class="col-sm-5">

                    <div class="form-control-wrap  ">
                        <input type="text" name="warranty" class="form-control group3" id="warranty" placeholder="Length"
                            required>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="form-control-wrap  ">
                        <input type="text" name="warrantyCost" class="form-control group3" id="warrantyCost" placeholder="Cost"
                            required>
                    </div>
                </div>
            </div>
            <div class="form-group container d-flex" style="margin-bottom:20px">
                <div class="col-sm-2">
                    <input type="checkbox" name="chkcc9" id="group4">
                    <label class="form-label ">Delivery</label>
                </div>

                <div class="col-sm-3">
                    <div class="form-control-wrap  ">
                        <input type="text" name="delivery_fee" class="form-control group4" id="delivery_fee" placeholder="Delivery Fee" required>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-control-wrap  ">
                        <input type="text" name="delivery_add" class="form-control group4" id="delivery_add" placeholder="Address">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-control-wrap  ">
                        <input type="text" name="delivery_add2" class="form-control group4" id="delivery_add2" placeholder="Address2">
                    </div>
                </div>
            </div>
            <div class="form-group container d-flex" style="margin-bottom:20px">
                <div class="col-sm-2">
                </div>
                <div class="col-sm-4">
                    <div class="form-control-wrap  ">
                        <input type="text" name="delivery_city" class="form-control group4" id="delivery_city" placeholder="City">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-control-wrap  ">
                        <input type="text" name="delivery_poskod" class="form-control group4" id="delivery_poskod" placeholder="Postal Code">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-control-wrap  ">
                        <input type="text" name="delivery_country" class="form-control group4" id="delivery_country" placeholder="Country">
                    </div>
                </div>
            </div>

            <div class="form-group container d-flex" style="margin-bottom:20px">
                <div class="col-sm-2">
                    <input type="checkbox" name="chkcc9" id="group7">
                    <label class="form-label ">Part Exchange:</label>
                </div>
                <div class="col-sm-5">
                    <div class="form-control-wrap  ">
                        <input type="text" name="part_exchange_detail" class="form-control group7" id="part_exchange_detail" placeholder="Part Exchange Information" required>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="form-control-wrap  ">
                        <input type="text" name="part_exchange" class="form-control group7" id="part_exchange" placeholder="Part Exchange Cost" required>
                    </div>
                </div>


            </div>
            <div class="form-group container d-flex" style="margin-bottom:20px">
                <div class="col-sm-4">
                    <input type="checkbox" name="chkcc9" id="group6">
                    <label class="form-label ">Discount:</label>
                    <div class="form-control-wrap  ">
                        <input type="text" name="discount" class="form-control group6" id="discount" placeholder="Discount"
                            required>
                    </div>
                </div>
                <div class="col-sm-4">
                    <input type="checkbox" name="chkcc9" id="group8">
                    <label class="form-label ">Deposit Paid:</label>
                    <div class="form-control-wrap  ">
                        <input type="text" name="deposit_paid" class="form-control group8" id="deposit_paid" placeholder="Deposit Paid"
                            required>
                    </div>
                </div>
                <div class="col-sm-4">
                    <input type="checkbox" name="chkcc9" id="group9">
                    <label class="form-label ">Finance Paid:</label>
                    <div class="form-control-wrap  ">
                        <input type="text" name="finance_paid" class="form-control group9" id="finance_paid" placeholder="Finance Paid"
                            required>
                    </div>
                </div>
            </div>
            <div class="form-group container d-flex" style="margin-bottom:20px">
                <div class="col-sm-4 vat-div">
                    <input type="checkbox" id="check_vat">
                    <label class="form-label ">VAT Allow:</label>
                    <div id="vattext"></div>
                </div>
            </div>
            <div class="form-group container d-flex" style="margin-bottom:20px">
            <div class="col-sm-2">
                <label class="form-label ">Payment Method:</label>
            </div>
            <div class="col-sm-2">
                    <input type="radio" name="payment_method" value="Card" class="" required>
                <label class="form-label ">Card:</label>
            </div>
            <div class="col-sm-2">
                    <input type="radio" name="payment_method" value="Cash" class="" required>
                <label class="form-label ">Cash:</label>
            </div>
            <div class="col-sm-2">
                    <input type="radio" name="payment_method" value="Bank Transfer" class="" required>
                <label class="form-label ">Bank Transfer:</label>
            </div>
        </div>
        <div class="row">
            <div class="mt-3 text-right" style="margin-left: 15%;">
                {!! Form::submit('Submit', ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    </div>
 </fieldset>
<div>
<script src="{{ asset('admin/js/jquery.min.js') }}"></script>
<script>
var _validFileExtensions = [".pdf", ".docx", ".jpg", ".jpeg", ".bmp", ".gif", ".png", ".jfif", ".pjpeg", ".pjp"];
var _filenum = 0;
var isfiles = true;

$(document).ready(function() {
    $("#check_vat").click(function(){
        if (this.checked == 1) {
            $("#vattext").append('<input type="text" hidden name="VAT" id="vattextval" value="1.2">');
        } else if (this.checked == 0){
            $("#vattextval").remove();
        }
    });
    var attach_number = 0;
    var max_attach = 7;
    var wrapper = $(".attach_list");

    $(".add_attach").click(function(e) {
        e.preventDefault();
        if (attach_number < max_attach) {
            attach_number++;
            $(".add-des-" + attach_number).css('display', 'flex');
            $('#desc_num').val(attach_number);
        } else {
            alert('You Reached the limits')
        }
    });

$(function() {
  enable_business();
  $("#business").click(enable_business);
});

function enable_business() {
  if (this.checked) {
      $("#business-details").css("display","block");

  } else {
     $("#business-details").css("display","none");
  }
}


$(function() {
  enable_cb1();
  $("#group1").click(enable_cb1);
});

function enable_cb1() {
  if (this.checked) {
    $("input.group1").removeAttr("disabled");
     $("input.group2").removeAttr("disabled");
  } else {
    $("input.group1").attr("disabled", true);
    $("input.group2").attr("disabled", true);
  }
}
// $(function() {
//   enable_cb2();
//   $("#group2").click(enable_cb2);
// });

// function enable_cb2() {
//   if (this.checked) {
//     $("input.group2").removeAttr("disabled");
//   } else {
//     $("input.group2").attr("disabled", true);
//   }
// }
$(function() {
    enable_cb10();
    $("#group10").click(enable_cb10);
});


$(function() {
  enable_cb3();
  $("#group3").click(enable_cb3);
});

function enable_cb3() {
  if (this.checked) {
    $("input.group3").removeAttr("disabled");
  } else {
    $("input.group3").attr("disabled", true);
  }
}
$(function() {
  enable_cb4();
  $("#group4").click(enable_cb4);
});

function enable_cb4() {
  if (this.checked) {
    $("input.group4").removeAttr("disabled");
      $('#delivery_add').val($('#sAddress').val());
      $('#delivery_add2').val($('#addressLine2').val());
      $('#delivery_city').val($('#city').val());
      $('#delivery_country').val($('#country').val());
      $('#delivery_poskod').val($('#pos').val());
  } else {
    $("input.group4").attr("disabled", true);
      $('#delivery_add').val("");
      $('#delivery_add2').val("");
      $('#delivery_city').val("");
      $('#delivery_country').val("");
      $('#delivery_poskod').val("");
  }
}
$(function() {
  enable_cb5();
  $("#group5").click(enable_cb5);
});

function enable_cb5() {
  if (this.checked) {
    $("input.group5").removeAttr("disabled");
  } else {
    $("input.group5").attr("disabled", true);
  }
}$(function() {
  enable_cb6();
  $("#group6").click(enable_cb6);
});

function enable_cb6() {
  if (this.checked) {
    $("input.group6").removeAttr("disabled");
  } else {
    $("input.group6").attr("disabled", true);
  }
}
$(function() {
  enable_cb7();
  $("#group7").click(enable_cb7);
});

function enable_cb7() {
  if (this.checked) {
    $("input.group7").removeAttr("disabled");
  } else {
    $("input.group7").attr("disabled", true);
  }
}
$(function() {
  enable_cb8();
  $("#group8").click(enable_cb8);
});

function enable_cb8() {
  if (this.checked) {
    $("input.group8").removeAttr("disabled");
  } else {
    $("input.group8").attr("disabled", true);
  }
}
$(function() {
  enable_cb9();
  $("#group9").click(enable_cb9);
});

function enable_cb9() {
  if (this.checked) {
    $("input.group9").removeAttr("disabled");
  } else {
    $("input.group9").attr("disabled", true);
  }
}



    // $("body").on("click", ".remove_attach", function() {
    //     $(".add-des-" + attach_number).css('display', 'none');
    //     attach_number--;
    //     // var parent = this.parentNode;
    //     // $(this).parents(".file-item").remove();
    // });
    // $("#individual").click(function(e){
    //     e.preventDefault();
    //     $("#business-details").css("display","none");
    // });
    //     $("#business").click(function(e){
    //     e.preventDefault();
    //     $("#business-details").css("display","block");
    // });
});
</script>
<script>
    $(document).ready(function(){

        $(".next").click(function(){
            var mod = $("#mot").val();
            var roadtax = $("#roadtax").val();

            if(mod <= 0 || mod > 12 || roadtax <= 0 || roadtax > 12){
                alert("MOT & Road Tax Value must be between 1-12");
            }else{
                $("#step-2").show();
                $("#step-1").hide();
            }
        });
    });
</script>
<script>
$(document).ready(function() {

    $("#getData").click(function(e) {
        e.preventDefault();
        var regNumber = $("#registerNumber").val();

        if (regNumber == '') {
            alert("Please input a Registration Number!");
        } else {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/getVehicleData',
                type: 'POST',
                data: {
                    'reguisNum': regNumber
                },
                success: function(response) {
                    if ($("#vehicleDataDisplay").is(":visible")) {
                        $("#vehicleDataDisplay").hide();
                    } else {
                        $("#vehicleDataDisplay").show();
                    }
                }
            });
        }
    });

    $('#submit').click(function() {
        var clientId = $('#custsel').val();

        var make = $('#make').val();
        var model = $('#model').val();
        var colour = $('#colour').val();
        var engnum = $('#engNum').val();
        var firregis = $('#firRegis').val();
        var token = $("input[name='_token']").val();
        var regNum = $('#regNum').val();
        var id = $('#')
        $.ajax({
            dataType: 'JSON',
            url: '{{ route("customers.store") }}',
            type: 'POST',
            data: {
                _token: token,
                regNum,
                clientId,
                make,
                model,
                colour,
                engnum,
                weight,
                firregis
            },
            success: function(data) {
                if (data == 1) {
                    window.location.replace("/sales/index")
                }
            },
            error: function(data) {
                console.log(data);
            }
        });


    });

    $('#checkDataButton').click(function() {
        var regNum = $('#regNum').val();

        $.ajax({
            dataType: 'JSON',
            url: 'https://uk1.ukvehicledata.co.uk/api/datapackage/VehicleData?v=2&api_nullitems=1&auth_apikey=90a55893-3635-4941-967e-254415d0bc78&user_tag=&key_VRM=' +
                regNum,
            type: 'GET',
            success: function(data) {
                if (data.Response.StatusCode == "Success") {

                    //  const registDate =

                    $('#make').val(data.Response.DataItems.VehicleRegistration.Make);
                    $('#model').val(data.Response.DataItems.VehicleRegistration.Model);
                    $('#colour').val(data.Response.DataItems.VehicleRegistration.Colour);
                    $('#transmission').val(data.Response.DataItems.VehicleRegistration.Transmission);
                    $('#engNum').val(data.Response.DataItems.VehicleRegistration
                        .EngineNumber);
                    var date = data.Response.DataItems.VehicleRegistration
                        .DateFirstRegisteredUk;

                    function formatDate(date) {
                        var d = new Date(date),
                            month = '' + (d.getMonth() + 1),
                            day = '' + d.getDate(),
                            year = d.getFullYear();

                        if (month.length < 2)
                            month = '0' + month;
                        if (day.length < 2)
                            day = '0' + day;

                        return [day, month, year].join('/');
                    }


                    var year = formatDate(date);
                    $('#dateRegist').val(year);
                } else if (data.Response.StatusCode == "ItemNotFound") {
                    $('#make').val("");
                    $('#model').val("");
                    $('#colour').val("");
                    $('#engNum').val("");
                    $('#dateRegist').val("");
                    $('#VehicleError').append(
                        '<div class="alert alert-danger alert-dismissible fade show" style="width:90%;" role="alert">Error: <strong>Vehicle Not Found!</strong><button type="button" class="close" data-dismiss="alert" style="margin-top:22px;" aria-label="Close"></button></div>'
                    );
                }
            },
            error: function(data) {
                console.log(data);
            }
        });


    });

    $("#custsel").change(function() {
        const client = $('option:selected', this).attr('data-client');
        const address = $('option:selected', this).attr('data-client_address');
        const poskod = $('option:selected', this).attr('data-client_poskod');
        const email = $('option:selected', this).attr('data-client_email');
        const phone = $('option:selected', this).attr('data-client_phone');
        const mobile = $('option:selected', this).attr('data-mobile_phone');
        const country = $('option:selected', this).attr('data-country');
        const city = $('option:selected', this).attr('data-city');
        const state = $('option:selected', this).attr('data-state');
        const addressLine2 = $('option:selected', this).attr('data-address_line2');
        const dataId = $('option:selected', this).attr('data-id');
        const dataDate = $('option:selected', this).attr('data-date');
        const delivery_add = $('option:selected', this).attr('data-client_address');

        $('#mail').val(email);
        $('#fullname').val(client);
        $('#sAddress').val(address);
        $('#pos').val(poskod);
        $('#tel').val(phone);
        $('#country').val(country);
        $('#city').val(city);
        $('#state').val(state);
        $('#addressLine2').val(addressLine2);
        $('#mobilePhone').val(mobile);
    })

    $('#nalpa').click(function() {
        console.log('tela');
    })
});
</script>
@endsection>>