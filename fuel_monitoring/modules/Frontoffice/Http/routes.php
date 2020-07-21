<?php
//use Illuminate\Support\Facades\Input;
use App\Models\Location as Location;

 Route::get('location/search',function(){
         $query = Request::get('query');
         $l = Location::where('name','like','%'.$query.'%')->get();
         return response()->json($l);
        });

  Route::get('location/search/by',function(){
         $id = Request::get('id');
         $location = Location::where('id','=',$id)->first();
         return response()->json($location);
        });

Route::group(['middleware' => 'web', 'domain' => env('FRONTOFFICE_DOMAIN'), 'namespace' => 'Modules\Frontoffice\Http\Controllers'], function()
{

    /**
     * Get captcha function
     */
    Route::get('/captcha', function (){
        return captcha_src('login');
    });

    /**
     * Global frontend routes only
     */
    Route::group(['middleware' => 'auth'], function () {

        Route::get('/', [
            'uses' => 'FrontofficeController@index',
            'as' => 'users.home'
        ]);

        Route::get('/dashboard', [
            'uses' => 'FrontofficeController@index',
            'as' => 'users.dashboard'
        ]);




        /**
         * PE Controller (Print and Export Controller)
         */
        require "Routes/pe/manage_pe.php";

        /**
         * Monitoring reports routes
         */
        require "Routes/reports/stock.php";
        require "Routes/reports/fuel.php";
        require "Routes/reports/lubricant.php";
        require "Routes/reports/subcontractorwork.php";
        require "Routes/reports/equipment_analytics.php";

        /**
         * Managing routes
         */
        require "Routes/manages/manage_locations.php";
        require "Routes/manages/manage_operators.php";
        require "Routes/manages/manage_equipments.php";
        require "Routes/manages/manage_subcontractors.php";
        require "Routes/manages/manage_projects.php";

        /**
         * Managing user routes
         */
        require "Routes/users/manage_users.php";
        require "Routes/users/self.php";

    });

    /**
     * User without Auth Routes
     */
    require "Routes/users/auth.php";

});
