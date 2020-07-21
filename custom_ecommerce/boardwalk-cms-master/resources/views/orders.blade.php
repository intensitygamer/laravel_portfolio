@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="css/uniform.css" />
    <link rel="stylesheet" href="css/select2.css" />
    <link rel="stylesheet" href="css/matrix-style.css" />
    <link rel="stylesheet" href="css/matrix-media.css" />
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Orders</a></div>
        <h1>Orders</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>Orders</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>Order #</th>
                                <th>Order notes</th>
                                <th>Discount</th>
                                <th>Amount</th>
                                <th>Delivery Address</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="gradeX">
                                <td><a href="/orders/1">OR12384</a></td>
                                <td>N/A</td>
                                <td>P 0.00</td>
                                <td>P 500.00</td>
                                <td>Address1</td>
                                <td>Delivered</td>
                            </tr>
                            <tr class="gradeX">
                                <td><a href="/orders/2">OR14f23</a></td>
                                <td>N/A</td>
                                <td>P 0.00</td>
                                <td>P 500.00</td>
                                <td>Address2</td>
                                <td>Delivered</td>
                            </tr>
                            <tr class="gradeX">
                                <td><a href="/orders/3">OR00im3</a></td>
                                <td>N/A</td>
                                <td>P 0.00</td>
                                <td>P 500.00</td>
                                <td>Address3</td>
                                <td>Delivered</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/jquery.uniform.js"></script>
    <script src="js/select2.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/matrix.js"></script>
    <script src="js/matrix.tables.js"></script>
@endsection
