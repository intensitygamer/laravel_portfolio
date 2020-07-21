@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="css/uniform.css" />
    <link rel="stylesheet" href="css/select2.css" />
    <link rel="stylesheet" href="css/matrix-style.css" />
    <link rel="stylesheet" href="css/matrix-media.css" />
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Session Management</a></div>
        <h1>Session Management</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>Session Management</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>Username</th>
                                <th>Session Id</th>
                                <th>Expiration</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="gradeX">
                                <td><a href="products/1">gideonairex</a></td>
																<td>jk123j998123</td>
																<td>March 25, 2017 12:30:00</td>
                            </tr>
                            <tr class="gradeX">
                                <td><a href="products/1">username1</a></td>
                                <td>jk123j998123</td>
																<td>March 25, 2017 12:30:00</td>
                            </tr>
                            <tr class="gradeX">
                                <td><a href="products/1">username2</a></td>
                                <td>jk123j998123</td>
																<td>March 25, 2017 12:30:00</td>
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
