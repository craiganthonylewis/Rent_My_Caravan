<!-- Coded by Ezme Clark ST 20261632 ans Yurii Filin ST20302767-->
<!-- Database login connection-->

<?php 
require_once "database_connection.php";

// prevent user from accessing this page if already
// logged in. Also starts session
require_once "user_session.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get values from form
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST["conf_passwd"]);
    $password_hash = password_hash($password, PASSWORD_BCRYPT);

    // Prepare query to check email
    $query = $conn->prepare("SELECT * FROM users WHERE email = ?");

    // Bind parameters (s = string, i = int, b = blob, etc)
	$query->bind_param('s', $email);
	$query->execute();
    echo'  checking email  ';

	// Store the result so we can check if the account exists in the database.
	$query->store_result();

        if ($query->num_rows > 0) {
            //If the input email adress already exists
            //in the database, redirect to login
            echo'email found already';
            header('Location: login.php');
            die();
        }else{
            
            if (empty($error) ) {
                echo '  adding to db  ';

                $insertQuery = $conn->prepare("INSERT INTO users ( username, password, email) VALUES (?, ?, ?);");
                $insertQuery->bind_param("ssss", $username, $password, $email);
                
                var_dump($username, $password, $email, $pfp_url);//check values 


                $result = $insertQuery->execute();
                if ($result) {
                    echo'  everything went well  ';
                    // create session cookie with user id
                    $getIdQuery = $conn->prepare("SELECT user_id FROM users WHERE email = ?;");
                    $getIdQuery->bind_param("s", $email);
                    $getIdQuery->execute();

                    $getIdQuery->store_result();
                    $getIdQuery->bind_result($id);
                    $getIdQuery->fetch();

                    $_SESSION["user_id"] = $id;
                    $_SESSION["username"] = $username;

                    // Redirect to front page
                    header('location: index.php');
                } else {
                    echo '  something went wrong  ';
                    // Refresh page if error
                    header ('location: signup.php');
                }
            }
        }
        
    
    $query->close();
    $insertQuery->close();
}



?>