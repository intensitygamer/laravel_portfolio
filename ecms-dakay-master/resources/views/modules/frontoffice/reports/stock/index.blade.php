@extends('templates.dmonitoring.master')
@section('title', 'Stock Monitoring')

@php
    $permission = (new \Permission);
@endphp

@section('main')
    <div class="main-container-wrapper">
        @include('templates.dmonitoring.includes.page-title', ['page_title' => 'Stock Monitoring'])
        <div class="main-container">

            <div class="row no-margin margin-bottom-20">
                <div class="col-md-12 filter-wrapper">
                    <div class="col-md-6">
                        <div class="row">
                            {!! Form::open(['method'=>'get', 'class' => 'form-horizontal', 'name' => 'stockfilter-form']) !!}
                            <div class="col-md-9">
                                {{ Form::bsDateRangePicker(
                                    ['name' => 'date_from', 'value' => request('date_from'), 'label' => 'From Date', 'attributes' => ['id'=>'date_from'] ],
                                    ['name' => 'date_to', 'value' => request('date_to'), 'label' => 'To Date','attributes' => ['id'=>'date_to'] ]
                                ) }}
                            </div>
                            <div class="col-md-3 no-padding">
                                <a href="{{ url('stock') }}" class="btn btn-warning margin-top-20">Reset</a>
                                {{ Form::submit('Filter', ['class' => 'btn btn-primary btn-filter margin-top-20']) }}
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <a href="{{ url('/') }}" class="btn btn-warning margin-left-30"><i class="fa fa-print"></i> PRINT</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="panel panel-default panel-ecms margin-top-20">
                <div class="panel-heading">Fuel Monitoring</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="box-chart">
                                <canvas id="fuel-bar-monitoring"></canvas>
                                <div class="footer-title">
                                    Current Fuel on Stock
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box-chart">
                                <div class="line-wrapper">
                                    <canvas id="fuel-stock-monitoring"></canvas>
                                </div>
                                <div class="footer-title">
                                    Fuel Stock / Month
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box-chart">
                                <div class="line-wrapper">
                                    <canvas id="fuel-usage-monitoring"></canvas>
                                </div>
                                <div class="footer-title">
                                    Fuel Usage / Month
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default panel-ecms margin-top-20">
                <div class="panel-heading">Lubricants Monitoring - Engine Oil</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="box-chart">
                                <canvas id="engine-bar-monitoring"></canvas>
                                <div class="footer-title">
                                    Engine Oil (15W40) on Stock
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box-chart">
                                <div class="line-wrapper">
                                    <canvas id="engine-stock-monitoring"></canvas>
                                </div>
                                <div class="footer-title">
                                    Engine Stock / Month
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box-chart">
                                <div class="line-wrapper">
                                    <canvas id="engine-usage-monitoring"></canvas>
                                </div>
                                <div class="footer-title">
                                    Engine Usage / Month
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default panel-ecms margin-top-20">
                <div class="panel-heading">Lubricants Monitoring - Hydraulic Oil</div>
                <div class="panel-body">
                    <div class="row margin-top-20">
                        <div class="col-md-4">
                            <div class="box-chart">
                                <canvas id="hydraulic-bar-monitoring"></canvas>
                                <div class="footer-title">
                                    Hydraulic Oil (4W100) on Stock
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box-chart">
                                <div class="line-wrapper">
                                    <canvas id="hydraulic-stock-monitoring"></canvas>
                                </div>
                                <div class="footer-title">
                                    Hydraulic Stock / Month
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box-chart">
                                <div class="line-wrapper">
                                    <canvas id="hydraulic-usage-monitoring"></canvas>
                                </div>
                                <div class="footer-title">
                                    Hydraulic Usage / Month
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default panel-ecms margin-top-20">
                <div class="panel-heading">Lubricants Monitoring - Gear Oil</div>
                <div class="panel-body">
                    <div class="row margin-top-20">
                        <div class="col-md-4">
                            <div class="box-chart">
                                <canvas id="gear-bar-monitoring" ></canvas>
                                <div class="footer-title">
                                    Gear Oil (4W100) on Stock
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box-chart">
                                <div class="line-wrapper">
                                    <canvas id="gear-stock-monitoring"></canvas>
                                </div>
                                <div class="footer-title">
                                    Gear Stock / Month
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box-chart">
                                <div class="line-wrapper">
                                    <canvas id="gear-usage-monitoring"></canvas>
                                </div>
                                <div class="footer-title">
                                    Gear Usage / Month
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default panel-ecms margin-top-20">
                <div class="panel-heading">Lubricants Monitoring - Telluse Oil</div>
                <div class="panel-body">
                    <div class="row margin-top-20">
                        <div class="col-md-4">
                            <div class="box-chart">
                                <canvas id="telluse-bar-monitoring"></canvas>
                                <div class="footer-title">
                                    Telluse Oil (4W100) on Stock
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box-chart">
                                <div class="line-wrapper">
                                    <canvas id="telluse-stock-monitoring"></canvas>
                                </div>
                                <div class="footer-title">
                                    Telluse Stock / Month
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box-chart">
                                <div class="line-wrapper">
                                    <canvas id="telluse-usage-monitoring"></canvas>
                                </div>
                                <div class="footer-title">
                                    Telluse Usage / Month
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script type="text/javascript" src="{{ asset('js/chartjs.js') }}"></script>



<script type="text/javascript">

    /**
     * Fuel monitoring chart setup
     */
    CreateChart('line', {
        selector: 'fuel-stock-monitoring',
        data: {
            labels: {!! json_encode($charts['fuel_monthly_stock']['labels']) !!},
            datasets: [ { data: {!!json_encode($charts['fuel_monthly_stock']['datasets']) !!} } ]
        },
        themes: {
            background: 'rgba(70,71,169,0.20)',
            pointBackground: '#8388b9',
            pointHoverBorder: '#e8bb51',
            pointHoverBackground: '#ffffff',
        }
    });

    CreateChart('line', {
        selector: 'fuel-usage-monitoring',
        data: {
            labels: {!! json_encode($charts['fuel_monthly_usage']['labels']) !!},
            datasets: [ { data: {!!json_encode($charts['fuel_monthly_usage']['datasets']) !!} } ]
        },
        themes: {
            background: 'rgba(70,71,169,0.20)',
            pointBackground: '#8388b9',
            pointHoverBorder: '#e8bb51',
            pointHoverBackground: '#ffffff',
        }
    });

    CreateChart('bar', {
        selector: 'fuel-bar-monitoring',
        data: {
            labels: ['Fuel Available (%)'],
            datasets: [ { data: ['{{ $charts['use_fuel'] }}'] } ]
        },
        themes: {
            background: '#8388b9',
            pointBackground: '#8388b9',
            pointHoverBorder: '#e8bb51',
            pointHoverBackground: '#ffffff',
        }
    });

    /**
     * Lubricant monitoring chart setup
     */

    /* Engine */
    CreateChart('line', {
        selector: 'engine-stock-monitoring',
        data: {
            labels: {!! json_encode($charts['engine_monthly_stock']['labels']) !!},
            datasets: [ { data: {!!json_encode($charts['engine_monthly_stock']['datasets']) !!} } ]
        },
        themes: {
            background: 'rgba(80,152,199,0.20)',
            pointBackground: '#5098c7',
            pointHoverBorder: '#e88e30',
            pointHoverBackground: '#ffffff',
        }
    });

    CreateChart('line', {
        selector: 'engine-usage-monitoring',
        data: {
            labels: {!! json_encode($charts['engine_monthly_usage']['labels']) !!},
            datasets: [ { data: {!!json_encode($charts['engine_monthly_usage']['datasets']) !!} } ]
        },
        themes: {
            background: 'rgba(80,152,199,0.20)',
            pointBackground: '#5098c7',
            pointHoverBorder: '#e88e30',
            pointHoverBackground: '#ffffff',
        }
    });

    CreateChart('bar', {
        selector: 'engine-bar-monitoring',
        data: {
            labels: ['Engine Oil Available (%)'],
            datasets: [ { data: ['{{ $charts['use_engine_oil'] }}'] } ]
        },
        themes: {
            background: '#5098c7',
            pointBackground: '#5098c7',
            pointHoverBorder: '#e88e30',
            pointHoverBackground: '#ffffff',
        }
    });

    /* Hydraulic */
    CreateChart('line', {
        selector: 'hydraulic-stock-monitoring',
        data: {
            labels: {!! json_encode($charts['hydraulic_monthly_stock']['labels']) !!},
            datasets: [ { data: {!!json_encode($charts['hydraulic_monthly_stock']['datasets']) !!} } ]
        },
        themes: {
            background: 'rgba(143,157,167,0.20)',
            pointBackground: '#8f9da7',
            pointHoverBorder: '#333333',
            pointHoverBackground: '#ffffff',
        }
    });

    CreateChart('line', {
        selector: 'hydraulic-usage-monitoring',
        data: {
            labels: {!! json_encode($charts['hydraulic_monthly_usage']['labels']) !!},
            datasets: [ { data: {!!json_encode($charts['hydraulic_monthly_usage']['datasets']) !!} } ]
        },
        themes: {
            background: 'rgba(143,157,167,0.20)',
            pointBackground: '#8f9da7',
            pointHoverBorder: '#333333',
            pointHoverBackground: '#ffffff',
        }
    });

    CreateChart('bar', {
        selector: 'hydraulic-bar-monitoring',
        data: {
            labels: ['Hydraulic Oil Available (%)'],
            datasets: [ { data: ['{{ $charts['use_hydraulic_oil'] }}'] } ]
        },
        themes: {
            background: '#8f9da7',
            pointBackground: '#8f9da7',
            pointHoverBorder: '#333333',
            pointHoverBackground: '#ffffff',
        }
    });

    /* Gear */
    CreateChart('line', {
        selector: 'gear-stock-monitoring',
        data: {
            labels: {!! json_encode($charts['gear_monthly_stock']['labels']) !!},
            datasets: [ { data: {!!json_encode($charts['gear_monthly_stock']['datasets']) !!} } ]
        },
        themes: {
            background: 'rgba(48,109,23,0.20)',
            pointBackground: '#306d17',
            pointHoverBorder: '#cce877',
            pointHoverBackground: '#ffffff',
        }
    });

    CreateChart('line', {
        selector: 'gear-usage-monitoring',
        data: {
            labels: {!! json_encode($charts['gear_monthly_usage']['labels']) !!},
            datasets: [ { data: {!!json_encode($charts['gear_monthly_usage']['datasets']) !!} } ]
        },
        themes: {
            background: 'rgba(48,109,23,0.20)',
            pointBackground: '#306d17',
            pointHoverBorder: '#cce877',
            pointHoverBackground: '#ffffff',
        }
    });

    CreateChart('bar', {
        selector: 'gear-bar-monitoring',
        data: {
            labels: ['Gear Oil Available (%)'],
            datasets: [ { data: ['{{ $charts['use_gear_oil'] }}'] } ]
        },
        themes: {
            background: '#306d17',
            pointBackground: '#306d17',
            pointHoverBorder: '#cce877',
            pointHoverBackground: '#ffffff',
        }
    });

    /* Telluse */
    CreateChart('line', {
        selector: 'telluse-stock-monitoring',
        data: {
            labels: {!! json_encode($charts['telluse_monthly_stock']['labels']) !!},
            datasets: [ { data: {!!json_encode($charts['telluse_monthly_stock']['datasets']) !!} } ]
        },
        themes: {
            background: 'rgba(202,35,35,0.20)',
            pointBackground: '#ca2323',
            pointHoverBorder: '#4758e8',
            pointHoverBackground: '#ffffff',
        }
    });

    CreateChart('line', {
        selector: 'telluse-usage-monitoring',
        data: {
            labels: {!! json_encode($charts['telluse_monthly_usage']['labels']) !!},
            datasets: [ { data: {!!json_encode($charts['telluse_monthly_usage']['datasets']) !!} } ]
        },
        themes: {
            background: 'rgba(202,35,35,0.20)',
            pointBackground: '#ca2323',
            pointHoverBorder: '#ca2323',
            pointHoverBackground: '#ffffff',
        }
    });

    CreateChart('bar', {
        selector: 'telluse-bar-monitoring',
        data: {
            labels: ['Telluse Available (%)'],
            datasets: [ { data: ['{{ $charts['use_telluse'] }}'] } ]
        },
        themes: {
            background: '#ca2323',
            pointBackground: '#ca2323',
            pointHoverBorder: '#ca2323',
            pointHoverBackground: '#ffffff',
        }
    });
</script>
@endpush
