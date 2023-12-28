<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Redis;

use Config;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get ('/info', function () {
    return phpinfo ();
});

Route::view ("/ver", "ver");

Route::get ("/redis/keys", function () {
    // return Redis::command ("keys", ["*"]);
    $registros = array ();
    $prefixo = Config::get ("database.redis.options.prefix");
    foreach (Redis::command ("keys", ["*"]) as $key) {
        array_push ($registros, str_replace ($prefixo, "", $key));
    }
    return view ("redis_listar", ["registros" => $registros]);
});

Route::get ("/redis/get/{key}", function (string $key) {
    return "Valor da chave $key: " . Redis::get ($key);
});

Route::get ("/redis/set/{key}/{value}", function (string $key, string $value) {
    Redis::set ($key, $value);
    return "Definida chave $key com valor $value";
});

Route::fallback (function () {
    return "Função ainda não implementada";
});

