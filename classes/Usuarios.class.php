<?php

class Usuarios {
	protected $table = 'usuarios';
	public function insere($nome,$email){
		$sql  = "INSERT INTO $this->table (nome, email) VALUES (:nome, :email)";
		$stmt = DB::prepara($sql);
		$stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
		$stmt->bindParam(':email', $email, PDO::PARAM_STR);
		return $stmt->execute(); 
	}
	public function atualiza($nome,$email,$id){
		$sql  = "UPDATE $this->table SET nome = :nome, email = :email WHERE id = :id";
		$stmt = DB::prepara($sql);
		$stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
		$stmt->bindParam(':email', $email, PDO::PARAM_STR);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		return $stmt->execute();
	}
	public function detalhe($id){
		$sql = "SELECT * FROM $this->table WHERE id = :id";
		$stmt = DB::prepara($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
	}

	public function lista(){
		$sql  = "SELECT * FROM $this->table";
		$stmt = DB::prepara($sql);
		$stmt->execute();
		return $stmt->fetchAll();
	}



	public function exclui($id){
		$sql  = "DELETE FROM $this->table WHERE id = :id";
		$stmt = DB::prepara($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		return $stmt->execute(); 
	}
}
