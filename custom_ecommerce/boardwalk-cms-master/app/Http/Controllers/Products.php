<?php

namespace App\Http\Controllers;

use View;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use GuzzleHttp\Client as HttpClient;

class Products extends Controller
{
  public function show () {
    $client = new HttpClient();
    $response = $client->request('GET', env('NODE_PARSE').'/api/v1/products', [
      'headers' => [
        'x-boardwalk-key' => env('X_BOARDWALK_KEY'),
        'Content-Type' => 'application/json'
      ]
    ] );
    $status = $response->getStatusCode();
    $body = json_decode( $response->getBody()->getContents() )->result;

    View::share('productsManagementActive', true);
    return view('products',[ 'products' => $body ]);
  }

  public function edit ($id) {
    $client = new HttpClient();
    $response = $client->request('GET', env('NODE_PARSE').'/api/v1/products/'.$id, [
      'headers' => [
        'x-boardwalk-key' => env('X_BOARDWALK_KEY'),
        'Content-Type' => 'application/json'
      ]
    ] );
    $status = $response->getStatusCode();
    $body = json_decode( $response->getBody()->getContents() )->result;

    /** Get all products **/
    $subCategoriesResponse = $client->request('GET', env('NODE_PARSE').'/api/v1/products', [
      'headers' => [
        'x-boardwalk-key' => env('X_BOARDWALK_KEY'),
        'Content-Type' => 'application/json'
      ]
    ] );
    $subCategoriesBody = json_decode( $subCategoriesResponse->getBody()->getContents() )->result;

    View::share('productsManagementActive', true);
    return view('products-edit',[ 'category' => $body,'products' => $subCategoriesBody ]);
  }

  public function delete ( $id ) {
    $client = new HttpClient();
    $session = session()->all();
    $response = $client->request('DELETE', env('NODE_PARSE').'/api/v1/products/'.$id, [
      'headers' => [
        'x-boardwalk-key' => env('X_BOARDWALK_KEY'),
        'Content-Type' => 'application/json',
        'x-boardwalk-session-token' => $session['token']
      ]
    ] );
    $status = $response->getStatusCode();
    $successDelete = json_decode( $response->getBody()->getContents() )->result;
    return redirect()->route('show-products');
  }

  public function showCreate ( Request $request ) {
    $input = $request->all();
    $client = new HttpClient();

    /** Get all products **/
    $subCategoriesResponse = $client->request('GET', env('NODE_PARSE').'/api/v1/categories', [
      'headers' => [
        'x-boardwalk-key' => env('X_BOARDWALK_KEY'),
        'Content-Type' => 'application/json'
      ]
    ] );
    $subCategoriesBody = json_decode( $subCategoriesResponse->getBody()->getContents() )->result;
    View::share('productsManagementActive', true);
    return view('products-create',[ 'products' => $subCategoriesBody ]);
  }

  public function create ( Request $request ) {
    $input = $request->all();
    $client = new HttpClient();
    $session = session()->all();
    $response = $client->request('POST', env('NODE_PARSE').'/api/v1/products', [
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
    return redirect()->action( 'Categories@edit', ['id' => $body->objectId]);
  }

  public function getProducts()
  {
    $client = new HttpClient();
    $response = $client->request('GET', env('NODE_PARSE').'/api/v1/products', [
      'headers' => [
        'x-boardwalk-key' => env('X_BOARDWALK_KEY'),
        'Content-Type' => 'application/json'
      ]
    ] );
    $status = $response->getStatusCode();
    $body = json_decode( $response->getBody()->getContents() )->result;

    return response()->json(['products' => $body]);
  }

  public function getCategories() {
    // ?where={"parent_category":{"__type": "Pointer", "className" : "Category", "objectId" : null}}
    $client = new HttpClient();
    $response = $client->request('GET', env('NODE_PARSE').'/api/v1/categories', [
      'headers' => [
        'x-boardwalk-key' => env('X_BOARDWALK_KEY'),
        'Content-Type' => 'application/json'
      ]
    ] );
    $status = $response->getStatusCode();
    $body = json_decode( $response->getBody()->getContents() )->result;
    return response()->json(['categories' => $body]);
  }

  public function getCategoriesByParent( Request $request ) {
      $input    = $request->all();
      $client = new HttpClient();
      $response = $client->request('GET', env('NODE_PARSE').'/api/v1/categories?where={"parent_category":{"__type": "Pointer", "className" : "Category", "objectId" : "'.$input['category_id'].'"}}', [
        'headers' => [
          'x-boardwalk-key' => env('X_BOARDWALK_KEY'),
          'Content-Type' => 'application/json'
        ]
      ] );
      $status = $response->getStatusCode();
      $body = json_decode( $response->getBody()->getContents() )->result;
      return response()->json(['categories' => $body]);
  }

  public function getProductsByCategory( Request $request ) {
    $input    = $request->all();
    $client   = new HttpClient();
    $response = $client->request('GET', env('NODE_PARSE').'/api/v1/categories?where={"$relatedTo":{"object":{"__type":"Pointer","className":"Category","objectId":"'.$input['category_id'].'"},"key":"products"}}', [
      'headers' => [
        'x-boardwalk-key' => env('X_BOARDWALK_KEY'),
        'Content-Type' => 'application/json'
      ]
    ] );

    $status = $response->getStatusCode();
    $body = json_decode( $response->getBody()->getContents() )->result;
    return response()->json(['products' => $body]);
  }
}
