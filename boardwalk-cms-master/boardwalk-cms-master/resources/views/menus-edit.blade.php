@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="/css/uniform.css" />
    <link rel="stylesheet" href="/css/select2.css" />
    <link rel="stylesheet" href="/css/matrix-style.css" />
    <link rel="stylesheet" href="/css/matrix-media.css" />
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Menus</a></div>
        <h1>Edit Menu</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5>Menu</h5>
                </div>
                <div class="widget-content nopadding">
                    <form action="/menus-create" method="post" class="form-horizontal" enctype="multipart/form-data">
                        <input type="hidden" value="{{$menu->objectId ?? ''}}" name="object_id"/>
                        <div class="control-group">
                            <label class="control-label">Parent :</label>
                            <div class="controls">
                              <select name="parent">
                                <option value="">N/A</option>
                                @foreach ($menus as $all_menus)
                                  <option
                                    @if ( isset( $menu->Parent ) )
                                      @if ($menu->Parent->objectId == $all_menus->objectId )
                                        selected
                                      @endif
                                    @endif
                                    value="{{$all_menus->objectId}}">{{$all_menus->Menu}}</option>
                                @endforeach
															</select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Menu :</label>
                            <div class="controls">
                                <input type="text" name="menu" class="span11" value="{{$menu->Menu ?? ''}}" placeholder="menu" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Layout Type :</label>
                            <div class="controls">
                                <select id="layout_type" name="layout_type">
                                  @foreach ($layoutType as $layout)
                                    @if ( isset( $menu->Layout_Type ) && $layout->value == $menu->Layout_Type )
                                      <option value="{{$layout->value}}" selected>{{$layout->value}}</option>
                                    @else
                                      <option value="{{$layout->value}}">{{$layout->value}}</option>
                                    @endif
                                  @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Order :</label>
                            <div class="controls">
                              <input type="number" name="order" class="span11" value="{{$menu->Order ?? 0}}" placeholder="order" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Menu Type :</label>
                            <div class="controls">
                                <select id="menu_type" name="menu_type">
                                  @foreach ($menuType as $type)
                                    @if ( isset( $menu->Menu_Type ) && $type->value == $menu->Menu_Type )
                                      <option value="{{$type->value}}" selected>{{$type->name}}</option>
                                    @else
                                      <option value="{{$type->value}}">{{$type->name}}</option>
                                    @endif
                                  @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Link :</label>
                            <div class="controls" id="collections">
                              <select name="collections">
                                <option value="">N/A</option>
                                @foreach ($collections as $collection)
                                  <option
                                    @if ( isset( $menu->Link ) )
                                      @if ($menu->Link == $collection->objectId )
                                        selected
                                      @endif
                                    @endif
                                    value="{{$collection->objectId}}">{{$collection->collection_name}}</option>
                                @endforeach
                              </select>
                            </div>
                            <div class="controls" id="categories">
                              <select name="categories">
                                <option value="">N/A</option>
                                @foreach ($categories as $category)
                                  <option
                                    @if ( isset( $menu->Link ) )
                                      @if ($menu->Link == $category->objectId )
                                        selected
                                      @endif
                                    @endif
                                    value="{{$category->objectId}}">{{$category->category_name}}</option>
                                @endforeach
                              </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Logo :</label>
                            <div class="controls">
                                <img src="{{$menu->logo->url ?? ''}}"/>
                                <input type="file" id="logo" name="logo" value="{{$menu->logo->url ?? ''}}" class="span11" placeholder="logo" />
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success">Save</button>
                            <button class="btn btn-danger" onclick="event.preventDefault();window.location='/menus-delete/{{$menu->objectId}}';">Delete</button>
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
    <script>
    if ( {{isset( $menu->Menu_Type ) ? $menu->Menu_Type : 0 }} == 1 ) {
      $('#collections').show()
      $('#categories' ).hide();
    } else {
      $('#categories' ).show();
      $('#collections' ).hide();
    }
    $('#menu_type').change( function ( e ) {
      var menuType = $('#menu_type').val();
      if ( menuType == 1 ) {
        $('#collections').show()
        $('#categories' ).hide();
      } else {
        $('#categories' ).show();
        $('#collections' ).hide();
      }
    } );
    </script>
@endsection
