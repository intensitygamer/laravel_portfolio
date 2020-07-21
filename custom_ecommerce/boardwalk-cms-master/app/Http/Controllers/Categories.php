<?php

namespace App\Http\Controllers;

use View;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use GuzzleHttp\Client as HttpClient;

class Categories extends Controller
{
  public function show () {
    $client = new HttpClient();
    $response = $client->request('GET', env('NODE_PARSE').'/api/v1/categories', [
      'headers' => [
        'x-boardwalk-key' => env('X_BOARDWALK_KEY'),
        'Content-Type' => 'application/json'
      ]
    ] );
    $status = $response->getStatusCode();
    $body = json_decode( $response->getBody()->getContents() )->result;

    View::share('productsManagementActive', true);
    return view('categories',[ 'categories' => $body ]);
  }

  public function edit ($id) {
    $client = new HttpClient();
    $response = $client->request('GET', env('NODE_PARSE').'/api/v1/categories/'.$id, [
      'headers' => [
        'x-boardwalk-key' => env('X_BOARDWALK_KEY'),
        'Content-Type' => 'application/json'
      ]
    ] );
    $status = $response->getStatusCode();
    $body = json_decode( $response->getBody()->getContents() )->result;

    /** Get all categories **/
    $subCategoriesResponse = $client->request('GET', env('NODE_PARSE').'/api/v1/categories', [
      'headers' => [
        'x-boardwalk-key' => env('X_BOARDWALK_KEY'),
        'Content-Type' => 'application/json'
      ]
    ] );
    $subCategoriesBody = json_decode( $subCategoriesResponse->getBody()->getContents() )->result;

    View::share('productsManagementActive', true);
    return view('categories-edit',[ 'category' => $body,'categories' => $subCategoriesBody ]);
  }

  public function delete ( $id ) {
    $client = new HttpClient();
    $session = session()->all();
    $response = $client->request('DELETE', env('NODE_PARSE').'/api/v1/categories/'.$id, [
      'headers' => [
        'x-boardwalk-key' => env('X_BOARDWALK_KEY'),
        'Content-Type' => 'application/json',
        'x-boardwalk-session-token' => $session['token']
      ]
    ] );
    $status = $response->getStatusCode();
    $successDelete = json_decode( $response->getBody()->getContents() )->result;
    return redirect()->route('show-categories');
  }

  public function showCreate ( Request $request ) {
    $input = $request->all();
    $client = new HttpClient();
    /** Get all categories **/
    $subCategoriesResponse = $client->request('GET', env('NODE_PARSE').'/api/v1/categories', [
      'headers' => [
        'x-boardwalk-key' => env('X_BOARDWALK_KEY'),
        'Content-Type' => 'application/json'
      ]
    ] );
    $subCategoriesBody = json_decode( $subCategoriesResponse->getBody()->getContents() )->result;
    View::share('productsManagementActive', true);
    return view('categories-create',[ 'categories' => $subCategoriesBody, 'parent_category' => $input['parent_category'] ?? '' ]);
  }

  public function create ( Request $request ) {
    $input = $request->all();
    $client = new HttpClient();
    $session = session()->all();

    $method = 'POST';
    $api    = '/api/v1/categories/';
    if( isset( $input['object_id'] ) ) {
      $method = 'PUT';
      $api = '/api/v1/categories/'.$input['object_id'];
    }

    $response = $client->request($method, env('NODE_PARSE').$api, [
      'headers' => [
        'x-boardwalk-key' => env('X_BOARDWALK_KEY'),
        'Content-Type' => 'application/json',
        'x-boardwalk-session-token' => $session['token']
      ],
      'json' => [
        'category_name' => $input['category_name'],
        'category_description' => $input['category_description'],
        'parent_category' => [
          '__type' => 'Pointer',
          'className' => 'Category',
          'objectId' => $input['parent_category']
        ]
      ]
    ] );
    $status = $response->getStatusCode();
    $body = json_decode( $response->getBody()->getContents() )->result;
    // Check if edit mode
    if( isset( $input['object_id'] ) ) {
      $id = $input['object_id'];
    } else {
      $id = $body->objectId;
    }
    return redirect()->action( 'Categories@edit', ['id' => $id]);
  }
}
