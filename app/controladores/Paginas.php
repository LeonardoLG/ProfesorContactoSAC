
<?php

	class Paginas extends Controlador{
		public function __construct(){
			//echo 'Controlador paginas cargado';
			//aqui estamso instanciando al modelo usuario
			$this->usuarioModelo = $this->modelo('Usuario');
			
		}

		public function index(){

			/*
			obtener los usuarios
			 */
			
			$usuarios =$this->usuarioModelo->obtenerUsuarios();
			//$articulos = $this->articuloModelo->obtenerArticulos();//una vez obtenida
			// ya se esta cargando

			$datos = [
				'usuarios'=> $usuarios
				//'titulo' => 'Bienvenidos a MVC'
				////modelos en singular y los ontroladores el plural
				
			];

			$this->vista('paginas/inicio', $datos);
		}

		//creamos el metodo que nos permita agregar    
			
		public function agregar(){

			// validar y si hay se envia a datos , para luego ejecutarse agregar
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$datos=[

				'nombre'=>trim($_POST['nombre']),
				'email'=>trim($_POST['email']),
				'telefono'=>trim($_POST['telefono']),
			];

			//quiere decir que si este metodo esxitse en el modelo enotnces redireccionaremos a pagina
			if ($this->usuarioModelo->agregarUsuario($datos)) {
				
				redireccionar('/Paginas');

			}else{
				die('Algo salio mal');
			}
		}else{
			$datos = [
				'nombre'=>'',
				'email'=>'',
				'telefono'=>''

			];

			$this->vista('paginas/agregar', $datos);
		}
			
	}


	public function editar(){

			// validar y si hay se envia a datos , para luego ejecutarse agregar
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$datos=[


				'id_usuario' => $id,
				'nombre'=>trim($_POST['nombre']),
				'email'=>trim($_POST['email']),
				'telefono'=>trim($_POST['telefono']),
			];

			//quiere decir que si este metodo esxitse en el modelo enotnces redireccionaremos a pagina
			if ($this->usuarioModelo->actualizarUsuario($datos)) {
				
				redireccionar('/Paginas');

			}else{
				die('Algo salio mal');
			}
		}else{

			//obtener informacion de usuario desde el modelo
			
			$usuario = $this->usuarioModelo->obtenerUsuarioId($id);
			$datos = [

				'id_usuario' => $usuario->id_usuario,
				'nombre'=>$usuario->nombre,
				'email'=>$usuario->email,
				'telefono'=>$usuario->telefono

			];

			$this->vista('paginas/editar', $datos);
		}
			
	}


}