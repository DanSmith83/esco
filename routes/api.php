<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/handle-webhook/product-created', function(\Illuminate\Contracts\Events\Dispatcher $eventDispatcher, Request $request) {
    $eventDispatcher->dispatch(new \App\Events\ProductsWereAdded([$request->all()]));

    return response(null, 204);
});
