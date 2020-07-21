@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="css/uniform.css" />
    <link rel="stylesheet" href="css/select2.css" />
    <link rel="stylesheet" href="css/matrix-style.css" />
    <link rel="stylesheet" href="css/matrix-media.css" />
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Users</a></div>
        <h1>Users  <a href="users-create" class="btn btn-success">+</a></h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>Users</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Email</th>
                                <th>Email Verified</th>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Status</th>
                                <th>Role</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="gradeX">
                                <td><a href="products/1">gideonairex</a></td>
                                <td>jk123j998123</td>
                                <td>gideonrosales@gmail.com</td>
                                <td>1</td>
                                <td>Gideon</td>
                                <td>Rosales</td>
                                <td>Active</td>
                                <td>Personal Shopper</td>
                            </tr>
                            <tr class="gradeX">
                                <td><a href="products/1">username1</a></td>
                                <td>jk123j998123</td>
                                <td>username1@gmail.com</td>
                                <td>1</td>
                                <td>Firstname1</td>
                                <td>Lastname2</td>
                                <td>Active</td>
                                <td>CSR</td>
                            </tr>
                            <tr class="gradeX">
                                <td><a href="products/1">username2</a></td>
                                <td>jk123j998123</td>
                                <td>username2@gmail.com</td>
                                <td>1</td>
                                <td>Firstname1</td>
                                <td>Lastname2</td>
                                <td>Active</td>
                                <td>Customer</td>
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
