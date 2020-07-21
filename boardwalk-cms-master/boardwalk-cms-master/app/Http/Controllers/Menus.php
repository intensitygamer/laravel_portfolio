<?php

namespace App\Http\Controllers;

use View;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use GuzzleHttp\Client as HttpClient;

class Menus extends Controller
{
  public static $menuType = array(
    array( 'value' => 0, 'name' => 'Category' ),
    array( 'value' => 1, 'name' => 'Collection' )
  );

  public static $layoutType = array(
    array( 'value' => 0 ),
    array( 'value' => 1 ),
    array( 'value' => 2 ),
    array( 'value' => 3 ),
    array( 'value' => 4 )
  );

  public function show () {
    $client = new HttpClient();
    $response = $client->request('GET', env('NODE_PARSE').'/api/v1/raw-menus', [
      'headers' => [
        'x-boardwalk-key' => env('X_BOARDWALK_KEY'),
        'Content-Type' => 'application/json'
      ]
    ] );
    $status = $response->getStatusCode();
    $body = json_decode( $response->getBody()->getContents() )->result;

    View::share('designsActive', true);
    return view('menus',[ 'menus' => $body ]);
  }

  public function showCreate () {
    $client = new HttpClient();

    // Get all Menus
    $rawMenusResponse = $client->request('GET', env('NODE_PARSE').'/api/v1/raw-menus', [
      'headers' => [
        'x-boardwalk-key' => env('X_BOARDWALK_KEY'),
        'Content-Type' => 'application/json'
      ]
    ] );
    $rawMenus = json_decode( $rawMenusResponse->getBody()->getContents() )->result;
    View::share('designsActive', true);

    // Get all categories
    $categories = $client->request('GET', env('NODE_PARSE').'/api/v1/categories', [
      'headers' => [
        'x-boardwalk-key' => env('X_BOARDWALK_KEY'),
        'Content-Type' => 'application/json'
      ]
    ] );
    $categoriesResponse = json_decode( $categories->getBody()->getContents() )->result;

    // Get all collections
    $collections = $client->request('GET', env('NODE_PARSE').'/api/v1/collections', [
      'headers' => [
        'x-boardwalk-key' => env('X_BOARDWALK_KEY'),
        'Content-Type' => 'application/json'
      ]
    ] );
    $collectionsResponse = json_decode( $collections->getBody()->getContents() )->result;

    return view('menus-create',[
      'menu' => (object) array(
        'Menu' => '',
        'Link' => '',
        'Order' => '',
        'Menu_Type' => 0,
      ),
      'menus' => $rawMenus,
      'categories' => $categoriesResponse,
      'collections' => $collectionsResponse,
      'menuType' => json_decode( json_encode( self::$menuType ) ),
      'layoutType' => json_decode( json_encode( self::$layoutType ) )
    ]);
  }

  public function edit ($id) {
    $client = new HttpClient();
    $response = $client->request('GET', env('NODE_PARSE').'/api/v1/raw-menus/'.$id, [
      'headers' => [
        'x-boardwalk-key' => env('X_BOARDWALK_KEY'),
        'Content-Type' => 'application/json'
      ]
    ] );
    $status = $response->getStatusCode();
    $body = json_decode( $response->getBody()->getContents() )->result;

    // Get all Menus
    $rawMenusResponse = $client->request('GET', env('NODE_PARSE').'/api/v1/raw-menus', [
      'headers' => [
        'x-boardwalk-key' => env('X_BOARDWALK_KEY'),
        'Content-Type' => 'application/json'
      ]
    ] );
    $rawMenus = json_decode( $rawMenusResponse->getBody()->getContents() )->result;
    View::share('designsActive', true);

    // Get all categories
    $categories = $client->request('GET', env('NODE_PARSE').'/api/v1/categories', [
      'headers' => [
        'x-boardwalk-key' => env('X_BOARDWALK_KEY'),
        'Content-Type' => 'application/json'
      ]
    ] );
    $categoriesResponse = json_decode( $categories->getBody()->getContents() )->result;

    // Get all collections
    $collections = $client->request('GET', env('NODE_PARSE').'/api/v1/collections', [
      'headers' => [
        'x-boardwalk-key' => env('X_BOARDWALK_KEY'),
        'Content-Type' => 'application/json'
      ]
    ] );
    $collectionsResponse = json_decode( $collections->getBody()->getContents() )->result;

    //echo "<pre>";
    //print_r( $body );
    //print_r(json_decode( json_encode( self::$layoutType ) ) );
    //die();
    return view('menus-edit',[ 'menu' => $body,
      'menus' => $rawMenus,
      'categories' => $categoriesResponse,
      'collections' => $collectionsResponse,
      'menuType' => json_decode( json_encode( self::$menuType ) ),
      'layoutType' => json_decode( json_encode( self::$layoutType ) )
    ]);
  }

  public function delete ( $id ) {
    $client = new HttpClient();
    $session = session()->all();
    $response = $client->request('DELETE', env('NODE_PARSE').'/api/v1/menus/'.$id, [
      'headers' => [
        'x-boardwalk-key' => env('X_BOARDWALK_KEY'),
        'Content-Type' => 'application/json',
        'x-boardwalk-session-token' => $session['token']
      ]
    ] );
    $status = $response->getStatusCode();
    $successDelete = json_decode( $response->getBody()->getContents() )->result;
    return redirect()->route('show-menus');
  }

  public function create ( Request $request ) {
    $input = $request->all();

    $link = $input['categories'];
    if ( $input['menu_type'] == 1 ) {
      $link = $input['collections'];
    }
    $method = 'POST';
    $api    = '/api/v1/menus/';
    if( isset( $input['object_id'] ) ) {
      $method = 'PUT';
      $api = '/api/v1/menus/'.$input['object_id'];
    }

    $client = new HttpClient();
    // Set body
    $requestBody = [
      'Menu' => $input['menu'],
      'Menu_Type' => (int)$input['menu_type'],
      'Parent' => [
        '__type' => 'Pointer',
        'className' => 'Menu',
        'objectId' => $input['parent']
      ],
      'Layout_Type' => (int)$input['layout_type'],
      'Link' => $link,
      'Order' => (int)$input['order']
    ];

    if ( isset( $input[ 'logo' ] ) ) {
      $uploadFile = $client->request('POST', env('NODE_PARSE').'/api/v1/files', [
        'headers' => [
          'x-boardwalk-key' => env('X_BOARDWALK_KEY')
        ],
        'multipart' => [
          [
            'name' => 'files',
            'contents' => fopen( $request->logo->path(), 'r' )
          ]
        ]
      ] );
      $uploadFileBody = json_decode( $uploadFile->getBody()->getContents() )->result;
      $requestBody['logo'] = [
        'name' => $uploadFileBody->name,
        'url' => $uploadFileBody->url,
        '__type' => 'File'
      ];
    }

    $session = session()->all();
    $response = $client->request($method, env('NODE_PARSE').$api, [
      'headers' => [
        'x-boardwalk-key' => env('X_BOARDWALK_KEY'),
        'Content-Type' => 'application/json',
        'x-boardwalk-session-token' => $session['token']
      ],
      'json' => $requestBody
    ] );
    $status = $response->getStatusCode();
    $body = json_decode( $response->getBody()->getContents() )->result;

    // Check if edit mode
    if( isset( $input['object_id'] ) ) {
      $id = $input['object_id'];
    } else {
      $id = $body->objectId;
    }
    return redirect()->action( 'Menus@edit', ['id' => $id]);
  }
}
