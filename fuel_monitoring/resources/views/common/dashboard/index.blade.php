@extends('templates.dmonitoring.master')
@section('title', 'Dashboard')
@section('body-class', 'dashboard')

@php
    // refactor magic numbers
    $permission = (new \Permission);
    $dateHelper = new \App\Helpers\DateHelper;
    $monitorHelper = new \App\Helpers\MonitorHelper;
@endphp

@section('main')
    <div class="main-container-wrapper">
        @if ((new \Permission)->can_view_user_dashboard())
            @include('templates.dmonitoring.includes.page-title', ['page_title' => 'My Dashboard'])
        @endif

        @if ((new \Permission)->can_view_admin_dashboard())
            @include('templates.dmonitoring.includes.page-title', ['page_title' => 'Administrator Dashboard'])
        @endif


        <div class="main-container">
            <h5 class="dashboard-welcome--text">Hi {{ Auth::user()->full_name }} welcome to your dashboard!</h5>

            <!-- Equipment -->
            <div class="row gutter">
                <div class="col-md-12">
                    <h3 class="dashboard-title--section">Equipment Monitoring Summary</h3>
                </div>
            </div>

            <div class="row gutter margin-top-30">
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="mini-widget">
                        <div class="mini-widget-heading clearfix">
                            <div class="pull-left">Equipment Stock</div>
                            <div class="pull-right"><a href="#"><i class="fa fa-arrow-circle-right"></i> View Chart</a></div>
                        </div>
                        <div class="mini-widget-body clearfix">
                            <div class="pull-left"><i class="fa fa-cubes"></i></div>
                            <div class="pull-right number">{{ $monitorHelper->get_total_fuel_stock() }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="mini-widget red">
                        <div class="mini-widget-heading clearfix">
                            <div class="pull-left">Equipment Consumption</div>
                            <div class="pull-right"><a href="#"><i class="fa fa-arrow-circle-right"></i> View Chart</a></div>
                        </div>
                        <div class="mini-widget-body clearfix">
                            <div class="pull-left"><i class="fa fa-cube"></i></div>
                            <div class="pull-right number">{{ $monitorHelper->get_total_fuel_use() }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="mini-widget gray">
                        <div class="mini-widget-heading clearfix">
                            <div class="pull-left">Equipment Fuel</div>
                            <div class="pull-right"><a href="{{ url('fuel') }}"><i class="fa fa-table"></i> View Reports</a></div>
                        </div>
                        <div class="mini-widget-body clearfix">
                            <div class="pull-left"><i class="fa fa-line-chart"></i></div>
                            <div class="pull-right number">{{ bcsub($monitorHelper->get_total_fuel_stock(),
                            $monitorHelper->get_total_fuel_use(), 3) }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row gutter">
                <div class="col-md-12">
                    <h3 class="dashboard-title--section">Fuel Monitoring Summary</h3>
                </div>
            </div>

            <div class="row gutter margin-top-30">
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="mini-widget">
                        <div class="mini-widget-heading clearfix">
                            <div class="pull-left">Fuel Stock</div>
                            <div class="pull-right"><a href="#"><i class="fa fa-arrow-circle-right"></i> View Chart</a></div>
                        </div>
                        <div class="mini-widget-body clearfix">
                            <div class="pull-left"><i class="fa fa-cubes"></i></div>
                            <div class="pull-right number">{{ $monitorHelper->get_total_fuel_stock() }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="mini-widget red">
                        <div class="mini-widget-heading clearfix">
                            <div class="pull-left">Fuel Consumption</div>
                            <div class="pull-right"><a href="#"><i class="fa fa-arrow-circle-right"></i> View Chart</a></div>
                        </div>
                        <div class="mini-widget-body clearfix">
                            <div class="pull-left"><i class="fa fa-cube"></i></div>
                            <div class="pull-right number">{{ $monitorHelper->get_total_fuel_use() }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="mini-widget gray">
                        <div class="mini-widget-heading clearfix">
                            <div class="pull-left">Available Fuel</div>
                            <div class="pull-right"><a href="{{ url('fuel') }}"><i class="fa fa-table"></i> View Reports</a></div>
                        </div>
                        <div class="mini-widget-body clearfix">
                            <div class="pull-left"><i class="fa fa-line-chart"></i></div>
                            <div class="pull-right number">{{ bcsub($monitorHelper->get_total_fuel_stock(),
                            $monitorHelper->get_total_fuel_use(), 3) }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row gutter">
                <div class="col-md-12">
                    <h3 class="dashboard-title--section">Lubricant Monitoring Summary</h3>
                </div>
            </div>

            <div class="row gutter margin-top-30">
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="mini-widget">
                        <div class="mini-widget-heading clearfix">
                            <div class="pull-left">Engine Stock</div>
                            <div class="pull-right"><a href="#"><i class="fa fa-arrow-circle-right"></i> View Chart</a></div>
                        </div>
                        <div class="mini-widget-body clearfix">
                            <div class="pull-left"><i class="fa fa-cubes"></i></div>
                            <div class="pull-right number">{{ $monitorHelper->get_total_engine_stock() }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="mini-widget red">
                        <div class="mini-widget-heading clearfix">
                            <div class="pull-left">Engine Consumption</div>
                            <div class="pull-right"><a href="#"><i class="fa fa-arrow-circle-right"></i> View Chart</a></div>
                        </div>
                        <div class="mini-widget-body clearfix">
                            <div class="pull-left"><i class="fa fa-cube"></i></div>
                            <div class="pull-right number">{{ $monitorHelper->get_total_engine_use() }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="mini-widget gray">
                        <div class="mini-widget-heading clearfix">
                            <div class="pull-left">Available Engine Oil</div>
                            <div class="pull-right"><a href="{{ url('lubricant') }}"><i class="fa fa-table"></i> View Reports</a></div>
                        </div>
                        <div class="mini-widget-body clearfix">
                            <div class="pull-left"><i class="fa fa-line-chart"></i></div>
                            <div class="pull-right number">{{ bcsub($monitorHelper->get_total_engine_stock(),
                            $monitorHelper->get_total_engine_use(), 3) }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row gutter margin-top-30">
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="mini-widget">
                        <div class="mini-widget-heading clearfix">
                            <div class="pull-left">Hydraulic Oil Stock</div>
                            <div class="pull-right"><a href="#"><i class="fa fa-arrow-circle-right"></i> View Chart</a></div>
                        </div>
                        <div class="mini-widget-body clearfix">
                            <div class="pull-left"><i class="fa fa-cubes"></i></div>
                            <div class="pull-right number">{{ $monitorHelper->get_total_hydraulic_stock() }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="mini-widget red">
                        <div class="mini-widget-heading clearfix">
                            <div class="pull-left">Hydraulic Consumption</div>
                            <div class="pull-right"><a href="#"><i class="fa fa-arrow-circle-right"></i> View Chart</a></div>
                        </div>
                        <div class="mini-widget-body clearfix">
                            <div class="pull-left"><i class="fa fa-cube"></i></div>
                            <div class="pull-right number">{{ $monitorHelper->get_total_hydraulic_use() }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="mini-widget gray">
                        <div class="mini-widget-heading clearfix">
                            <div class="pull-left">Available Hydraulic Oil</div>
                            <div class="pull-right"><a href="{{ url('lubricant') }}"><i class="fa fa-table"></i> View Reports</a></div>
                        </div>
                        <div class="mini-widget-body clearfix">
                            <div class="pull-left"><i class="fa fa-line-chart"></i></div>
                            <div class="pull-right number">{{ bcsub($monitorHelper->get_total_hydraulic_stock(),
                            $monitorHelper->get_total_hydraulic_use(), 3) }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row gutter margin-top-30">
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="mini-widget">
                        <div class="mini-widget-heading clearfix">
                            <div class="pull-left">Gear Oil Stock</div>
                            <div class="pull-right"><a href="#"><i class="fa fa-arrow-circle-right"></i> View Chart</a></div>
                        </div>
                        <div class="mini-widget-body clearfix">
                            <div class="pull-left"><i class="fa fa-cubes"></i></div>
                            <div class="pull-right number">{{ $monitorHelper->get_total_gear_stock() }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="mini-widget red">
                        <div class="mini-widget-heading clearfix">
                            <div class="pull-left">Gear Oil Consumption</div>
                            <div class="pull-right"><a href="#"><i class="fa fa-arrow-circle-right"></i> View Chart</a></div>
                        </div>
                        <div class="mini-widget-body clearfix">
                            <div class="pull-left"><i class="fa fa-cube"></i></div>
                            <div class="pull-right number">{{ $monitorHelper->get_total_gear_use() }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="mini-widget gray">
                        <div class="mini-widget-heading clearfix">
                            <div class="pull-left">Available Gear Oil</div>
                            <div class="pull-right"><a href="{{ url('lubricant') }}"><i class="fa fa-table"></i> View Reports</a></div>
                        </div>
                        <div class="mini-widget-body clearfix">
                            <div class="pull-left"><i class="fa fa-line-chart"></i></div>
                            <div class="pull-right number">{{ bcsub($monitorHelper->get_total_gear_stock(),
                            $monitorHelper->get_total_gear_use(), 3) }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row gutter margin-top-30">
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="mini-widget">
                        <div class="mini-widget-heading clearfix">
                            <div class="pull-left">Telluse Stock</div>
                            <div class="pull-right"><a href="#"><i class="fa fa-arrow-circle-right"></i> View Chart</a></div>
                        </div>
                        <div class="mini-widget-body clearfix">
                            <div class="pull-left"><i class="fa fa-cubes"></i></div>
                            <div class="pull-right number">{{ $monitorHelper->get_total_telluse_stock() }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="mini-widget red">
                        <div class="mini-widget-heading clearfix">
                            <div class="pull-left">Telluse Consumption</div>
                            <div class="pull-right"><a href="#"><i class="fa fa-arrow-circle-right"></i> View Chart</a></div>
                        </div>
                        <div class="mini-widget-body clearfix">
                            <div class="pull-left"><i class="fa fa-cube"></i></div>
                            <div class="pull-right number">{{ $monitorHelper->get_total_telluse_use() }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="mini-widget gray">
                        <div class="mini-widget-heading clearfix">
                            <div class="pull-left">Available Telluse</div>
                            <div class="pull-right"><a href="{{ url('lubricant') }}"><i class="fa fa-table"></i> View Reports</a></div>
                        </div>
                        <div class="mini-widget-body clearfix">
                            <div class="pull-left"><i class="fa fa-line-chart"></i></div>
                            <div class="pull-right number">{{ bcsub($monitorHelper->get_total_telluse_stock(),
                            $monitorHelper->get_total_telluse_use(), 3) }}</div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection