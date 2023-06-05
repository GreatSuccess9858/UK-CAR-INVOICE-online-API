@extends('layout.master')

@section('content')
@include('layout.errorform')
@include('layout.info')

<div id="invoice_creation" style="margin-top:80px;">
    <div id="invoice_titlebar">
        <h2 style="text-align: center;">New Invoice</h2>
    </div>
    <br />
    <div class="row">
        <div class="col-md-6" id="client_info">
            <div class="row">
                <div class="form-group col-md-10" id="client_select">
                    {!! Form::label('Client : ', 'Client Details :') !!}
                    <select name="repeatcust" id="custsel" class="form-control">
                        <option value="">Choose Customer</option>
                        <?php $rc = \App\Customers::all() ?>
                        @if( $rc->count() > 0 )
                        @foreach( $rc as $ec ) :
                        <option value="{!! $ec->id !!}" data-client="{!! $ec->client !!}"
                            data-client_address="{!! $ec->client_address !!}"
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
                    <button class="btn btn-outline-primary" type="submit" style="margin-top: 55%;">View</button>
                </div>
            </div>
            <div id="client_detail">
                {!! Form::open(['route' => 'customers.store', 'class' => 'form-horizontal', 'id' => 'form']) !!}
                @csrf
                <div class="form-group container ">
                    <label class="form-label ">Full Name:</label>
                    <div class="form-control-wrap col-sm-12">
                        <input type="text" name="clientname" class="form-control" id="fullname" placeholder="Enter the Name"
                            required>
                    </div>
                </div>

                <div class="form-group container ">
                    <label class="form-label ">Email:</label>
                    <div class="form-control-wrap col-sm-8">
                        <input type="email" name="clientemail" class="form-control" id="mail" placeholder="Email" required>
                    </div>
                </div>

                <div class="form-group container d-flex">
                    <div class="col-sm-6">
                        <label class="form-label ">Street Address:</label>
                        <div class="form-control-wrap  ">
                            <input type="text" name="clientadd" class="form-control" id="sAddress"
                                placeholder="Street Address" required>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <label class="form-label ">Address line 2 :</label>
                        <div class="form-control-wrap  ">
                            <input type="text" name="clientaddd" class="form-control" id="addressLine2"
                                placeholder="Address line 2" required>
                        </div>
                    </div>
                </div>

                <div class="form-group container d-flex">
                    <div class="col-sm-4">
                        <label class="form-label ">City:</label>
                        <div class="form-control-wrap  ">
                            <input type="text" name="clientcity" class="form-control" id="city" placeholder="City" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label ">State:</label>
                        <div class="form-control-wrap  ">
                            <input type="text" name="clientstate" class="form-control" id="state" placeholder="State"
                                required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label ">Postal/Zip Code :</label>
                        <div class="form-control-wrap  ">
                            <input type="text" name="clientzip" class="form-control" id="pos" placeholder="Postal/Zip Code"
                                required>
                        </div>
                    </div>
                </div>
                <div class="form-group container d-flex">
                    <div class="col-sm-6">
                        <label class="form-label ">Telephone :</label>
                        <div class="form-control-wrap  ">
                            <input type="text" name="clienttel" class="form-control" id="tel" placeholder="Telephone"
                                required>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <label class="form-label ">Mobile :</label>
                        <div class="form-control-wrap  ">
                            <input type="text" name="clientmob" class="form-control" id="mobilephone"
                                placeholder="Mobile Phone" required>
                        </div>
                    </div>
                </div>

                <div class="form-group container">
                    <label class="form-label ">Country:</label>
                    <div class="form-control-wrap col-sm-12">
                        <input type="text" name="clientcountry" class="form-control" id="country" placeholder="Country"
                            required>
                    </div>
                </div>
                <div class="form-group container d-flex">
                    <div class="col-sm-4">
                        <label class="form-label ">Price:</label>
                        <div class="form-control-wrap  ">
                            <input type="text" name="vehicleprice" class="form-control" id="vehicleprice" placeholder="Price" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label ">Quantity:</label>
                        <div class="form-control-wrap  ">
                            <input type="text" name="quantity" class="form-control" id="state" placeholder="Quantity"
                                   required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label ">Warranty:</label>
                        <div class="form-control-wrap  ">
                            <input type="text" name="warranty" class="form-control" id="pos" placeholder="Warranty"
                                   required>
                        </div>
                    </div>
                </div>

                {{-- <div class="row" style="padding-left:7%; padding-right:30%;">
						<div class="form-check col-md-6">
							{{ Form::radio('type', 'individual', true, ['class' => 'form-check-input', 'id' => 'individual']) }}
                {{ Form::label('individual', 'Individual', ['class' => 'form-check-label']) }}
            </div>
            <div class="form-check col-md-6">
                {{ Form::radio('type', 'business', false, ['class' => 'form-check-input', 'id' => 'business']) }}
                {{ Form::label('business', 'Business', ['class' => 'form-check-label']) }}
            </div>
        </div><br />
        <div class="row">
            <div class="form-group {!! ( count($errors->get('client'))  > 0 )? 'has-error' : '' !!} col-md-12"
                id="full_name">
                {!! Form::label('pel', 'Full Name :', ['class' => 'col-sm-8 control-label']) !!}
                <div class="col-sm-12">
                    {!! Form::input('text', 'client', @$value, ['class' => 'form-control', 'placeholder' => 'Customer',
                    'id' => 'pel']) !!}
                </div>
            </div>
        </div><br />

        <div class="row">
            <div class="form-group {!! ( count($errors->get('client_email')) ) >0 ? 'has-error' : '' !!}  col-md-6"
                id="client_email">
                {!! Form::label('tela', 'Email :', ['class' => 'col-sm-8 control-label']) !!}
                <div class="col-sm-12">
                    {!! Form::input('text', 'client_email', @$value, ['class' => 'form-control', 'placeholder' =>
                    'Email', 'id' => 'tela']) !!}
                </div>
            </div>
        </div><br /> --}}

        {{-- <div class="row">
						<div class="form-group {!! ( count($errors->get('client_address')) ) >0 ? 'has-error' : '' !!} col-md-6" id="street_address">
							{!! Form::label('apel', 'Street Address :', ['class' => 'col-sm-10 control-label']) !!}
							<div class="col-sm-12">
								{!! Form::input('text', 'client_address', @$value, ['class' => 'form-control', 'placeholder' => 'Street Address', 'id' => 'apel']) !!}
							</div>
						</div>
						<div class="form-group {!! ( count($errors->get('address_line2')) ) >0 ? 'has-error' : '' !!} col-md-6" id="street_address">
							{!! Form::label('apel', 'Address line 2 :', ['class' => 'col-sm-10 control-label']) !!}
							<div class="col-sm-12">
								{!! Form::input('text', 'address_line2', @$value, ['class' => 'form-control', 'placeholder' => 'Address Line 2', 'id' => 'addressLine2']) !!}
							</div>
						</div>	
					</div> --}}

        {{-- <div class="row">
						<div class="form-group {!! ( count($errors->get('city')) ) >0 ? 'has-error' : '' !!} col-md-4">
							{!! Form::label('apel', 'City :', ['class' => 'col-sm-8 control-label']) !!}
							<div class="col-sm-12">
								{!! Form::input('text', 'city', @$value, ['class' => 'form-control', 'placeholder' => 'City', 'id' => 'city']) !!}
						
							</div>
						</div>	
						<div class="form-group {!! ( count($errors->get('state_province')) ) >0 ? 'has-error' : '' !!} col-md-4">
							{!! Form::label('apel', 'State :', ['class' => 'col-sm-10 control-label']) !!}
							<div class="col-sm-12">
								{!! Form::input('text', 'state_province', @$value, ['class' => 'form-control', 'placeholder' => 'State/Province', 'id' => 'state']) !!}
							</div>
						</div>	
						<div class="form-group {!! ( count($errors->get('client_poskod')) ) >0 ? 'has-error' : '' !!} col-md-4">
							{!! Form::label('pos', 'Postal/Zip Code :', ['class' => 'col-sm-12 control-label']) !!}
							<div class="col-sm-12">
								{!! Form::input('text', 'client_poskod', @$value, ['class' => 'form-control', 'placeholder' => 'Postcode', 'id' => 'pos']) !!}
							</div>
						</div>	
					</div> --}}

        {{-- <div class="row">
							<div class="form-group {!! ( count($errors->get('client_phone')) ) >0 ? 'has-error' : '' !!} col-md-6">
								{!! Form::label('tel', 'Telephone :', ['class' => 'col-sm-10 control-label']) !!}
								<div class="col-sm-12">
									{!! Form::input('text', 'client_telephone', @$value, ['class' => 'form-control', 'placeholder' => 'Phone', 'id' => 'tel']) !!}
								</div>
							</div>
							<div class="form-group {!! ( count($errors->get('mobile')) ) >0 ? 'has-error' : '' !!} col-md-6	">
								{!! Form::label('tel', 'Mobile :', ['class' => 'col-sm-6 control-label']) !!}
								<div class="col-sm-12">
									{!! Form::input('text', 'client_mobile', @$value, ['class' => 'form-control', 'placeholder' => 'Phone', 'id' => 'mobilePhone']) !!}
								</div>
							</div>
					</div> --}}

        {{-- <div class="row">
						<div class="form-group {!! ( count($errors->get('mobile')) ) >0 ? 'has-error' : '' !!} col-md-12">
							{!! Form::label('tel', 'Country :', ['class' => 'col-sm-6 control-label']) !!}
							<div class="col-sm-12">
								{!! Form::input('text', 'country', @$value, ['class' => 'form-control', 'placeholder' => 'Country', 'id' => 'country']) !!}
							</div>
						</div>
					</div><br/> --}}

        <!-- <div class="form-group col-lg-12">
						<div class="col-sm-offset-2 col-sm-10">
							<p>{!! Form::submit('Update', ['class' => 'btn btn-primary btn-lg btn-block']) !!}</p>
						</div>
					</div> -->

    </div>
    <div class="mt-3 text-right">
        {!! Form::submit('Submit', ['class' => 'btn btn-lg btn-primary', 'id' => 'nalpa']) !!}
{{--        <span class="btn btn-outline-primary col-md-3" id="submit">Update</span>--}}
    </div>
</div>
<div class="col-md-5" id="vehicle_info"><br />
    {!! Form::label('vehicle : ', 'Vehicle Details :') !!}
    <div id="VehicleError"></div>
    <table class="table table-bordered" id="vInfoTable">
        <tr>
            <th>Registration Number :</th>
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
                    'placeholder' => '',
                    'id' => 'make']) !!}
                </div>
            </td>
        </tr>
        <tr>
            <th>Model :</th>
            <td>
                <div class="row" style="padding-left: 10%;">
                    {!! Form::input('text', 'model', @$value, ['class' => 'form-control col-md-8', 'placeholder' => '',
                    'id' => 'model']) !!}
                </div>
            </td>
        </tr>
        <tr>
            <th>Colour :</th>
            <td>
                <div class="row" style="padding-left: 10%;">
                    {!! Form::input('text', 'colour', @$value, ['class' => 'form-control col-md-8', 'placeholder' => '',
                    'id' => 'colour']) !!}
                </div>
            </td>
        </tr>
        <tr>
            <th>Engine Number :</th>
            <td>
                <div class="row" style="padding-left: 10%;">
                    {!! Form::input('engNum', 'engNum', @$value, ['class' => 'form-control col-md-8', 'placeholder' => '',
                    'id' => 'engNum']) !!}
                </div>
            </td>
        </tr>
        <tr>
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
        </tr>
    </table>
</div>
</div>
</div>

<script src="{{ asset('admin/js/jquery.min.js') }}"></script>
<script>
var _validFileExtensions = [".pdf", ".docx", ".jpg", ".jpeg", ".bmp", ".gif", ".png", ".jfif", ".pjpeg", ".pjp"];
var _filenum = 0;
var isfiles = true;

$(document).ready(function() {
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

    $("body").on("click", ".remove_attach", function() {
        $(".add-des-" + attach_number).css('display', 'none');
        attach_number--;
        // var parent = this.parentNode;
        // $(this).parents(".file-item").remove();
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
        var weight = $('#weight').val();
        var bodystyle = $('#bodyStyle').val();
        var exported = $('#exported').val();
        var gearbox = $('#gearBox').val();
        var modeldate = $('#modelSetupDate').val();
        var firregis = $('#firRegis').val();
        var token = $("input[name='_token']").val();
        var regNum = $('#regNum').val();

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
                bodystyle,
                exported,
                gearbox,
                modeldate,
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
                    $('#make').val(data.Response.DataItems.VehicleRegistration.Make);
                    $('#model').val(data.Response.DataItems.VehicleRegistration.Model);
                    $('#colour').val(data.Response.DataItems.VehicleRegistration.Colour);
                    $('#engNum').val(data.Response.DataItems.VehicleRegistration
                        .EngineNumber);
                    $('#weight').val(data.Response.DataItems.VehicleRegistration
                        .GrossWeight);
                    $('#bodyStyle').val(data.Response.DataItems.SmmtDetails.BodyStyle);
                    $('#exported').val(data.Response.DataItems.VehicleRegistration
                        .Exported);
                    $('#gearBox').val(data.Response.DataItems.VehicleRegistration
                        .Transmission);
                    $('#modelSetupDate').val(data.Response.DataItems.SmmtDetails
                        .VisibilityDate);
                    $('#firRegis').val(data.Response.DataItems.VehicleRegistration
                        .DateFirstRegisteredUk);
                } else if (data.Response.StatusCode == "ItemNotFound") {
                    $('#make').val("");
                    $('#model').val("");
                    $('#colour').val("");
                    $('#engNum').val("");
                    $('#weight').val("");
                    $('#bodyStyle').val("");
                    $('#exported').val("");
                    $('#gearBox').val("");
                    $('#modelSetupDate').val("");
                    $('#firRegis').val("");
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
@endsection