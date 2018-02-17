<?php

class notasentregaController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
       
		
	}

    


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$notasentrega = new Notasentrega;
		return View::make('user/notasentrega/form')->with('notasentrega', $notasentrega);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		 // Creamos un nuevo objeto para nuestro nuevo usuario
        $notasentrega = new Notasentrega;
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        //$array2 = $data["User"];
        //$array3 = $data["paciente"];
        
    
        // Revisamos si la data es válido
        if ($notasentrega->isValid($data))
        {
            // Si la data es valida se la asignamos al usuario
            $notasentrega->fill($data);
           /* $cita->User=$array2;
            $cita->paciente=$array3;
            $cita->numero_expediente_paciente=$data["numero_expediente_paciente"];
            $cita->razon_cita=$data["razon_cita"];
            $cita->fecha_cita=$data["fecha_cita"];*/
            
            // Guardamos el usuario
            $notasentrega->save();
            // Y Devolvemos una redirección a la acción show para mostrar el usuario
            //return Redirect::route('user.citas.show', array($cita->id));
            return View::make('hello');
        }
        else
        {
            // En caso de error regresa a la acción create con los datos y los errores encontrados
        return Redirect::route('user.notasentrega.create')->withInput()->withErrors($notasentrega->errors);
        }
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$notasentrega = Notasentrega::find($id);
        
        if (is_null($notasentrega)) App::abort(404);
        
      return View::make('user/notasentrega/show', array('notasentrega' => $notasentrega));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$notasentrega = Notasentrega::find($id);
        if (is_null ($notasentrega))
        {
            App::abort(404);
        }
        
        $form_data = array('route' => array('user.notasentrega.update', $notasentrega->id), 'method' => 'PATCH');
        $action    = 'Editar';
        
        return View::make('user/notasentrega/form', compact('notasentrega', 'form_data', 'action'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// Creamos un nuevo objeto para nuestro nuevo usuario
        $notasentrega = notasentrega::find($id);
        
        // Si el usuario no existe entonces lanzamos un error 404 :(
        if (is_null ($notasentrega))
        {
            App::abort(404);
        }
        
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        
        // Revisamos si la data es válido
        if ($notasentrega->isValid($data))
        {
            // Si la data es valida se la asignamos al usuario
            $notasentrega->fill($data);
            // Guardamos el usuario
            $notasentrega->save();
            // Y Devolvemos una redirección a la acción show para mostrar el usuario
            //return Redirect::route('user.notasentrega.show', array($notasentrega->id));
            return View::make('hello');
        }
        else
        {
            // En caso de error regresa a la acción edit con los datos y los errores encontrados
            return Redirect::route('user.notasentrega.edit', $notasentrega->id)->withInput()->withErrors($notasentrega->errors);
        }
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		
        $notasentrega = Notasentrega::find($id);
        
        if (is_null ($notasentrega))
        {
            App::abort(404);
        }
        
        $notasentrega->delete();

        if (Request::ajax())
        {
            return Response::json(array (
                'success' => true,
                'msg'     => 'notasentrega' . $notasentrega->id . ' eliminado',
                'id'      => $notasentrega->id
            ));
        }
        else
        {
            return Redirect::to('/');
        }/*
        $cita = Cita::find($id);
        $cita->estado='3';
        $cita->save();
        return Redirect::route('/');*/
	}
	


}
