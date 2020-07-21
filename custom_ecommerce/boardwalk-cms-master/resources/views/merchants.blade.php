@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="css/uniform.css" />
    <link rel="stylesheet" href="css/select2.css" />
    <link rel="stylesheet" href="css/matrix-style.css" />
    <link rel="stylesheet" href="css/matrix-media.css" />
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Merchants</a></div>
        <h1>Merchants  <a href="merchants-create" class="btn btn-success">+</a></h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>Merchant</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>Merchant ID</th>
                                <th>Merchant</th>
                                <th>Tags</th>
                                <th>Blocked</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="gradeX">
                                <td><a href="/merchants/1">1</a></td>
                                <td>Bello</td>
                                <td><span class="label label-success">Beauty</span><span class="label label-important">Care</span></td>
                                <td>false</td>
                            </tr>
                            <tr class="gradeX">
                                <td><a href="/merchants/2">2</a></td>
                                <td>Pyrex</td>
                                <td><span class="label label-success">Cooking</span><span class="label label-important">Kitchen</span></td>
                                <td>false</td>
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
