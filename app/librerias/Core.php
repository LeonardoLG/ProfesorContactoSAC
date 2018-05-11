<?php

	/*
	mapear la url en el navegador,
	1. el controlador
	2. el metodo
	3. Parametro (aqui es cuando llama al id)
	Ejemplo ://articulos/actualizar/4
	 */
	class Core{
		protected $controladorActual = 'paginas';
		protected $metodoActual = 'index';
		protected $parametros =[];

		public function __construct(){

			//print_r($this->getUrl());
			$url =$this->getUrl();

			//buscar controldaroes si el controlador existe

			if (file_exists('../app/controladores/' .ucwords($url[0]).'.php')) {
			
			//si existe se setea como controlador por defecto
			$this->controladorActual = ucwords($url[0]);

			//unset indice
			unset($url[0]);
			}

			/*
			0= controlador
			1=metodo
			2=parametro

			 */

			//requerir el controlador
			require_once '../app/controladores/' . $this->controladorActual . '.php';
			$this->controladorActual = new $this->controladorActual;

			//verificar la segunda parte de la url , que seria el metodo
			if (isset($url[1])) {
				if (method_exists($this->controladorActual , $url[1])) {
				//si se cargo chequeamos el metodo ya no 0 sino 1
				$this->metodoActual = $url[1];
				//unset indice
				unset($url[1]);
			}

			}

			//para probar traer metodo 
			//echo $this->metodoActual;
			
			/*
			obtener los parametros
			 */
			$this->parametros = $url ? array_values($url) :[];

			/*
			llamar callbax con parametros array
			 */
			call_user_func_array([$this->controladorActual , $this->metodoActual],$this->parametros);

		}

		public function getUrl(){
			//echo $_GET['url'];

			if (isset($_GET['url'])) {
				
				$url = rtrim($_GET['url'],'/');
				$url = filter_var($url ,FILTER_SANITIZE_URL);
				$url = explode('/', $url);
				return $url;

			}
		}
	}
	
	