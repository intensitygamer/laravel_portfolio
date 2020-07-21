@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="css/uniform.css" />
    <link rel="stylesheet" href="css/select2.css" />
    <link rel="stylesheet" href="css/matrix-style.css" />
    <link rel="stylesheet" href="css/matrix-media.css" />
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Roles</a></div>
        <h1>Create Role</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5>Role</h5>
                </div>
                <div class="widget-content nopadding">
                    <form action="#" method="get" class="form-horizontal">
                        <div class="control-group">
                            <label class="control-label">Name :</label>
                            <div class="controls">
                                <input type="text" class="span11" placeholder="Name" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Parent :</label>
                            <div class="controls">
															<select>
																<option selected>Manager</option>
																<option>Supervisor</option>
															</select>
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
        <hr>
        <div class="row-fluid">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5>Assign Privileges</h5>
                </div>
                <div class="widget-content nopadding">
                    <form action="#" method="get" class="form-horizontal">
                        <div class="control-group">
                            <label class="control-label">Module :</label>
                            <div class="controls">
															<select>
																<option selected>Merchant</option>
																<option>Product</option>
																<option>Notification</option>
															</select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Privilege :</label>
                            <div class="controls">
															<select multiple>
																<option selected>Add</option>
																<option>List</option>
																<option selected>Edit</option>
																<option>Delete</option>
															</select>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>Privileges</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>Module</th>
                                <th>Privileges</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="gradeX">
																<td>Merchant</td>
                                <td><span class="label label-success">Edit</span><span class="label label-important">Create</span></td>
                            </tr>
                            <tr class="gradeX">
                                <td>Products</td>
                                <td><span class="label label-success">List</span></td>
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
