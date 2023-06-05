@extends('layout.master')

@section('content')
    @include('layout.errorform')
    @include('layout.info')
    @if (session()->has('newurlpdf'))
        <script>
            window.open("{{ session('newurlpdf') }}", "_blank");
        </script>
    @endif

    <div class="col-lg-12" style="margin-top: 100px;">
        <div class="panel panel-default">
            <h3 class="nk-block-title page-title" style="margin-left: 4%; margin-top:20px;">Invoice Panel</h3>
            <div class="panel-body">
                @if(auth()->user()->id_group == 1)
                @else
                    <p class="text-right"><a href="{!! route('sales.create') !!}" class="btn btn-info">New Invoice</a></p>
                @endif
                <div class="col-lg-12 table-responsive" id="load-products">
                    <div class="card-inner">
                        <?php
                        use Carbon\Carbon;

                        function my($string) {
                            $rt = Carbon::createFromFormat('Y-m-d', $string);
                            return date('d F Y', mktime(0, 0, 0, $rt->month, $rt->day, $rt->year));
                        }
                        ?>

                        <table id="example" class="table table-hover">
                            <thead>
                            @if(auth()->user()->id_group == 1)
                                <th>User</th>
                            @endif
                            <!-- <th>editing</th> -->
                            <th>ID</th>
                            <th>Registration Number</th>
                            <th>Make</th>
                            <th>Model</th>
                            <th>Colour</th>
                            <th>Invoice Date</th>
                            <th>Status</th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                            <?php
                            if (auth()->user()->id_group == 1) {
                                $inv = App\Invoice::where(['status' => 1])->get();
                            } else {
                                $inv = App\Invoice::where(['id_user' => auth()->user()->id, 'status' => 1])->get();
                            }
                            ?>
                            @foreach($inv as $in)
                                <tr class="">
                                @if(auth()->user()->id_group == 1)
                                    @if($in->id_user == 2)
                                        <td>user</td>
                                        @elseif($in->id_user == 3)
                                        <td>user2</td>
                                    @endif
                                @endif
                                    <td>{!! $in->id !!}</td>
                                    <td>{!! $in->RegNumber !!}</td>
                                    <td>{!! $in->make !!}</td>
                                    <td>{!! $in->model !!}</td>
                                    <td>{!! $in->colour !!}</td>
                                    <td>{!! date('d/m/Y', strtotime($in->invoiceDate)) !!}</td>
                                    <td>
                                        <p class="btn <?php echo ($in->status <= 0)? 'btn-danger' : 'btn-success' ?>">
                                                <?php echo ($in->status <= 0) ? '<i class="fa fa-credit-card fa-lg" aria-hidden="true"></i>' : '<i class="fa fa-money fa-lg" aria-hidden="true"></i>' ?>
                                        </p>
                                    </td>
                                    <td>
                                        <!-- <a href="{!! route('sales.edit', $in->id) !!}" title="Edit"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
                                        &nbsp; -->
                                        <a href="{!! route('sales.destroy', $in->id) !!}" data-id="{!! $in->id !!}"
                                           data-token="{{ csrf_token() }}" id="delete_product_<?=$in->id ?>" title="Delete"
                                           class="delete_button">
                                            <i class="fa fa-trash fa-lg" aria-hidden="true"></i>
                                        </a>
                                        &nbsp;
                                        <a href="{!! route('printpdf.print', $in->id) !!}" target="_blank"
                                           title="Print PDF"><i class="fa fa-file-pdf-o fa-lg" aria-hidden="true"></i></a>
                                        @if(auth()->user()->id_group == 1)
                                        @else
                                            &nbsp;
                                            <a href="{!! route('emailpdf.send', $in->id) !!}" title="Send Email"><i
                                                        class="fa fa-envelope-o fa-lg" aria-hidden="true"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('jquery')

    /////////////////////////////////////////////////////////////////////////////////////////

    $.ajaxSetup({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });

    // ajax post delete row
    // readProducts(); /* it will load products when document loads */

    $(document).on('click', '.delete_button', function(e){
    var productId = $(this).data('id');
    SwalDelete(productId);
    e.preventDefault();
    });

    // function readProducts(){
    // $('#load-products').load('read.php');
    // }

    function SwalDelete(productId){
    swal.fire({
    title: 'Are you sure?',
    text: "It will be deleted permanently!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!',
    showLoaderOnConfirm: true,
    allowOutsideClick: false,

    preConfirm: function() {
    return new Promise(function(resolve) {
    });
    },
    })
    .then((result) => {
    if(result.dismiss === swal.DismissReason.cancel) {
    swal.fire('Cancelled', 'Your data is safe', 'info');
    }
    });
    }

    /////////////////////////////////////////////////////////////////////////////////////////
@endsection