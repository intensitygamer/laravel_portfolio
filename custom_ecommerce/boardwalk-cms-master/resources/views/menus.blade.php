@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="css/uniform.css" />
    <link rel="stylesheet" href="css/select2.css" />
    <link rel="stylesheet" href="css/matrix-style.css" />
    <link rel="stylesheet" href="css/matrix-media.css" />
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Menus</a></div>
        <h1>Menus  <a href="/menus-create" class="btn btn-success">+</a></h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>Menus</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>Menu</th>
                                <th>Parent menu</th>
                                <th>Link</th>
                            </tr>
                            </thead>
														<tbody>
														@foreach($menus as $menu)
														<tr class="gradeX">
                                <td><a href="/menus/{{$menu->objectId}}">{{$menu->Menu}}</a></td>
																<td>{{property_exists( $menu, 'Parent' ) ? $menu->Parent->Menu : ''}}</td>
																<td>{{$menu->Link ?? ''}}</td>
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
