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

    <!-- web icon -->
    <link href="./img/user__profile/manga-14.jpg" rel="icon">
    <link href="./img/user__profile/manga-14.jpg" rel="apple-touch-icon">

    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" />

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

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
                            <li class="active"><a href="./forum.php">Community <span class="arrow_carrot-down"></span></a>
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
                            <a href="./Forum.php"><i class="fa fa-home"></i> Community</a>
                            <span>Forum</span>
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
                
                <div class="col-lg-8 col-md-8 col-sm-8">
                    <div class="section-title">
                        <h4>racent Manga Discussion</h4>
                    </div>
                </div>

                <style>
                    .panel{border-radius: 0; border: 1px solid #7b7b7b; background-color:#070720;}
                    .widget .panel-body { padding:0px; }
                    .widget .list-group { margin-bottom: 0; }
                    .widget .panel-title { display:inline }
                    .widget .label-info { float: right; }
                    .widget li.list-group-item {border-radius: 0;border: 0;border-top: 1px solid #7b7b7b;}
                    .widget li.list-group-item:hover { background-color: rgba(86,61,124,.1); }
                    .widget .mic-info { color: #666666;font-size: 11px; }
                    .widget .action { margin-top:5px; }
                    .widget .comment-text { font-size: 12px; width: 75%;}
                    .widget .btn-block { border-top-left-radius:0px;border-top-right-radius:0px; }
                    .btn {background-color:#e53637; color:white;}
                    .panel-body:after {all: initial;}
                    .panel-default .panel-heading {background-color: #070720; color:#a6b7b7; border-color: #070720;}
                    .list-group-item{background-color: #070720;}
                    .list-group-item .comment-text span{color: #fff;}
                    .mic-info a {color:white!important;}
                    .mic-info a:hover {color:#e53637!important;}
                    .glyphicon-comment { font-size: small;}
                </style>
                <div class="container">
                    <div class="">
                        <div class="panel panel-default widget">
                            <div class="panel-heading">
                                <span class="glyphicon glyphicon-comment pr-1"></span>
                                <h3 class="panel-title">
                                    Recent Discussion</h3>
                            </div>
                            <div class="panel-body">
                                <ul class="list-group">
                                <?php 

                                    $sql = "SELECT * FROM `discussion` d INNER JOIN utilisateur u ON u.id_utilisateur = d.id_utilisateur ORDER BY d.id_discussion DESC LIMIT 12";
                                    $query = mysqli_query($connection,$sql);
                                    if(mysqli_num_rows($query)>0){
                                        while($row=mysqli_fetch_assoc($query)){
                                            $image = base64_encode($row["image_utilisateur"]);
                                            ?>
                                                <li class="list-group-item">
                                                    <div class="row">
                                                        <div class="col-xs-2 col-md-1 pt-1">
                                                            <img style="max-width: 110px; max-height: 111px;" src="data:img/jpeg;base64,<?php echo $image;?>" class="img-responsive" alt="" /></div>
                                                        <div class="col-xs-10 col-md-11">
                                                            <div>
                                                                <div class="mic-info pt-1">
                                                                    By: <a href="#"><?php echo $row["nom_utilisateur"]?></a> on <?php echo $row["date_creation_discussion"]?>
                                                                </div>
                                                            </div>
                                                            <div class="disc__link pt-3" >
                                                                <a href="./forum-details.php?id_disscusion=<?php echo $row["id_discussion"];?>"><?php echo $row["titre_discussion"]?></a>
                                                            </div>
                                                            <div class="comment-text pt-3">
                                                                <span>
                                                                <?php echo $row["subject_discussion"]?>
                                                            </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            <?php
                                        }
                                        
                                    }

                                ?>
                                    
                                    
                                </ul>
                                <a href="#" class="btn btn-block p-2" role="button"><span class="glyphicon glyphicon-refresh"></span> More</a>
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

</body>

</html>