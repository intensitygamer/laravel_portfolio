@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="css/uniform.css" />
    <link rel="stylesheet" href="css/select2.css" />
    <link rel="stylesheet" href="css/matrix-style.css" />
    <link rel="stylesheet" href="css/matrix-media.css" />
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>User Discounts</a></div>
        <h1>User Discounts  <a href="/user-discounts-create" class="btn btn-success">+</a></h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>User Discounts</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>User</th>
                                <th>Discount</th>
                                <th>Expiry</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="gradeX">
                                <td><a href="/user-discounts/1">Mike Cruz</a></td>
                                <td>10%</td>
                                <td>December 5, 2017</td>
                                <td>Active</td>
                            </tr>
                            <tr class="gradeX">
                                <td><a href="/user-discounts/1">Michelle Yu</a></td>
                                <td>5%</td>
                                <td>December 31, 2017</td>
                                <td>Active</td>
                            </tr>
                            <tr class="gradeX">
                                <td><a href="/user-discounts/1">Kyle Tiu</a></td>
                                <td>5%</td>
                                <td>December 31, 2017</td>
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
