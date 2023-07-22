<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Card API Routes
|--------------------------------------------------------------------------
|
| Here is where you may register API routes for your card. These routes
| are loaded by the ServiceProvider of your card. You're free to add
| as many additional routes to this file as your card may require.
|
*/

Route::get('/steps', function (Request $request) {

    return response()->json([
        [
            'selector' => '[href="/dashboards/main"]',
            'title' => '¡Bienvenido a Findex Nova!',
            'description' => 'Te daremos un recorrido por nuestra App',
        ],
        [
            'selector' => '[href="/resources/users/6"]',
            'title' => 'Te presentamos al usuario "User Five"',
            'description' => 'Su correo electrónico es "userfive@findex.la" y su ID es #6',
        ],
        [
            'selector' => '[dusk="6-view-button"]',
            'title' => 'Ver detalle',
            'description' => 'Puede ver el detalle de la información del usuario',
        ],
        [
            'selector' => '[dusk="6-edit-button"]',
            'title' => 'Editar',
            'description' => 'Puede actualizar la información del usuario',
        ],
        [
            'selector' => '[dusk="6-delete-button"]',
            'title' => 'Eiminar',
            'description' => 'Es posible eliminar permanentemente la información del usuario',
        ],
        [
            'selector' => '[href="/resources/users/new"]',
            'title' => 'Puede crear un nuevo usuario al hacer clic en este botón',
            'description' => 'Finalizamos el recorrido, gracias',
        ],
    ]);
});
