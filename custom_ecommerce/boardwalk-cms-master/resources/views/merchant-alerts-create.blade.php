@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="css/uniform.css" />
    <link rel="stylesheet" href="css/select2.css" />
    <link rel="stylesheet" href="css/matrix-style.css" />
    <link rel="stylesheet" href="css/matrix-media.css" />
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Merchant Alerts</a></div>
        <h1>Create Merchant Alert</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5>Merchant Alert</h5>
                </div>
                <div class="widget-content nopadding">
                    <form action="#" method="get" class="form-horizontal">
                        <div class="control-group">
                            <label class="control-label">Notifcation :</label>
                            <div class="controls">
                                <input type="text" class="span11" placeholder="Notifcation" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Type :</label>
                            <div class="controls">
                                <input type="text" class="span11" placeholder="Type" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Target :</label>
                            <div class="controls">
                                <input type="text" class="span11" placeholder="Target" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Date :</label>
                            <div class="controls">
                                <input type="date" class="span11" placeholder="Date" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Message :</label>
                            <div class="controls">
                                <input type="text" class="span11" placeholder="Message" />
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </form>
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
