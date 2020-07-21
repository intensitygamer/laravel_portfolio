@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="css/uniform.css" />
    <link rel="stylesheet" href="css/select2.css" />
    <link rel="stylesheet" href="css/matrix-style.css" />
    <link rel="stylesheet" href="css/matrix-media.css" />
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="/" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Error</a></div>
        <h1>Forbidden</h1>
    </div>
	 <div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">
					<div class="widget-box">
						<div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
							<h5>Error 403</h5>
						</div>
						<div class="widget-content">
							<div class="error_ex">
								<h1>403</h1>
								<h3>Opps, You're forbidden.</h3>
								<p>We can not allow you to see this page.</p>
								<a class="btn btn-warning btn-big"  href="/">Back to Home</a> </div>
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
