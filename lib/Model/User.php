<?php

namespace MyApp\Model;

class User extends \MyApp\Model {
	private $id;
	private $email;
	private $name;
	private $created;

	public function setName($name){
		$this->name = $name;
	}

	public function setEmail($email){
		$this->email = $email;
	}


	public function create($values) {
		$stmt = $this->db->prepare ( "insert into users (email, password, created, modified) values (:email, :password, now(), now())" );
		$res = $stmt->execute ( [
				':email' => $values ['email'],
				':password' => password_hash ( $values ['password'], PASSWORD_DEFAULT )
		] );
		if ($res === false) {
			throw new \MyApp\Exception\DuplicateEmail ();
		}
	}
	public function login($values) {
		$stmt = $this->db->prepare ( "select * from users where email = :email" );
		$stmt->execute ( [
				':email' => $values ['email']
		] );
		$stmt->setFetchMode ( \PDO::FETCH_CLASS, 'stdClass' );
		$user = $stmt->fetch ();

		if (empty ( $user )) {
			throw new \MyApp\Exception\UnmatchEmailOrPassword ();
		}

		if (! password_verify ( $values ['password'], $user->password )) {
			throw new \MyApp\Exception\UnmatchEmailOrPassword ();
		}
		return $user;
	}
	public function findAll() {
		$stmt = $this->db->query ( "select * from users order by id" );
		$stmt->setFetchMode ( \PDO::FETCH_CLASS, 'stdClass' );
		return $stmt->fetchAll ();
	}
	public function change($user) {
//		$stmt = $this->db->prepare ( "UPDATE users SET name = :name WHERE id = :id" );
		$stmt = $this->db->prepare ( "UPDATE users SET name = :name, email = :email WHERE id = :id" );
		var_dump($user);
		$res = $stmt->execute ( [
				':name' => $user->name,
				':email' => $user->email,
				':id' => $user->id
		] );
		if ($res === false) {
			throw new \MyApp\Exception\DuplicateEmail ();
		}
		return $res;
	}
}