<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Nos mostrará el formulario de login.
Route::get('login', 'AuthController@showLogin');

// Validamos los datos de inicio de sesión.
Route::post('login', 'AuthController@postLogin');

// Nos indica que las rutas que están dentro de él sólo serán mostradas si antes el usuario se ha autenticado.
Route::group(array('before' => 'Auth'), function()
{
    // Esta será nuestra ruta de bienvenida.
    Route::get('/', function()
    {
        return View::make('hello');
    });
    // Esta ruta nos servirá para cerrar sesión.
    Route::get('logout', 'AuthController@logOut');
});




/********************************************************************************** */


 Route::get('/pantalla1', function()
    {
        return View::make('pantalla1');
    });
 Route::get('/pantalla2', function()
    {
        return View::make('pantalla2');
    });

/*Route::get('/', function()
{
	return View::make('indexu');
});*/

Route::post('/upload', function(){
     if(Input::hasFile('foto')) {
          Input::file('foto')
               ->move('/assets','NuevoNombre.png');
     }
     return Redirect::back('/');
});

Route::resource('admin/users', 'Admin_UsersController');


Route::resource('admin/citas', 'Admin_CitasController');


Route::resource('admin/paciente', 'Admin_pacienteController');

Route::resource('admin/pdf', 'Admin_pdfController');

Route::resource('user/users', 'user_UsersController');

Route::resource('user/citas', 'user_citasController');

Route::resource('user/pdf', 'user_pdfController');
Route::resource('user/notasentrega', 'notasentregaController');
Route::resource('notasentrega', 'notasentregaController');
//Route::get('user/historiapaciente/create/{id}');

Route::resource('user/paciente', 'user_pacienteController');

Route::resource('user/calendario', 'user_calendarioController');

//Route::get('user/historiapaciente/create/{id}', function()  {
//    return App::make('user_historiapacienteController')->create($id);
//}); 

//Route::get('user/citas/create/{id}');

/*Route::get('admin/userespecialidad/show/{userespecialidad}', function($id)
{
    $userespecialidad = Userespecialidad::find($id);
    return View::make('show_users', compact('userespecialidad'));
});*/

Route::get('search', 'HomeController@searchUsers');

Route::get('usernames', 'HomeController@getUsernames');


Route::get('/notasentrega-csv', function(){

    $table = Notasentrega::all();
    $filename = "notasentrega.csv";
    $handle = fopen($filename, 'w+');
    fputcsv($handle, array('cliente','datos_pedido','fecha_pedidos','hora','cantidad','folio','trabajo'));

    foreach($table as $row) {
        fputcsv($handle, array($row['cliente'], $row['datos_pedido'],$row['fecha_pedidos'],$row['hora'],$row['cantidad'],$row['folio'],$row['trabajo']));
    }

    fclose($handle);

    $headers = array(
        'Content-Type' => 'text/csv',
    );

    return Response::download($filename, 'notasentrega.csv', $headers);
});