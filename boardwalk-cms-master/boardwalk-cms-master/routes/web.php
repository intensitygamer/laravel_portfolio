<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\ParseUser;
use Illuminate\Http\Request;
use GuzzleHttp\Client as HttpClient;
/**
 * Common
 *
 *
 */
Route::get( '/403', function () {
	$session = session()->all();
	return view( '403' );
} )->name('403');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get( '/logout', function ( Request $request ) {
	session()->flush();
	return redirect()->route('login');
} );

Route::post( '/login', function ( Request $request ) {
  $input = $request->all();
  $client = new HttpClient();
  $response = $client->request('GET', env('NODE_PARSE').'/api/v1/login', [
    'headers' => [
      'x-boardwalk-key' => '6yhn7ujm8ik,',
      'Content-Type' => 'application/json'
    ],
    'query' => [
      'username' => $input['username'],
      'password' => $input['password']
    ]
  ] );

  $status = $response->getStatusCode();
  $body = json_decode( $response->getBody()->getContents() );

	if ( $body->code != 200 ) {
		return redirect()->route('login');
  }

  $user = $body->result;
	$acl  = $user->ACL;

  if ( array_key_exists("role:administrator",$acl) ) {
    session( [ "admin" => true ] );
  }
  if ( array_key_exists("role:merchant",$acl) ) {
    session( [ "merchant" => true ] );
  }

  session( [
    "email" => $user->email,
    "username" => $user->username,
    "first_name" => $user->first_name,
    "last_name" => $user->last_name,
    "acl" => $acl,
    "token" => $user->sessionToken
  ] );
  return redirect()->route('home');
} );


/**
 * For merchants and admin
 *
 */
Route::get('/', function ( Request $request ) {
    View::share('dashboardActive', true);
    return view('dashboard');
})->name('home');

Route::get( '/messages', function () {
    return view('messages');
});

Route::get( '/products', 'Products@show' );

// Route::get( '/products-create', function () {
//     View::share('productsManagementActive', true);
//     return view('products-create');
// });

Route::get('/products-create', 'Products@showCreate');

Route::get( '/products-create-2', function () {
    View::share('productsManagementActive', true);
    return view('products-create-2');
});
Route::get( '/products-create-3', function () {
    View::share('productsManagementActive', true);
    return view('products-create-3');
});
Route::get( '/products-create-4', function () {
    View::share('productsManagementActive', true);
    return view('products-create-4');
});
Route::get( '/products-create-5', function () {
    View::share('productsManagementActive', true);
    return view('products-create-5');
});

Route::get( '/products/{id}', function () {
    View::share('productsManagementActive', true);
    return view('products-edit');
});

Route::get('/products-all', 'Products@getProducts');
Route::get('/products-categories', 'Products@getCategories');
Route::post('/categories-by-parent', 'Products@getCategoriesByParent');
Route::post('/category-products', 'Products@getProductsByCategory');

Route::get( '/vouchers', function () {
    View::share('vouchersActive', true);
    return view('vouchers');
});
Route::get( '/vouchers-create', function () {
    View::share('vouchersActive', true);
    return view('vouchers-create');
});

Route::get( '/orders', function () {
    View::share('ordersActive', true);
    return view('orders');
});
Route::get( '/orders/{id}', function () {
    View::share('ordersActive', true);
    return view('orders-view');
});

Route::get( '/reports', function () {
    View::share('reportsActive', true);
    return view('reports');
});

Route::get( '/users', function () {
    View::share('usersActive', true);
    return view('users');
});

Route::get( '/users-create', function () {
    View::share('usersActive', true);
    return view('users-create');
});

Route::get( '/roles', function () {
    View::share('rolesActive', true);
    return view('roles');
});

Route::get( '/roles-create', function () {
    View::share('rolesActive', true);
    return view('roles-create');
});

Route::get( '/payments', function () {
    View::share('paymentActive', true);
    return view('payments');
});

Route::get( '/return-approvals', function () {
    View::share('returnActive', true);
    return view('return-approvals');
});

/**
 * Only admin
 *
 */
Route::group( [ 'middleware' => [ 'web', 'admin-auth' ] ], function () {
	Route::get( '/collections', function () {
		View::share('productsManagementActive', true);
		return view('collections');
	});

	Route::get( '/collections-create', function () {
			View::share('productsManagementActive', true);
			return view('collections-create');
	});

	Route::get( '/collections/{id}', function () {
			View::share('productsManagementActive', true);
			return view('collections-edit');
	});

	Route::get( '/categories', 'Categories@show')->name('show-categories');
	Route::get( '/categories/{id}', 'Categories@edit' );
	Route::get( '/categories-delete/{id}', 'Categories@delete' );
	Route::get( '/categories-create', 'Categories@showCreate' );
	Route::post( '/categories-create', 'Categories@create' );

	Route::get( '/sub-categories', function () {
			View::share('productsManagementActive', true);
			return view('sub-categories');
	});

	Route::get( '/sub-categories-create', function () {
			View::share('productsManagementActive', true);
			return view('sub-categories-create');
	});

	Route::get( '/brands', function () {
			View::share('productsManagementActive', true);
			return view('brands');
	});

	Route::get( '/brands-create', function () {
			View::share('productsManagementActive', true);
			return view('brands-create');
	});

	Route::get( '/designers', function () {
			View::share('productsManagementActive', true);
			return view('designers');
	});

	Route::get( '/designers-create', function () {
			View::share('productsManagementActive', true);
			return view('designers-create');
	});

	Route::get( '/product-discounts', function () {
			View::share('discountsActive', true);
			return view('product-discounts');
	});

	Route::get( '/product-discounts-create', function () {
			View::share('discountsActive', true);
			return view('product-discounts-create');
	});

	Route::get( '/user-discounts', function () {
			View::share('discountsActive', true);
			return view('user-discounts');
	});

	Route::get( '/user-discounts-create', function () {
			View::share('discountsActive', true);
			return view('user-discounts-create');
	});

	Route::get( '/category-discounts', function () {
			View::share('discountsActive', true);
			return view('category-discounts');
	});

	Route::get( '/category-discounts-create', function () {
			View::share('discountsActive', true);
			return view('category-discounts-create');
	});

	Route::get( '/checkout-discounts', function () {
			View::share('discountsActive', true);
			return view('checkout-discounts');
	});

	Route::get( '/videos', function () {
			View::share('videosActive', true);
			return view('videos');
	});

	Route::get( '/videos-create', function () {
			View::share('videosActive', true);
			return view('videos-create');
	});

	Route::get( '/notifications-create', function () {
			View::share('notificationsActive', true);
			return view('notifications-create');
	});

	Route::get( '/session-management', function () {
			View::share('sessionManagementActive', true);
			return view('session-management');
	});

	Route::get( '/merchants', function () {
			View::share('merchantsActive', true);
			return view('merchants');
	});

	Route::get( '/merchants-create', function () {
			View::share('merchantsActive', true);
			return view('merchants-create');
	});

	Route::get( '/merchant-alerts', function () {
			View::share('notificationsActive', true);
			return view('merchant-alerts');
	});

	Route::get( '/merchant-alerts-create', function () {
			View::share('notificationsActive', true);
			return view('merchant-alerts-create');
	});

	Route::get( '/community', function () {
			View::share('communityActive', true);
			return view('community');
	});

	Route::get( '/community-create', function () {
			View::share('communityActive', true);
			return view('community-create');
	});

	Route::get( '/couriers', function () {
			View::share('couriersActive', true);
			return view('couriers');
	});

	Route::get( '/couriers-create', function () {
			View::share('couriersActive', true);
			return view('couriers-create');
	});

	Route::get( '/notifications', function () {
			View::share('notificationsActive', true);
			return view('notifications');
	});

	Route::get( '/faqs', function () {
			View::share('faqsActive', true);
			return view('faqs');
	});

	Route::get( '/faqs-create', function () {
			View::share('faqsActive', true);
			return view('faqs-create');
	});

	Route::get( '/menus', 'Menus@show' )->name('show-menus');
	Route::get( '/menus/{id}', 'Menus@edit' );
	Route::get( '/menus-delete/{id}', 'Menus@delete' );
	Route::post( '/menus-create', 'Menus@create' );
  Route::get( '/menus-create', 'Menus@showCreate' );

} );
