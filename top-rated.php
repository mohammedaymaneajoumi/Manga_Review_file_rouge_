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
                            <li class="active"><a href="./index.php">Homepage</a></li>
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
                            //
                            if(isset($_SESSION['id_utilisateur'])){
                                $id_user_profile = $_SESSION['id_utilisateur'];
                                $query_user_profile = "SELECT * FROM `utilisateur` WHERE id_utilisateur = '$id_user_profile'";
                                $result_user_profile = mysqli_query($connection, $query_user_profile);

                                //
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
                        <a href="./index.php"><i class="fa fa-home"></i> Home</a>
                        <span>Top Rated</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Blog Section Begin -->
    <section class="blog spad" style="padding-bottom: 22px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8">
                    <div class="section-title">
                        <h4>Top Rated</h4>
                    </div>
                </div>
                
            </div>
        </div>
    </section>

    <style>
        .product__item__pic {
            height: 229px;
            width: 152px;
        }
        </style>
        <div class="container pr-0">
            <div class="row col-lg-12 p-0 mb-5 ml-1">
                <div class="container ml-0">
                    <?php
                        //SAME AS INDEX
                        $sql_rated = "SELECT manga.Japanese_nom_manga,manga.couverture_manga, manga.id_manga, manga.nom_manga, manga.id_api, COUNT(*) AS repetition_count
                        FROM likes
                        INNER JOIN manga ON manga.id_manga = likes.id_manga
                        GROUP BY manga.id_manga, manga.nom_manga, manga.id_api
                        ORDER BY repetition_count DESC LIMIT 27";
                        $result_rated = mysqli_query($connection,$sql_rated);
                        $i = 0;
                        while($row_rated = mysqli_fetch_assoc($result_rated)){
                            $image = base64_encode($row_rated["couverture_manga"]);
                            $id= $row_rated["id_manga"];
                            $i++;
                            
                            if($i % 9 == 1) {
                                echo '<div class="row" style="justify-content: space-between;">';
                            }
                    ?>
                            <div class="col-lg-1 col-md-4 col-sm-4 p-0">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="data:img/jpeg;base64,<?php echo $image; ?>">
                                        <div class="ep">#<?php echo $i; ?></div>
                                    </div>
                                    <div class="product__item__text">
                                        <h6><a href="manga-details.php?id=<?php echo $id;?>"><?php echo $row_rated["nom_manga"]; ?></a><br><a href="manga-details.php?id=<?php echo $id;?>"><?php echo $row_rated["Japanese_nom_manga"]; ?></a></h6>
                                    </div>
                                </div>
                            </div>
                    <?php
                            if($i % 9 == 0) {
                                echo '</div>';
                            }
                        }
                        
                        if($i % 9 != 0) {
                            echo '</div>';
                        }
                    ?>
                </div>
            </div>
        </div>



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
                        <li class="active"><a href="./index.php">Homepage</a></li>
                            <li><a href="./forum.php">Community</a></li>
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

        <!-- Search model Begin -->
        <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch"><i class="icon_close"></i></div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search model end -->

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