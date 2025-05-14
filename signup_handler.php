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
    $password_hash = md5($password);
    // check passwords match
    if ($password == $confirm_password){
        // check if password matches requirements
        // (minimum 8 characters with one upper/ lower case and one number)
        if (strlen($password) < 8 || !preg_match('/[A-Z]/', $password) || !preg_match('/[a-z]/', $password) || !preg_match('/[0-9]/', $password)) {
            header('Location: signup.php?error=wrong_password');
            exit();
        }

        // Prepare query to check email
        $query = $conn->prepare("SELECT * FROM users WHERE email = ?");

        // bind parameters (s = string, i = int, b = blob, etc)
        $query->bind_param('s', $email);
        $query->execute();
        echo'  checking email  ';

        // Store the result so we can check if the account exists in the database.
        $query->store_result();

            if ($query->num_rows > 0) {
                //If the input email adress already exists
                //in the database, redirect to login
                header('Location: login.php');
                exit();
            }else{
                
                if (empty($error) ) {
                    $insertQuery = $conn->prepare("INSERT INTO users ( username, password, email, pfp_url) VALUES (?, ?, ?, ?);");
                    $pfp_url = 'default_pfp.jpg'; 
                    $insertQuery->bind_param("ssss", $username, $password_hash, $email, $pfp_url);
                    $result = $insertQuery->execute();
                    if ($result) {
                        echo'  everything went well  ';
                        // create session cookie with user id
                        $getIdQuery = $conn->prepare("SELECT user_ID FROM users WHERE email = ?;");
                        $getIdQuery->bind_param("s", $email);
                        $getIdQuery->execute();

                        $getIdQuery->store_result();
                        $getIdQuery->bind_result($id);
                        $getIdQuery->fetch();

                        $_SESSION["user_id"] = $id;
                        $_SESSION["username"] = $username;

                        // Redirect to front page
                        header('location: index.php');
                        exit();
                    } else {
                        // Refresh page if error
                        header ('location: signup.php');
                        exit();
                    }
                }
            }
        $query->close();
        $insertQuery->close(); 
    } else {
        header ('location: signup.php?error=mismatched_passwords' );
        exit();
    }
    
}



?>