@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="/css/uniform.css" />
    <link rel="stylesheet" href="/css/select2.css" />
    <link rel="stylesheet" href="/css/matrix-style.css" />
    <link rel="stylesheet" href="/css/matrix-media.css" />
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Order</a></div>
        <h1>Order - 93823</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5>Order</h5>
                </div>
                <div class="widget-content nopadding">
                    <form action="#" method="get" class="form-horizontal">
                        <div class="control-group">
                            <label class="control-label">Order Notes :</label>
                            <div class="controls">
                                <input type="text" class="span11" placeholder="Order Notes" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Discount :</label>
                            <div class="controls">
                                <input type="text" class="span11" placeholder="Discount" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Amount :</label>
                            <div class="controls">
                                <input type="text" class="span11" placeholder="Amount" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Delivery Address :</label>
                            <div class="controls">
                                <input type="text" class="span11" placeholder="Address" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Status :</label>
                            <div class="controls">
                                <input type="text" class="span11" placeholder="Status" />
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
    <script src="/js/jquery.uniform.js"></script>
    <script src="/js/select2.min.js"></script>
    <script src="/js/jquery.dataTables.min.js"></script>
    <script src="/js/matrix.js"></script>
    <script src="/js/matrix.tables.js"></script>
@endsection
