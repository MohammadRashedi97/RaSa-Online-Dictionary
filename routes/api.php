<?php

use Illuminate\Http\Request;
use App\Word;
use function GuzzleHttp\json_decode;

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

Route::get('/words', function () {
    $words = Word::all();
    return response()->json($words);
});

Route::post('/words', function (Request $request) {
    $data = $request['data'];
    Word::insert($data);

    return response()->json([
        'message' => 'Great success! New word created',
    ]);
});
