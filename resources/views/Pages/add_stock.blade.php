@extends('Layouts.master')
@section('content')
    <!-- begin app-main -->
    @foreach ($data as $data_details)
        <div class="modal fade" id="exampleModal{{ $data_details->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ $data_details->stock_name }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="" method="post" action="{{ route('transation_done') }}" class="form-horizontal">
                            @csrf
                            <input type="hidden" value="{{ $data_details->id }}" name="id">
                            <div class="form-group">
                                <label class="control-label" for="firstname1">Transaction Ammount</label>
                                <div class="mb-2">
                                    <input type="number" class="form-control" id="name" name="transation_ammount""
                                        placeholder="Transaction Ammount" />
                                </div>
                            </div>


                            <div class="form-group">
                                <button type="submit" class="btn btn-sm btn-block btn-primary" id="button">Complete
                                    Transaction</button>

                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="app-main" id="main">
        <!-- begin container-fluid -->
        <div class="container-fluid">
            <!-- begin row -->
            <div class="row">
                <div class="col-md-12 m-b-30">
                    <!-- begin page title -->
                    <div class="d-block d-sm-flex flex-nowrap align-items-center">
                        <div class="page-title mb-2 mb-sm-0">
                            <h1>Add Stock</h1>

                        </div>
                        <div class="ml-auto d-flex align-items-center">
                            <nav>
                                <ol class="breadcrumb p-0 m-b-0">
                                    <li class="breadcrumb-item">
                                        <a href="/"><i class="ti ti-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        Main
                                    </li>
                                    <li class="breadcrumb-item active text-primary" aria-current="page">Add Stock
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!-- end page title -->
                </div>
            </div>
            <!-- end row -->
            <!-- start Validation row -->
            <div class="row formavlidation-wrapper">

                <div class="col-xl-12" id="form-div">
                    <div class="card card-statistics">
                        <div class="card-header">
                            <div class="card-heading">
                                <h4 class="card-title">Enter Stocks</h4>

                                @if (Session::has('stock_add'))
                                    <div class="alert alert-icon alert-inverse-primary" id="session" role="alert">
                                        <i class="fa fa-info-circle"></i>{{ Session::get('stock_add') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="card-body">
                            <form id=""method="post" action="{{ route('post_stock') }}" name="yourForm"
                                class="form-horizontal">
                                @csrf
                                <div class="form-group">
                                    <label class="control-label" for="firstname1">Stock Name</label>
                                    <div class="mb-2">
                                        <input type="text" class="form-control" onKeyup="checkform()" id="name"
                                            name="stock_name" placeholder="Stock name" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="lastname1">Stock Ammount</label>
                                    <div class="mb-2">
                                        <input type="number" class="form-control" onKeyup="checkform()" id="lastname1"
                                            name="stock_ammount" placeholder="Stock Ammount" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-dark btn-block" id="submitbutton" type="submit"
                                        disabled="disabled" value="Submit">Add Stock</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            <!-- end Validation row  -->
        </div>

        <div class="container-fluid pt-0">
            <!-- begin row -->

            <!-- end row -->
            <!-- begin row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-statistics">
                        <div class="card-body">
                            <div class="datatable-wrapper table-responsive">
                                <table id="datatable" class="display compact table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Stock Name</th>
                                            <th>Stock Ammount</th>
                                            <th>Transaction Status</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $data_details)
                                            <tr>
                                                <td>{{ $data_details->stock_name }}</td>
                                                <td>{{ $data_details->stock_ammount }}</td>
                                                <td>
                                                    @if ($data_details->status == '1')
                                                        <button type="button" class="btn btn-success" disabled>
                                                            Tansaction Added
                                                        </button>
                                                    @else
                                                        <button type="button" class="btn btn-primary"
                                                            data-toggle="modal"
                                                            data-target="#exampleModal{{ $data_details->id }}">
                                                            Edit
                                                        </button>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>


        <!-- end container-fluid -->
    </div>
    <!-- end app-main -->
    </div>
    <!-- end app-container -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
        integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $("#session").hide();
            }, 3000);
        });
        function checkform() {
            const formElements = document.forms["yourForm"].elements;
            let submitBtnActive = true;

            for (let inputEl = 0; inputEl < formElements.length; inputEl++) {
                if (formElements[inputEl].value.length == 0) submitBtnActive = false;
            }

            if (submitBtnActive) {
                document.getElementById("submitbutton").disabled = false;
            } else {
                document.getElementById("submitbutton").disabled = "disabled";
            }
        }
    </script>
@endsection
