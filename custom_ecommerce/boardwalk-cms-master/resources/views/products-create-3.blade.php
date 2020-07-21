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
          <a href="#" class="current" >More Details</a>
          <a href="#">SKU & Image</a>
          <a href="#">Finish</a>
        </div>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
						<div class="widget-box">
								<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
										<h5>More Details</h5>
								</div>
								<div class="widget-content nopadding">
                  <form action="#" method="get" class="form-horizontal">

										<div class="control-group">
											<label class="control-label">Name</label>
											<div class="controls">
												<input type="text" />
											</div>
										</div>

										<div class="control-group">
											<label class="control-label">Product Description</label>
											<div class="controls">
												<textarea class="product-description span12" rows="6" placeholder="Enter text ..."></textarea>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label">Highlights</label>
											<div class="controls">
												<textarea class="hightlights span12" rows="6" placeholder="Enter text ..."></textarea>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label">Video URL</label>
											<div class="controls">
												<input type="text" />
											</div>
										</div>

										<div class="control-group">
												<label class="control-label">Warranty Type</label>
												<div class="controls">
													<select>
														<option>Warranty Type 1</option>
														<option>Warranty Type 2</option>
													</select>
												</div>
										</div>

										<div class="control-group">
												<label class="control-label">Warranty Period</label>
												<div class="controls">
													<select>
														<option>Warranty Period 1</option>
														<option>Warranty Period 2</option>
													</select>
												</div>
										</div>

										<div class="control-group">
											<label class="control-label">Warranty Policy ( optional )</label>
											<div class="controls">
												<textarea class="warranty-policy span12" rows="6" placeholder="Enter text ..."></textarea>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label">External URL</label>
											<div class="controls">
												<input type="text" />
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
        window.location = '/products-create-2';
      } );
      $('.next' ).click( function ( e ) {
        e.preventDefault();
        window.location = '/products-create-4';
      } );
			$('.product-description').wysihtml5();
			$('.hightlights').wysihtml5();
			$('.warranty-policy').wysihtml5();
    </script>
@endsection
