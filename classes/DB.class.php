<?php
class DB{
	private static $instancia;
	public static function getInstancia(){
		if (!isset (self::$instance)){
			try{
				self::$instancia = new PDO('mysql:host=apoloagencia.com.br; dbname=apolo_testes', 'apolo_testes', 'teste1q2w3e*');
				self::$instancia->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				self::$instancia->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
			}
			catch (PDOException $erro){
				echo $erro->getMessage();
			}
		}
		return self::$instancia;
	}
	public static function prepara($sql){
		return self::getInstancia()->prepare($sql);
	}
}
