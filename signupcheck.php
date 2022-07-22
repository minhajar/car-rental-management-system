<?php
require 'DBconnexion.php';
require 'helpingFuncs_Data.php';

if (isset($_POST['userName']) && isset($_POST['password'])
    && isset($_POST['name']) && isset($_POST['re_password'])) {

	

	$userName = validate($_POST['userName']);
	$passwd = validate($_POST['password']);

	$re_pass = validate($_POST['re_password']);
	$actualName = validate($_POST['name']);
    
    //check empty fields and matching passwords
    /*
    if (empty($userName)) {
		header("Location:signupForm.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location:signupForm.php?error=Password is required");
	    exit();
	}
	else if(empty($re_pass)){
        header("Location:signupForm.php?error=Re Password is required");
	    exit();
	}

	else if(empty($actualName)){
        header("Location:signupForm.php?error=Name is required");
	    exit();
	}

	else if($pass !== $re_pass){
        header("Location:signupForm.php?error=The confirmation password  does not match");
	    exit();
	}
*/


	// password cypher
    $hashedPasswd = md5($passwd);
    //insertion in the database
    $request = "SELECT * FROM user WHERE userName='$userName' ";
    
    $result = mysqli_query($connect, $request);
    
    if (mysqli_num_rows($result) > 0) {
        header("Location:signupForm.php?error=The username is taken try another");
        exit();
    }else {
        $request2= "INSERT INTO user(actualName, userName, passwd) VALUES('$actualName','$userName', '$hashedPasswd')";
        echo $request2;
        $result2 = mysqli_query($connect, $request2);

        if ($result2) {
                
                header("Location:authentificationForm.php?success=Your account has been created successfully");
                
                exit();
        } else {
                
                header("Location:signupForm.php?error=unknown error occurred");
                exit();
        }

    }
	
    }else{
	header("Location:signupForm.php");
	exit();
}
mysqli_close($connect);

?>