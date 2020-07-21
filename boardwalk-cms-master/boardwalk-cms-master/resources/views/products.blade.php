@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="css/uniform.css" />
    <link rel="stylesheet" href="css/select2.css" />
    <link rel="stylesheet" href="css/matrix-style.css" />
    <link rel="stylesheet" href="css/matrix-media.css" />
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Products</a></div>
        <h1>Products  <a href="products-create" class="btn btn-success">+</a></h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>Filter</h5>
												<div style="padding: 4px;display: block;margin-left: 90px;width: 250px;">
													<select>
														<option>All</option>
														<option>Live</option>
														<option>Image Missing</option>
														<option>Poor Quality</option>
														<option>Sold Out</option>
														<option>Best Selling</option>
														<option>Inactive</option>
														<option>Uncompetetively priced</option>
													</select>
												</div>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>SKU</th>
                                <th>Product Name</th>
                                <th>Product Description</th>
                                <th>Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($products as $product)
                              <tr class="gradeX">
                                  <td><a href="/products/{{$product->objectId}}">{{$product->sku ?? ''}}</a></td>
                                  <td><a href="/products/{{$product->objectId}}">{{$product->product_name}}</a></td>
                                  <td>{{$product->product_description ?? ''}}</td>
                                  <td>{{$product->product_price ?? ''}}</td>
                              </tr>
                            @endforeach
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
