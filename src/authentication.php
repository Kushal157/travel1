
<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usernameOrEmail = $_POST["username_or_email"];
    $password = $_POST["password"];
    // Retrieve user data from the database based on username or email
    // Compare the hashed password from the database with the provided password
    if ($validCredentials) {
        $_SESSION["user_id"] = $userId; // Store user ID in the session
        header("Location: dashboard.php"); // Redirect to the dashboard
        exit();
    } else {
        $error = "Invalid credentials. Please try again.";
    }
}
?>
<?php
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];

    //Database connection here
    $con = new mysqli('localhost','root','','login');
    if($con->connect_error){
		die('Connection failed : '.$con->connect_error);
    }else {
		$stmt = $con->prepare("select * from registration where Email =?");
        $stmt->bind_param("s",$Email);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if($stmt_result->num_rows > 0){
            $data = $stmt_result->fetch_assoc();
            if($data['Password'] === $Password){
                echo "<h1>Login successfull</h1>";
            }else{
                echo "<h1>invalid email or password</h1>";
            }
        }
    }
?>