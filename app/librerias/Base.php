<?php 

	/*
	clase para conectarse a una base de datos PDO
	 */
	class Base{
		private $host=DB_HOST;
		private $usuario = DB_USUARIO;
		private $password = DB_PASSWORD;
		private $nombre_base = DB_NOMBRE;

		private $dbh ;
		private $stmt ; // para consultas
		private $error;

		 public function __construct()
		{
			//configurar conexion
			$dsn = 'mysql:host =' . $this->host . ';dbname=' . $this-> nombre_base;
			$opciones = array (
				PDO::ATTR_PERSISTENT => true , 
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

			//crear una instancia de PDO
			try {

				$this->dbh = new PDO($dsn , $this->usuario ,$this->password ,$opciones);
				$this->dbh->exec('set names utf8');
				
			} catch (Exception $e) {
				
				$this->error = $e->getMessage();
				echo $this->error ;
			}
		}

		//recibiendo la consulta sql y la estamos preparando 

		public function query ($sql){
			$this->stmt = $this->dbh->prepare($sql);
		}

		//vamos a crear la funcion que la vincula
		public function bind($parametro , $valor , $tipo =null){
			if (is_null($tipo)) {

				switch (true) {
					case is_int($valor):
							$tipo = PDO::PARAM_INT;
						# code...
						break;
					case is_bool($valor):
							$tipo = PDO::PARAM_BOOL;
						# code...
						break;
					case is_null($valor):
							$tipo = PDO::PARAM_NULL;
						# code...
						break;
					
					default:
						$tipo = PDO::PARAM_STR;
						break;
				}
			}

			$this->stmt->bindValue($parametro,$valor,$tipo);
			//debemso crear la funcion apra ejecutar esa funcion
		}

		//ejecuta la consulta
		public function execute(){
			return $this->stmt->execute();
		}

		//Obtener los recursos
		public function registros(){
			$this->execute();
			return $this->stmt->fetchAll(PDO::FETCH_OBJ);
		}

		//Obtener un solo registro
		public function registro(){
			$this->execute();
			return $this->stmt->fetch(PDO::FETCH_OBJ);
		}

		//obtener cantidad de filas con el metodo rowCount
		
		public function rowCount(){
			return $this->stmt->rowCount();
		}

		
	}