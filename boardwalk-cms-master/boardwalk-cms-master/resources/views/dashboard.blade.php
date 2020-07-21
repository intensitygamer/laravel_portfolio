@extends('layouts.app')

@section('content')
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="/" title="Go to dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a></div>
    </div>
    <div class="container-fluid">
			<div class="quick-actions_homepage">
				<ul class="site-stats">
					<li class="bg_lo">
						<i class="icon-shopping-cart"></i>
						<big>Pending Orders</big>
						<strong>120</strong>
						<small>More than 1 day</small>
						<strong>200</strong>
						<small>Within the day</small>
						<strong>523</strong>
						<small>Daily order volume limitation</small>
					</li>
					<li class="bg_lr">
						<i class="icon-bar-chart"></i>
						<big>Sales</big>
						<strong>P150,000</strong>
						<small>Sale Today</small>
						<strong>P300,330</strong>
						<small>This Week</small>
						<strong>P1,300,330</strong>
						<small>This Month</small>
					</li>
					<li class="bg_lb">
						<i class="icon-star"></i>
						<big>Your Rating</big>
						<strong>5%</strong>
						<small>Cancellation Rate</small>
						<strong>3%</strong>
						<small>Ready to ship</small>
						<strong>6.5%</strong>
						<small>Return Rate</small>
						<strong>8.5%</strong>
						<small>Shipped in 48 hours</small>
					</li>
					<li class="bg_ls">
						<i class="icon-barcode"></i>
						<big>New Products</big>
						<strong>321</strong>
						<small>Rejected Products (Poor quality)</small>
						<strong>432</strong>
						<small>Rejected Products (missing image)</small>
						<strong>123</strong>
						<small>Approved Products</small>
						<strong>40</strong>
						<small>Pending Products </small>
					</li>
				</ul>
			</div>
			<div class="row-fluid">
					<div class="span12">
							<div class="widget-box">
									<div class="widget-title"> <span class="icon"> <i class="icon-signal"></i> </span>
											<h5>Sales Summary</h5>
									</div>
									<div class="widget-content">
											<div class="chart"></div>
									</div>
							</div>
					</div>
			</div>
			<div class="row-fluid">
					<div class="span6">
							<div class="widget-box">
									<div class="widget-title"> <span class="icon"> <i class="icon-signal"></i> </span>
											<h5>Order Summary</h5>
									</div>
									<div class="widget-content">
											<div class="pie"></div>
									</div>
							</div>
					</div>
					<div class="span6">
							<div class="widget-box">
									<div class="widget-title"> <span class="icon"> <i class="icon-signal"></i> </span>
											<h5>Payment Summary</h5>
									</div>
									<div class="widget-content">
											<div class="bars"></div>
									</div>
							</div>
					</div>
			</div>
		</div>
    <!--End-breadcrumbs-->
    <!--Action boxes-->
    {{--<div class="container-fluid">--}}
        {{--<div class="quick-actions_homepage">--}}
            {{--<ul class="quick-actions">--}}
                {{--<li class="bg_lb"> <a href="index.html"> <i class="icon-dashboard"></i> <span class="label label-important">20</span> My Dashboard </a> </li>--}}
                {{--<li class="bg_lg span3"> <a href="charts.html"> <i class="icon-signal"></i> Charts</a> </li>--}}
                {{--<li class="bg_ly"> <a href="widgets.html"> <i class="icon-inbox"></i><span class="label label-success">101</span> Widgets </a> </li>--}}
                {{--<li class="bg_lo"> <a href="tables.html"> <i class="icon-th"></i> Tables</a> </li>--}}
                {{--<li class="bg_ls"> <a href="grid.html"> <i class="icon-fullscreen"></i> Full width</a> </li>--}}
                {{--<li class="bg_lo span3"> <a href="form-common.html"> <i class="icon-th-list"></i> Forms</a> </li>--}}
                {{--<li class="bg_ls"> <a href="buttons.html"> <i class="icon-tint"></i> Buttons</a> </li>--}}
                {{--<li class="bg_lb"> <a href="interface.html"> <i class="icon-pencil"></i>Elements</a> </li>--}}
                {{--<li class="bg_lg"> <a href="calendar.html"> <i class="icon-calendar"></i> Calendar</a> </li>--}}
                {{--<li class="bg_lr"> <a href="error404.html"> <i class="icon-info-sign"></i> Error</a> </li>--}}
            {{--</ul>--}}
        {{--</div>--}}
    {{--</div>--}}
    <!--End-Action boxes-->
@endsection
