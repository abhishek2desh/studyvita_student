<?php
require_once 'UserTools.class.php';
require_once 'DB.class.php';


class User {

	public $edutech_student_id;
	public $id;
	public $name;
	public $hashedPassword;
	public $standard;
	public $email;
	public $group_id;
	public $batch_id;
	public $username;
	//public $joinDate;
	

	//Constructor is called whenever a new object is created.
	//Takes an associative array with the DB row as an argument.
	function __construct($data) {
		$this->edutech_student_id = (isset($data['edutech_student_id'])) ? $data['edutech_student_id'] : "";
		$this->id = (isset($data['id'])) ? $data['id'] : "";
		$this->name = (isset($data['name'])) ? $data['name'] : "";
		$this->hashedPassword = (isset($data['password'])) ? $data['password'] : "";
		$this->standard = (isset($data['standard'])) ? $data['standard'] : "";
		$this->email = (isset($data['email'])) ? $data['email'] : "";
		$this->group_id = (isset($data['group_id'])) ? $data['group_id'] : "";
		$this->batch_id = (isset($data['batch_id'])) ? $data['batch_id'] : "";
		$this->batch_id = (isset($data['username'])) ? $data['username'] : "";
		//$this->joinDate = (isset($data['join_date'])) ? $data['join_date'] : "";
	}

	public function save($isNewUser = false) {
		//create a new database object.
		$db = new DB();
		
		//if the user is already registered and we're
		//just updating their info.
		if(!$isNewUser) {
			//set the data array
			$data = array(
				"name" => "'$this->name'",
				"password" => "'$this->hashedPassword'",
				"email" => "'$this->email'"
			);
			
			//update the row in the database
			$db->update($data, 'student', 'id = '.$this->id);
		}else {
		//if the user is being registered for the first time.
			$data = array(
				"name" => "'$this->name'",
				"password" => "'$this->hashedPassword'",
				"email" => "'$this->email'"
//				"join_date" => "'".date("Y-m-d H:i:s",time())."'"
			);
			
			$this->id = $db->insert($data, 'student');
			//$this->joinDate = time();
		}
		return true;
	}
}

?>