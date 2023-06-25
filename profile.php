<?php
include "connectDB.php"; 
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8" />
    <meta name="description" content="manga reviw website and blog" />
    <meta name="keywords" content="Manga, Review, Trends, Forum, Rating" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Manga | Review | Trends | Forum</title>

    <link href="./img/user__profile/manga-14.jpg" rel="icon">
    <link href="./img/user__profile/manga-14.jpg" rel="apple-touch-icon">

    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" />

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://kit.fontawesome.com/1171a84c58.js" crossorigin="anonymous"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">


    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/plyr.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container">
            <div class="row">
            <div class="col-lg-2">
                <div class="header__logo">
                    <a href="./index.php">
                        mangalead
                    </a>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="header__nav">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li><a href="./index.php">Homepage</a></li>
                            <li><a href="./forum.php">Community <span class="arrow_carrot-down"></span></a>
                                <ul class="dropdown">
                                    <li><a href="./forum.php">Forum</a></li>
                                    <li><a href="https://discord.gg/XcD46ZfZ">Discord Dhat</a></li>
                                </ul>
                            </li>
                            <li><a href="./blog.php">Manga News</a></li>
                            <li><a href="#">Contacts</a></li>
                            
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-lg-2">
                    <div class="header__right">
                        <?php
                            if(isset($_SESSION['id_utilisateur'])){
                                $id_user_profile = $_SESSION['id_utilisateur'];
                                $query_user_profile = "SELECT * FROM `utilisateur` WHERE id_utilisateur = '$id_user_profile'";
                                $result_user_profile = mysqli_query($connection, $query_user_profile);

                                if(mysqli_num_rows($result_user_profile) > 0){
                                    $row_user_profile = mysqli_fetch_assoc($result_user_profile);
                                    $username = $row_user_profile['nom_utilisateur'];
                                    $user_profile = $row_user_profile['image_utilisateur'];
                                    $user_profileBase64 = base64_encode($user_profile);

                                    echo '
                                        <div class="">
                                            <a href="./profile.php"><span class="userimage"><img src="data:img/jpeg;base64,'.$user_profileBase64.'" alt=""></span></a>
                                        </div>
                                    ';
                                } else {
                                    echo '
                                        <div>
                                            <a href="./login.php">login</a>
                                            <a href="./signup.php">signup</a>
                                        </div>
                                    ';
                                }
                            } else {
                                echo '
                                    <div>
                                        <a href="./login.php">login</a>
                                        <a href="./signup.php">signup</a>
                                    </div>
                                ';
                            }
                        ?>
                        <!-- ???? -->
                    </div>
                </div>
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
    <!-- Header End -->
    <!-- Breadcrumb Begin -->
        <div class="breadcrumb-option">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb__links">
                            <a href="./Forum.php"><i class="fa fa-home"></i> home</a>
                            <span>profile</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- Breadcrumb End -->

    <!-- Blog Section Begin -->
    <section class="blog spad">
        <div class="container">
            <div class="row">
            
            
    <style>
        #login { display: none; }
        .login,
        .logout { 
            position: absolute; 
            top: -3px;
            right: 0;
        }
        .page-header { position: relative; }
        .reviews {
            color: #555;
            font-weight: bold;
            margin: 10px auto 20px;
        }
        .reviews{
            font-size:1.8rem;
        }
        .notes {
            color: #999;
            font-size: 12px;
        }
        .media .media-object { max-width: 120px; }
        .media-body
        .media-date { 
            margin-bottom:3px;
        }
        .media-object{
            width: 75px;
        }
        .media-date li { padding: 0; }
        .media-date li:first-child:before { content: ''; }
        .media-date li:before { 
            content: '.'; 
            margin-left: -2px; 
            margin-right: 2px;
        }
        .media-comment { margin-bottom: 20px; }
        .media-replied { margin: 0 0 20px 50px; }
        .media-replied .media-heading { padding-left: 6px; }

        .btn-circle {
            background-color: #e53637;
            color:white;
            font-size: 12px;
            padding: 6px 15px;
            border-radius: 20px;
        }
        .btn-circle :hover {
            color:#e53637;
        }
        .btn-circle span { padding-right: 6px; }
        .embed-responsive { margin-bottom: 20px; }
        .tab-content {
            padding: 50px 15px;
        }
        .custom-input-file {
            overflow: hidden;
            position: relative;
            width: 120px;
            height: 120px;
            background: #eee url('img/logo/240_F_434728286_OWQQvAFoXZLdGHlObozsolNeuSxhpr84.jpg');    
            background-size: 120px;
        }
        input[type="file"]{
            z-index: 999;
            line-height: 0;
            font-size: 0;
            position: absolute;
            opacity: 0;
            filter: alpha(opacity = 0);-ms-filter: "alpha(opacity=0)";
            margin: 0;
            padding:0;
            left:0;
        }
        .uploadPhoto {
            position: absolute;
            top: 25%;
            left: 25%;
            display: none;
            width: 50%;
            height: 50%;
            color: #fff;    
            text-align: center;
            line-height: 60px;
            text-transform: uppercase;    
            background-color: rgba(0,0,0,.3);
            cursor: pointer;
        }
        .custom-input-file:hover .uploadPhoto { display: block; }
        .well{
            background-color:#070720;
            border: 1px solid #7b7b7b;
            border-radius: 0px;
            padding:15px 0 27px 15px;
        }
        .btn-infos {
            font-size: 10px;
            color:white;
            background-color:#e53637;
            border:none;
            border-radius:3px;
            padding:9px;
        }
        .btn-info:hover {
            background-color:#e53637;
            color:white;
        }
        .media-comment{
            color:white;
            font-size: 15px;

        }
        .form-control {
            background-color: #1d1e39;
            color: white;
            border: none;
            font-size: 1.4rem;
            padding: 15px 15px 15px 8px;
        }
        .form-control:focus{
            background-color: #1d1e39;
        }
        .btn-sm, .btn-trans {
            font-size: small;
            color: #fff;
            background-color: #e53637;
        }
        .btn-icon {
        padding-left: 9px;
        padding-right: 9px;
        }
        .mar-top a{
            background-color: #070720;
            color:#7b7b7b;
        }
        label{
            font-size:1.4rem;
            color:#7b7b7b;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-sm-12" id="logout">
                <div class="page-header mt-0" style="border:none;">
                    <h4 class="reviews" style='font-size:3rem; color:white;'>welcome back <span style="color:#e53637;"><?php echo $username ?>,</span></h4>
                    <div class="logout">
                        <form action="./session.php" method="POST">
                            <button name="logout" class="btn btn-default btn-circle text-uppercase" type="submit" onclick="$('#logout').hide(); $('#login').show()">
                                <span class="glyphicon glyphicon-off"></span> Logout                    
                            </button>
                        </form>
                    </div>
                </div>
                <div class="comment-tabs">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="active tab_link"><a href="#comments-logout" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Discussions</h4></a></li>
                        <li class="tab_link"><a href="#account-settings" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Account settings</h4></a></li>
                    </ul>            
                    <div class="tab-content">
                    <div class="tab-pane active" id="comments-logout">                

                        <?php 
                        $id_utilisateur = $_SESSION['id_utilisateur'];
                        $sql_discussion_forum = "SELECT * 
                        FROM discussion d 
                        INNER JOIN utilisateur u ON d.id_utilisateur = u.id_utilisateur 
                        INNER JOIN manga m ON d.id_manga = m.id_manga 
                        WHERE d.id_utilisateur = '$id_utilisateur'";

                        $query=mysqli_query($connection,$sql_discussion_forum);

                        while($row=mysqli_fetch_assoc($query)){
                            $id_manga = $row["id_manga"];
                            ?>
                            <ul class="media-list">
                            <li class="media">
                                <a class="pull-left" href="#">
                                <img style="max-width: 110px; max-height: 111px;" src="data:img/jpeg;base64,<?php echo base64_encode($row["image_utilisateur"]); ?>" alt="profile">
                                </a>
                                <div class="media-body">
                                <div class="well well-lg">
                                    <h4 class="media-heading text-uppercase reviews m-0" style="color:#e53637;font-size: 1.5rem;"><?php echo $row["nom_utilisateur"];?> </h4>
                                    <ul class="media-date list-inline mt-2 pl-2" style="color:#7b7b7b; font-size:1.2rem;">
                                        <li><?php echo ($row["date_creation_discussion"]); ?></li>
                                    </ul>
                                    <p class="media-comment mt-3">
                                        <?php echo $row["subject_discussion"];?>
                                    </p>
                                    <div class="d-flex" style="justify-content: space-between;">
                                        <div>
                                            <a class="btn-infos mr-3" href="#" id="reply"><i class="fa-sharp fa-solid fa-comment"></i>
                                            <?php 
                                                $sql_commentaireNumber = "SELECT COUNT(*) FROM reply r INNER JOIN discussion d ON d.id_discussion = r.id_discussion WHERE d.id_manga = '$id_manga'";
                                                $query_commentaireNumber = mysqli_query($connection,$sql_commentaireNumber);
                                                $row_commentaireNumber = mysqli_fetch_assoc($query_commentaireNumber);
                                                $numberCommentaire = $row_commentaireNumber["COUNT(*)"];
                                                if(mysqli_num_rows($query_commentaireNumber)>0){
                                                    echo ' '.$numberCommentaire.' '.'Comment';
                                                }else{
                                                    echo ' '."0".' '.'Comment';
                                                }
                                            ?></a>
                                        </div>
                                        <div class="">
                                        <a class="btn-infos mr-5" href="#" id="reply"><i class="fa-sharp fa-solid fa-share-from-square"></i> share</a>
                                        </div>
                                    </div>
                                </div>              
                                </div>
                            </li>          
                            </ul> 
                            <?php
                        }
                        ?>
                        </div>
                        <?php 
                        if(isset($_POST["editerInformationUtilisateur"])){

                            $image_utilisateur=$_FILES["avatar"]["name"];
                            $tmp_name = $_FILES["avatar"]["tmp_name"];
                            $fichier = 'img/user__profile/'.$image_utilisateur;
                            move_uploaded_file($tmp_name,$fichier);

                            $name = $_POST["name"];
                            $email = $_POST["email"];
                            $password= $_POST["newPassword"];
                            $confirmPassword = $_POST["confirmPassword"];
                            $hashed_password = password_hash($password,PASSWORD_DEFAULT);

                            if(empty($image_utilisateur)){
                                if($password === $confirmPassword){
                                    $sql_edit_utilisateur = "UPDATE `utilisateur` SET `nom_utilisateur`='$name',`email_utilisateur`='$email',`pswd_utilisateur`='$hashed_password' WHERE  id_utilisateur = $id_utilisateur";
                                    $query_edit_utilisateur = mysqli_query($connection,$sql_edit_utilisateur);
                                }
                                //
                            }elseif(empty($image_utilisateur) && empty($password)){
                                $sql_edit_utilisateur = "UPDATE `utilisateur` SET `nom_utilisateur`='$name',`email_utilisateur`='$email' WHERE id_utilisateur = $id_utilisateur";
                                $query_edit_utilisateur = mysqli_query($connection,$sql_edit_utilisateur);
                            }else{
                                $sql_edit_utilisateur = "UPDATE `utilisateur` SET `nom_utilisateur`='$name',`email_utilisateur`='$email',`pswd_utilisateur`='$hashed_password',image_utilisateur = '$fichier' WHERE  id_utilisateur = $id_utilisateur";
                                $query_edit_utilisateur = mysqli_query($connection,$sql_edit_utilisateur);
                            }
                        }
                        ?>
                        <div class="tab-pane" id="account-settings">
                            <form action="#" method="post" class="form-horizontal" id="accountSetForm" role="form" style="margin-left:;" enctype="multipart/form-data">
                                <?php 
                                    $sql_information_user = "SELECT * FROM utilisateur WHERE id_utilisateur='$id_utilisateur'";
                                    $query_information_utilisateur = mysqli_query($connection,$sql_information_user);
                                    while($row_information_utilisateur=mysqli_fetch_assoc($query_information_utilisateur)){
                                        ?>
                                        <div class="form-group mb-5">
                                    <label for="avatar" class="col-sm-2 control-label">Avatar</label>
                                    <div class="col-sm-10">                                
                                        <div class="custom-input-file">
                                            <label class="uploadPhoto">
                                                Edit
                                                <input type="file" class="change-avatar" name="avatar" id="avatar">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-5">
                                    <label for="name" class="col-sm-2 control-label pt-1">Full Name</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" id="name" value="<?php echo $row_information_utilisateur["nom_utilisateur"];?>" placeholder="Vilma palma">
                                    </div>
                                </div>
                                <div class="form-group mb-5">
                                    <label for="email" class="col-sm-2 control-label pt-1">Email</label>
                                    <div class="col-sm-10">
                                    <input type="email" class="form-control" name="email" value="<?php echo $row_information_utilisateur["email_utilisateur"];?>" id="email" placeholder="vilma@mail.com">
                                    </div>
                                </div>  
                                <div class="form-group mb-5">
                                    <label for="newPassword" class="col-sm-2 control-label pt-1">New password</label>
                                    <div class="col-sm-10">
                                    <input type="password" class="form-control" name="newPassword" id="newPassword" placeholder="New password">
                                    </div>
                                </div> 
                                <div class="form-group mb-5">
                                    <label for="confirmPassword" class="col-sm-2 control-label pt-1">Confirm password</label>
                                    <div class="col-sm-10">
                                    <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="Confirm password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10 mt-2">                    
                                        <button class="btn-infos mr-3" type="submit" name="editerInformationUtilisateur" id="submit">Save changes</button>
                                    </div>
                                </div>           
                                        <?php
                                    }
                                ?>

                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                
            </div>
        </div>
    </section>
    <!-- Blog Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer">
        <div class="page-up">
            <a href="#" id="scrollToTopButton"><span class="arrow_carrot-up"></span></a>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer__logo">
                        <a href="./index.php">
                            mangalead
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 pt-2">
                    <div class="footer__nav">
                        <ul>
                        <li><a href="./index.php">Homepage</a></li>
                            <li class="active"><a href="./forum.php">Community</a></li>
                            <li><a href="./blog.php">Manga News</a></li>
                            <li><a href="#">Contacts</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <p>
                        &copy; Copyright MangaLead 
                    <script>
                        document.write(new Date().getFullYear());
                    </script>
                    All rights reserved
                    
                    </p>
                </div>
                </div>
            </div>
        </footer>
        <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/player.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <script>
        //z
        document.querySelectorAll('.tab_link').forEach(tab=>{
        tab.addEventListener('click',(e)=>{
            document.querySelector('.tab_link.active').classList.remove('active');
        })
        })
    </script>

</body>

</html>