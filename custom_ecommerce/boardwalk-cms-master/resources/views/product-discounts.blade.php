@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="css/uniform.css" />
    <link rel="stylesheet" href="css/select2.css" />
    <link rel="stylesheet" href="css/matrix-style.css" />
    <link rel="stylesheet" href="css/matrix-media.css" />
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Product Discounts</a></div>
        <h1>Product Discounts  <a href="/product-discounts-create" class="btn btn-success">+</a></h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>Product Discounts</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>Product ID</th>
                                <th>Product</th>
                                <th>Discount</th>
                                <th>Status</th>
                                <th>Expiry</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="gradeX">
                                <td><a href="/product-discounts/1">1</a></td>
                                <td><a href="/product-discounts/1">Shirt</a></td>
                                <td>15%</td>
                                <td>Active</td>
                                <td>December 15, 2017</td>
                            </tr>
                            <tr class="gradeX">
                                <td><a href="/product-discounts/2">2</a></td>
                                <td><a href="/product-discounts/2">Pants</a></td>
                                <td>20%</td>
                                <td>Active</td>
                                <td>August 15, 2017</td>
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
