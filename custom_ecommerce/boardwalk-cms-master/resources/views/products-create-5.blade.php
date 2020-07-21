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
          <a href="#">SPU Information</a>
          <a href="#">More Details</a>
          <a href="#">SKU & Image</a>
          <a href="#" class="current" >Finish</a>
        </div>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
						<div class="widget-box">
								<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
										<h5>Finish</h5>
								</div>
								<div class="widget-content nopadding">
                  <form action="#" method="get" class="form-horizontal">
										<div class="control-group">
											<label class="control-label"><h2>Done</h2></label>
											<div class="controls">
											</div>
										</div>
										<div class="form-actions">
												<button class="btn btn-success add">Edit</button>
												<button class="btn btn-success next">Done</button>
												<button class="btn btn-success next">Publish</button>
												<button class="btn btn-success add">Add Another Product</button>
										</div>
									</form>
								</div>
						</div>
        </div>
    </div>
    <script>
      $('.next' ).click( function ( e ) {
        e.preventDefault();
        window.location = '/products';
      } );
      $('.add' ).click( function ( e ) {
        e.preventDefault();
        window.location = '/products-create';
      } );
    </script>
    <script src="/js/jquery.uniform.js"></script>
    <script src="/js/select2.min.js"></script>
    <script src="/js/jquery.dataTables.min.js"></script>
    <script src="/js/matrix.js"></script>
    <script src="/js/matrix.tables.js"></script>
@endsection
