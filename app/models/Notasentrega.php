<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Notasentrega extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'notasentrega';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('remember_token');
    
	public $errors;
    
    public function isValid($data)
    {
        $rules = array(
            'hora'  => 'required|min:7|max:10',
            'datos_pedido' => 'required|min:5|max:5000',
            'trabajo' => 'required|min:1|max:300',
            'fecha_pedidos' => 'required|min:7|max:15',
            'cliente' => 'required|min:1|max:300',
            'cantidad' => 'required|min:1|max:100',
            'folio' => 'required|min:1|max:300',
            //'fecha_pedido' => 'required|min:7|max:15',
            'pantalla' => 'required|min:1|max:40'
        );
         
        $validator = Validator::make($data, $rules);
        
        if ($validator->passes())
        {
            return true;
        }
        
        $this->errors = $validator->errors();
        
        return false;
    }
    protected $fillable = array('datos_pedido','fecha_pedidos','trabajo','pantalla','hora','fecha_pedido','cliente','cantidad','folio');
}
