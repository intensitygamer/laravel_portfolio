@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="/css/uniform.css" />
    <link rel="stylesheet" href="/css/select2.css" />
    <link rel="stylesheet" href="/css/matrix-style.css" />
    <link rel="stylesheet" href="/css/matrix-media.css" />
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Products</a></div>
        <h1>Add Products</h1>
        <div id="breadcrumb-product">
          <a href="#" class="current">Select a Category or SPU</a>
          <a href="#">SPU Information</a>
          <a href="#">More Details</a>
          <a href="#">SKU & Image</a>
          <a href="#">Finish</a>
        </div>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
						<div class="widget-box">
								<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
										<h5>Select a Category or SPU</h5>
								</div>

								<div class="widget-content nopadding">
                  <form action="#" method="get" class="form-horizontal">
										<div class="control-group">
											<label class="control-label"></label>
											<div class="controls">
												<label>
													<div class="radio">
														<span><input type="radio" name="radios" value="0" style="opacity: 0;"></span>
													</div>
													Existing Products
													<select id="products-list" style="display: none"></select>
												</label>
												<label>
													<div class="radio">
														<span><input type="radio" name="radios" value="1" style="opacity: 0;"></span>
													</div>
													Category
													<div class="category-wrapper">
														<select id="products-category" style="display: none"></select>
													</div>
												
												</label>
												<label>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label"></label>
											<div class="controls">
												<div id="search-category">
													<input type="text" placeholder="Please select a category">
													<button type="submit" class="tip-bottom" data-original-title="Search"><i class="icon-search icon-white"></i></button>
												</div>
											</div>
										</div>
										<div class="control-group">
												<label class="control-label">Selected Category:</label>
												<div class="controls">
													<!-- <span class="padding-7 breadcrumb-selected">Kids</span>
													<span class="padding-7 breadcrumb-selected">Pants</span>
													<span class="padding-7">Jeans</span> -->
												</div>
										</div>
										<!-- <div class="control-group">
												<label class="control-label"></label>
												<div class="controls">
													<select class="mulitple-category">
														<option>Baby & Toddler</option>
														<option>Cameras</option>
														<option>Fashion</option>
														<option>Groceries</option>
														<option>Health & Beauty</option>
														<option>Home & Living</option>
														<option>Home Appliances</option>
														<option>Media, Music & Books</option>
														<option>Mobiles & Tablets</option>
													</select>
													<select class="mulitple-category">
														<option>Baby Gear</option>
														<option>Clothin & Accessories</option>
														<option>Diapering & Potty</option>
														<option>Feeding</option>
														<option>Gifts</option>
														<option>Health & Safety</option>
														<option>Maternity Care</option>
														<option>Nursery</option>
													</select>
													<select class="mulitple-category">
														<option>Backpacks & Carriers</option>
														<option>Bicycle Child Seats & Trailers</option>
														<option>Car Seats</option>
													</select>
													<select class="mulitple-category">
														<option>Accessories</option>
														<option>Backpacks</option>
														<option>Slings</option>
													</select>
												</div>
										</div> -->
										<div class="form-actions">
												<button type="submit" class="btn btn-success next">Next</button>
										</div>
									</form>
								</div>
						</div>
        </div>
    </div>
    <script>
      $('.next' ).click( function ( e ) {
        e.preventDefault();
        window.location = '/products-create-2';
      } );
    </script>
    <script src="/js/jquery.uniform.js"></script>
    <!-- <script src="/js/select2.min.js"></script> -->
  <!--   <script src="/js/jquery.dataTables.min.js"></script>
    <script src="/js/matrix.js"></script>
    <script src="/js/matrix.tables.js"></script> -->

    <script src="/js/products.js"></script>

    <script type="text/javascript">
    	$(document).ready(function(){
    		$('input[type=checkbox],input[type=radio],input[type=file]').uniform();

			Products.init();
    	});
    </script>
@endsection
