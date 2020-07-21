@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="/css/uniform.css" />
    <link rel="stylesheet" href="/css/select2.css" />
    <link rel="stylesheet" href="/css/matrix-style.css" />
    <link rel="stylesheet" href="/css/matrix-media.css" />
		<link rel="stylesheet" href="/css/bootstrap-wysihtml5.css">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Products</a></div>
        <h1>Add Products</h1>
        <div id="breadcrumb-product">
          <a href="#">Select a Category or SPU</a>
          <a href="#">SPU Information</a>
          <a href="#">More Details</a>
          <a href="#" class="current" >SKU & Image</a>
          <a href="#">Finish</a>
        </div>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
						<div class="widget-box">
								<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
										<h5>SKU description</h5>
								</div>
								<div class="widget-content nopadding">
                  <form action="#" method="get" class="form-horizontal">
										<div class="control-group">
											<label class="control-label">Whats in the box</label>
											<div class="controls">
												<textarea class="whats-in-the-box span12" rows="6" placeholder="Enter text ..."></textarea>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label">Package Weight(kg)</label>
											<div class="controls">
												<input type="text" />
											</div>
										</div>
										<div class="control-group">
											<label class="control-label">Package Length(cm)</label>
											<div class="controls">
												<input type="text" />
											</div>
										</div>
										<div class="control-group">
											<label class="control-label">Package Width(cm)</label>
											<div class="controls">
												<input type="text" />
											</div>
										</div>
										<div class="control-group">
											<label class="control-label">Package Height(cm)</label>
											<div class="controls">
												<input type="text" />
											</div>
										</div>
										<div class="control-group">
											<label class="control-label">Dimensions( Length x Width x Height in cm)</label>
											<div class="controls">
												<input type="text" />
											</div>
										</div>
										<div class="control-group">
											<label class="control-label">Product Weight(kg)</label>
											<div class="controls">
												<input type="text" />
											</div>
										</div>
										<div class="control-group">
											<label class="control-label">Note</label>
											<div class="controls">
												<input type="text" />
											</div>
										</div>
										<div class="control-group">
												<label class="control-label">Uploaded</label>
												<div class="controls">
													<img src="http://boardwalk.com.ph/BWAppMedia/onlineshopadmin/ProductImage/thumbnail/HALLIWELL_BLACK_1.jpg"/>
													<img src="http://boardwalk.com.ph/BWAppMedia/onlineshopadmin/ProductImage/thumbnail/HALLIWELL_BLACK_2.jpg"/>
													<img src="http://boardwalk.com.ph/BWAppMedia/onlineshopadmin/ProductImage/thumbnail/HALLIWELL_BLACK_3.jpg"/>
												</div>
										</div>
										<div class="control-group">
												<label class="control-label">Images :</label>
												<div class="controls">
														<input type="file" class="span11" />
												</div>
										</div>
										<div class="control-group">
											<label class="control-label">Shipping Time(min days)</label>
											<div class="controls">
												<input type="text" />
											</div>
										</div>
										<div class="control-group">
											<label class="control-label">Shipping Time(max days)</label>
											<div class="controls">
												<input type="text" />
											</div>
										</div>
										<div class="control-group">
											<label class="control-label">Type</label>
											<div class="controls">
												<div class="checker" id="uniform-undefined"><span class="checked"><input type="checkbox" name="radios" style="opacity: 0;"></span></div>
											</div>
										</div>
										<div class="form-actions">
												<button class="btn btn-success back">Back</button>
												<button class="btn btn-success next">Next</button>
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
		<script src="/js/wysihtml5-0.3.0.js"></script>
		<script src="/js/bootstrap-wysihtml5.js"></script>
    <script>
      $('.back' ).click( function ( e ) {
        e.preventDefault();
        window.location = '/products-create-3';
      } );
      $('.next' ).click( function ( e ) {
        e.preventDefault();
        window.location = '/products-create-5';
      } );
			$('.whats-in-the-box').wysihtml5();
    </script>
@endsection
