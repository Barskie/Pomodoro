<?php
	include 'database.php';
	$first_name = $_POST['first_name'];
	$last_name  = $_POST['last_name'];
    $user_name  = $_POST['user_name'];
    $password   = hash('ripemd160', $_POST['password']);
    $email      = $_POST['email'];
// need to change id (eto ung nasa post)
$json_return = array();
$json_return['status'] = false;
$to_insert = array(
		"Fname" => $first_name,
		"Lname" => $last_name,
		"user_name" => $user_name,
		"password" => $password,
		"email" => $email 
);
$result = $db->users->findOne(array("email" => $email));

if($result){
	$json_return['message'] = 'Email already used by another user'; 
}
else{
	if($db->users->insertOne($to_insert)){
		$json_return['message'] = 'Register success';
		$json_return['status'] = true;
	}else{
		$json_return['message'] = 'internal error';
	}
}

echo json_encode($json_return);
	
	
	// $sql = "SELECT * FROM user_info WHERE user_email = '$email' OR user_uname = '$user_name'";
	// $result = $conn->query($sql);
	// if ($result->num_rows > 0) {
	// 	echo json_encode(array("status"=>false));
	// }
	// else
	// {
    //     //change column names 
    // 	$sql = "INSERT INTO user_info (user_fname,user_lname,user_uname,user_email,user_password) 
	// 	VALUES 
    // 	('$first_name','$last_name','$user_name','$email','$password')";
	// 	if (mysqli_query($conn, $sql)) {
	// 		echo json_encode(array("status"=>true));
	// 	} 
	// 	else 
	// 	{
	// 		echo json_encode(array("status"=>false));
	// 	}
	// }
	// mysqli_close($conn);	

	/*$response = array{
		'status' => 0,
		'message'=>'Registration Failed'
	};
	$errorEmail = false;
	$errorEmpty = false;

	if(isset($_POST['first_name'])||isset($_POST['last_name'])||isset($_POST['user_name'])
	||isset($_POST['password'])||isset($_POST['email'])){
		 
		if(!empty($first_name) && !empty($last_name) && !empty($user_name) &&
		 !empty($password) && !empty($email)){
			
		}
	}
	else{
		$response['message'] = "Form is incomplete!"
		$errorEmpty = true;
	}*/

?>

