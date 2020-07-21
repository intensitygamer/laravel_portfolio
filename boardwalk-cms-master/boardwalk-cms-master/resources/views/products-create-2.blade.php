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
          <a href="#">Select a Category or SPU</a>
          <a href="#" class="current" >SPU Information</a>
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
										<h5>SPU Information</h5>
								</div>
								<div class="widget-content nopadding">
                  <form action="#" method="get" class="form-horizontal">
										<div class="control-group">
												<label class="control-label">Category:</label>
												<div class="controls">
													<span class="padding-7 breadcrumb-selected">Kids</span>
													<span class="padding-7 breadcrumb-selected">Pants</span>
													<span class="padding-7">Jeans</span>
												</div>
										</div>
										<div class="control-group">
												<label class="control-label">Brand</label>
												<div class="controls">
													<select>
														<option>Bench</option>
														<option>Penshoppe</option>
													</select>
												</div>
										</div>
										<div class="control-group">
												<label class="control-label">Model</label>
												<div class="controls">
													<select>
														<option>Model 1</option>
														<option>Model 2</option>
													</select>
												</div>
										</div>
										<div class="control-group">
												<label class="control-label">Code Family</label>
												<div class="controls">
													<select>
														<option>Code 1</option>
														<option>Code 2</option>
													</select>
												</div>
										</div>
										<div class="control-group">
												<label class="control-label">fmlt soaps shower</label>
												<div class="controls">
													<select>
														<option>fmlt 1</option>
														<option>fmlt 2</option>
													</select>
												</div>
										</div>
										<div class="control-group">
												<label class="control-label">Volume( ml )</label>
												<div class="controls">
													<input type="text" />
												</div>
										</div>
										<div class="control-group">
												<label class="control-label">Main Material</label>
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
    <script>
      $('.back' ).click( function ( e ) {
        e.preventDefault();
        window.location = '/products-create';
      } );
      $('.next' ).click( function ( e ) {
        e.preventDefault();
        window.location = '/products-create-3';
      } );
    </script>
    <script src="/js/jquery.uniform.js"></script>
    <script src="/js/select2.min.js"></script>
    <script src="/js/jquery.dataTables.min.js"></script>
    <script src="/js/matrix.js"></script>
    <script src="/js/matrix.tables.js"></script>
@endsection
