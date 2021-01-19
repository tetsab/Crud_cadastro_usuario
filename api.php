<?php

$conn = new mysqli("localhost", "root", "", "crud");
 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$out = array('error' => false);

$crud = 'read';

if(isset($_GET['crud'])){
	$crud = $_GET['crud'];
}


if($crud == 'read'){
	$sql = "select * from registrations";
	$query = $conn->query($sql);
	$registrations = array();

	while($row = $query->fetch_array()){
		array_push($registrations, $row);
	}

	$out['registrations'] = $registrations;
}
	
if($crud == 'create'){

  $firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$optional = $_POST['optional'];	
	$notes = $_POST['notes'];

	if(!empty($firstname) && !empty($lastname) && !empty($email) && !empty($address)){
		$sql = "insert into registrations (firstname, lastname, email, address, optional, notes) values ('$firstname', '$lastname', '$email', '$address', '$optional', '$notes')";
	}
	
	$query = $conn->query($sql);
	
	if($query){
		$out['message'] = "Usuário adicionado com sucesso";
		// echo "Usuário adicionado com sucesso";
	} else {
		$out['message'] = "Erro ao cadastrar usuário";
		$out['error'] = true;
		// echo "Erro ao cadastrar usuário";
	}	
}

if($crud == 'update'){

	$userid = $_POST['userid'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$optional = $_POST['optional'];
	$notes = $_POST['notes'];

	$sql = "update registrations set firstname='$firstname', lastname='$lastname', email='$email', address='$address' , optional='$optional', notes='$notes' where userid='$userid'";
	$query = $conn->query($sql);

	if($query){
		$out['message'] = "Usuário editado com sucesso";
	}
	else{
		$out['error'] = true;
		// $out['message'] = "Erro ao editar usuário";
	}
	
}

if($crud == 'delete'){

	$userid = $_POST['userid'];

	$sql = "delete from registrations where userid='$userid'";
	$query = $conn->query($sql);

if($query){
		$out['message'] = "Usuário deletado com sucesso";
	} else {
		$out['error'] = true;
		$out['message'] = "Erro ao deletar o usuário";
	}	
}

$conn->close();

header("Content-type: application/json");
echo json_encode($out);
die();


?>