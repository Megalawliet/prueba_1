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

//Route::get('/', function () {
    /* Enllocs de una vista com aquí a baix: */
    //return view('welcome');
//});

/*Creem una ruta de home*/
Route::get('/', function () {
    /* Retorna una cadena que posará HOME al mig de la pàgina web */
    return 'Home';
});

/*Posa una ruta que després del home de a dalt, posarem una ruta de usuaris*/
Route::get('/usuarios', function(){
//Retornarà una cadena que posare usuaris al mig de la pagina
    return 'Usuarios';
});

//Usuario/nuevo no coincideix (!=) amb usuarios/[0-9]
/* Treballem amb una ruta obtenint una id, pero fent-ho més net i polit */
//retorna el numero que li posem a la url, el retorna a la pàgina
Route::get('/usuarios/{id}', function($id) {
    return "Mostrando detalle del usuario: {$id}";
})->where('id', '[0-9]+');

/* Li creem una ruta per a que cree un usuari (al pas anterior, s'a fet abans,
pero no sols la ruta, l'apuntat de la ruta s'ha fet després d'este pas actual. ) */
Route::get('/usuarios/nuevo', function() {
    return 'Crear nuevo usuario';
});

//Creem una ruta que pugui passar mes d'una cadena
//la següent ruta de sota està fet a amb condicionals en plan: tens 
//lo nom si, pos ok; tens lo nick, pos ok també. tens nom pero no tens
//lo nickname, pos mal!
/*Route::get('/saludo/{name}/{nickname}', function($name, $nickname) {
    return "Bienvenido {$name}, tu apodo es {$nickname}";
});*/
//lo interrogant vol dir que pot estar o no
Route::get('/saludo/{name}/{nickname?}', function($name, $nickname = null) {

    if($nickname) {
        return "Bienvenido {$name}, tu apodo es {$nickname}";
    } else {
        return "Bienvenido {$name}, no tienes apodo";
    }

});