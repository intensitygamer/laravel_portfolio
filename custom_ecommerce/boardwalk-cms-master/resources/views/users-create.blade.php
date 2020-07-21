@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="css/uniform.css" />
    <link rel="stylesheet" href="css/select2.css" />
    <link rel="stylesheet" href="css/matrix-style.css" />
    <link rel="stylesheet" href="css/matrix-media.css" />
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Users</a></div>
        <h1>Create User</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5>User</h5>
                </div>
                <div class="widget-content nopadding">
                    <form action="#" method="get" class="form-horizontal">
                        <div class="control-group">
                            <label class="control-label">Role :</label>
                            <div class="controls">
															<select multiple >
																<option>Writer</option>
																<option>Product manager</option>
																<option>Audit</option>
															</select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Username :</label>
                            <div class="controls">
                                <input type="text" class="span11" placeholder="Username" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Password :</label>
                            <div class="controls">
                                <input type="text" class="span11" placeholder="Password" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Email :</label>
                            <div class="controls">
                                <input type="text" class="span11" placeholder="Email" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Email Confirmation:</label>
                            <div class="controls">
															<select>
																<option selected>verified</option>
																<option>unverified</option>
															</select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Firstname :</label>
                            <div class="controls">
                                <input type="text" class="span11" placeholder="Firstname" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Lastname :</label>
                            <div class="controls">
                                <input type="text" class="span11" placeholder="Lastname" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Phone number :</label>
                            <div class="controls">
                                <input type="text" class="span11" placeholder="Phone number" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Birthday :</label>
                            <div class="controls">
                                <input type="date" class="span11" placeholder="Birthday" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Gender :</label>
                            <div class="controls">
															<label>
																<input type="radio" name="radios" />
																Male
															</label>
															<label>
																<input type="radio" name="radios" />
																Female
															</label>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Address :</label>
                            <div class="controls">
                                <input type="text" class="span11" placeholder="Address" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Status :</label>
                            <div class="controls">
															<select>
																<option selected>active</option>
																<option>inactive</option>
															</select>
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
