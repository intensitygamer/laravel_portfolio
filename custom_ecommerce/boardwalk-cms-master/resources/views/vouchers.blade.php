@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="css/uniform.css" />
    <link rel="stylesheet" href="css/select2.css" />
    <link rel="stylesheet" href="css/matrix-style.css" />
    <link rel="stylesheet" href="css/matrix-media.css" />
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="/vouchers" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Vouchers</a></div>
        <h1>Vouchers  <a href="/vouchers-create" class="btn btn-success">+</a></h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>Vouchers</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>Voucher #</th>
																<th>Amount</th>
                                <th>Personal Shopper</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="gradeX">
                                <td><a href="/vouchers/1">1</a></td>
                                <td>350</td>
																<td>Mike Cruz</td>
                                <td>Active</td>
                            </tr>
                            <tr class="gradeX">
                                <td><a href="/vouchers/1">2</a></td>
                                <td>500</td>
																<td>Mike Cruz</td>
                                <td>Active</td>
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
