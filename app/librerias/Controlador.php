<?php 
   /*
   clase controlador principal que se encarga de poder cargar los modelos y vistas que 
   carguemos en modelo y en vistas respectivamente
    */
   
   class Controlador{

      /**
       * carga el modelo y recibe como parametro al controlador
       * lo busca en al carpeta modelos y lo retorna
       */

   		public function modelo($modelo){
   			//carga
   			require_once '../app/modelos/' .$modelo. '.php';
   			//instanciar el modelo  
   			return new $modelo();
   		}

   		//cargar vista  
   		public function vista($vista ,$datos = []){

   			//chequear si el archivo existe
   			if (file_exists('../app/vistas/' . $vista . '.php')) {
   				require_once '../app/vistas/' . $vista . '.php';
   				
   			}else{
   				/*
   				si el archivo de la vista no existe
   				 */
   				die('la vista no existe');
   			}

   		}

   	}