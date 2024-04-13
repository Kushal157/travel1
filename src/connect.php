<?php
//Data required from user
    $Firstname = $_POST['Firstname'];
    $Lastname = $_POST['Lastname'];
    $Email = $_POST['Email'];
    $Password = password_hash($_POST["Password"], PASSWORD_DEFAULT);
    

    //Database connection
    $conn = new mysqli('localhost','root','','login');
    if($conn->connect_error){
		die('Connection failed : '.$conn->connect_error);
    }else {
		$stmt = $conn->prepare("insert into registration(Firstname, Lastname, Email, Password) values(?, ?, ?, ?)");
		$stmt->bind_param("ssss", $Firstname, $Lastname, $Email, $Password);
		$execval = $stmt->execute();
		echo $execval;
		//if clicked on register after filling the data
    echo '<script type="text/javascript">
    window.onload = function () {alert("Registration Successfull");}</script>';
    echo '<a href="login .html">click here</a>';
		$stmt->close();
		$conn->close();
  }
?>