@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="css/uniform.css" />
    <link rel="stylesheet" href="css/select2.css" />
    <link rel="stylesheet" href="css/matrix-style.css" />
    <link rel="stylesheet" href="css/matrix-media.css" />
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Categories</a></div>
        <h1>Create Category</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5>Category</h5>
                </div>
                <div class="widget-content nopadding">
                    <form action="/categories-create" method="post" class="form-horizontal">
                        <div class="control-group">
                            <label class="control-label">Parent category :</label>
                            <div class="controls">
															<select name="parent_category">
                                @foreach ($categories as $all_categories)
                                  <option
                                    @if ($parent_category == $all_categories->objectId )
                                      selected
                                    @endif
                                    value="{{$all_categories->objectId}}">{{$all_categories->category_name}}</option>
                                @endforeach
															</select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Name :</label>
                            <div class="controls">
                                <input type="text" name="category_name" class="span11" placeholder="Name" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Description :</label>
                            <div class="controls">
                                <input type="text" name="category_description" class="span11" placeholder="Description" />
                            </div>
                        </div>
                        <!--div class="control-group">
                            <label class="control-label">Status :</label>
                            <div class="controls">
															<label>
																<input type="radio" name="radios" />
																yes
															</label>
															<label>
																<input type="radio" name="radios" />
																no
															</label>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Free Shipping :</label>
														<div class="controls">
															<select multiple >
																<option>Region 1</option>
																<option>Region 2</option>
																<option>Region 3</option>
																<option>Region 4</option>
																<option>Region 5</option>
																<option>Region 6</option>
															</select>
														</div>
                            <div class="controls">
															<label>
																<input type="radio" name="radios" />
																yes
															</label>
															<label>
																<input type="radio" name="radios" />
																no
															</label>
                            </div>
                        </div-->
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
