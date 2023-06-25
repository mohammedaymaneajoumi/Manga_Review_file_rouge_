<?php
include "connectDB.php";
$error_login = "";
$error_signup = ""; 

if(isset($_POST["Sign_up"])){
    $Email = $_POST["Email_address"] ;
    $Name = $_POST["Your_Name"] ;
    $Password = $_POST["Your_Password"] ;

    $secure_password = password_hash($Password, PASSWORD_DEFAULT);

    $add_query_signup = "INSERT INTO `utilisateur` (`email_utilisateur`,`nom_utilisateur`,`pswd_utilisateur`) VALUES ('$Email','$Name','$secure_password')";
    $result_signup = mysqli_query($connection, $add_query_signup);
    if ($result_signup){
        header('Location: login.php'); 
        exit();

    } else {
        $error_signup = "all field required"; 
    }
    }

    if(isset($_POST['Login_in'])){
        $Email = $_POST["Email_address"] ;
        $Password = $_POST["Your_Password"] ;

        $add_query_login = "SELECT * FROM `utilisateur` WHERE email_utilisateur = '$Email'";
        $result_login = mysqli_query($connection, $add_query_login);

        if ($result_login && mysqli_num_rows($result_login) > 0) {
        $user = mysqli_fetch_assoc($result_login);

        $Password_user = $user['pswd_utilisateur'];
        if(password_verify($Password,$Password_user)){

            session_start();

            $_SESSION['name'] = $user['nom_utilisateur'];
            $_SESSION['picture'] = $user['image_utilisateur'];
            $_SESSION['id_utilisateur'] = $user['id_utilisateur'];

            header('Location: ./index.php'); 
        exit();

        } else {
            $error_login = "incorrect email or password"; 

            header('Location: ./login.php?msg='.$error_login); 
        }
        }
        else{
            $error_login = "account not found"; 
            header('Location: ./login.php?msg='.$error_login); 

        }
    }
?>
<?php
    if(isset($_POST['logout'])){
        session_start();

        $_SESSION = array();

        session_destroy();

            header("Location: ./login.php");
            exit();
    }

?>
