@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="css/uniform.css" />
    <link rel="stylesheet" href="css/select2.css" />
    <link rel="stylesheet" href="css/matrix-style.css" />
    <link rel="stylesheet" href="css/matrix-media.css" />
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Notifications</a></div>
        <h1>Notifications  <a href="notifications-create" class="btn btn-success">+</a></h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>Notifications</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>Notification</th>
                                <th>Type</th>
                                <th>Target</th>
                                <th>Date</th>
                                <th>Message</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="gradeX">
                                <td><a href="notifications/1">NOTIF-231</a></td>
                                <td>Promo</td>
                                <td>All</td>
                                <td>Jan 21, 2017</td>
                                <td class="center">Fathers day</td>
                            </tr>
                            <tr class="gradeX">
                                <td><a href="notifications/1">NOTIF-244</a></td>
                                <td>Promo</td>
                                <td>All</td>
                                <td>Jan 21, 2017</td>
                                <td class="center">Mothers day</td>
                            </tr>
                            <tr class="gradeX">
                                <td><a href="notifications/1">NOTIF-255</a></td>
                                <td>Promo</td>
                                <td>All</td>
                                <td>Jan 21, 2017</td>
                                <td class="center">Kids day</td>
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
