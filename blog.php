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
                                <li><a href="./index.php">Homepage</a></li>
                                <li><a href="./forum.php">Community <span class="arrow_carrot-down"></span></a>
                                    <ul class="dropdown">
                                        <li><a href="./forum.php">Forum</a></li>
                                        <li><a href="https://discord.gg/XcD46ZfZ">Discord Dhat</a></li>
                                    </ul>
                                </li>
                                <li class="active"><a href="./blog.php">Manga News</a></li>
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

    <!-- Normal Breadcrumb Begin -->
    <section class="normal-breadcrumb set-bg" data-setbg="img/normal-breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="normal__breadcrumb__text">
                        <h2>Our Blog</h2>
                        <p>Welcome to the official MangaLead blog.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Normal Breadcrumb End -->
    <style>
        .blog__item::after {
            content: "";    
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background-color: rgba(0, 0, 0, 0.5);
        }
        .blog__item__text p,
        .blog__item__text h4 a {
            color: #fff !important;
            z-index: 9;
            top: 0;
            position: relative;
            opacity: 1;
        }
    </style>
    <!-- Blog Section Begin -->
    <section class="blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="blog__item set-bg" data-setbg="img/blog/blog-1.jpg" style="background-color: rgba(0, 0, 0, 0.5);">
                                <div class="blog__item__text">
                                    <p><span class="icon_calendar"></span> 01 March 2020</p>
                                    <h4><a href="./blog-details.php">Yuri Kuma Arashi Viverra Tortor Pharetra</a></h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="blog__item small__item set-bg" data-setbg="img/blog/blog-4.jpg">
                                <div class="blog__item__text">
                                    <p><span class="icon_calendar"></span> 01 March 2020</p>
                                    <h4><a href="./blog-details.php">Bok no Hero Academia Season 4 – 18</a></h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="blog__item small__item set-bg" data-setbg="img/blog/blog-5.jpg">
                                <div class="blog__item__text">
                                    <p><span class="icon_calendar"></span> 01 March 2020</p>
                                    <h4><a href="./blog-details.php">Fate/Stay Night: Untimated Blade World</a></h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="blog__item set-bg" data-setbg="img/blog/blog-7.jpg">
                                <div class="blog__item__text">
                                    <p><span class="icon_calendar"></span> 01 March 2020</p>
                                    <h4><a href="./blog-details.php">Housekishou Richard shi no Nazo Kantei Season 08 - 20</a></h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="blog__item small__item set-bg" data-setbg="img/blog/blog-10.jpg">
                                <div class="blog__item__text">
                                    <p><span class="icon_calendar"></span> 01 March 2020</p>
                                    <h4><a href="./blog-details.php">Fate/Stay Night: Untimated Blade World</a></h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="blog__item small__item set-bg" data-setbg="img/blog/blog-11.jpg">
                                <div class="blog__item__text">
                                    <p><span class="icon_calendar"></span> 01 March 2020</p>
                                    <h4><a href="./blog-details.php">Building a Better LiA Drilling Down</a></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="blog__item small__item set-bg" data-setbg="img/blog/blog-2.jpg">
                                <div class="blog__item__text">
                                    <p><span class="icon_calendar"></span> 01 March 2020</p>
                                    <h4><a href="./blog-details.php">Fate/Stay Night: Untimated Blade World</a></h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="blog__item small__item set-bg" data-setbg="img/blog/blog-3.jpg">
                                <div class="blog__item__text">
                                    <p><span class="icon_calendar"></span> 01 March 2020</p>
                                    <h4><a href="./blog-details.php">Building a Better LiA Drilling Down</a></h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="blog__item set-bg" data-setbg="img/blog/blog-6.jpg">
                                <div class="blog__item__text">
                                    <p><span class="icon_calendar"></span> 01 March 2020</p>
                                    <h4><a href="./blog-details.php">Yuri Kuma Arashi Viverra Tortor Pharetra</a></h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="blog__item small__item set-bg" data-setbg="img/blog/blog-8.jpg">
                                <div class="blog__item__text">
                                    <p><span class="icon_calendar"></span> 01 March 2020</p>
                                    <h4><a href="./blog-details.php">Bok no Hero Academia Season 4 – 18</a></h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="blog__item small__item set-bg" data-setbg="img/blog/blog-9.jpg">
                                <div class="blog__item__text">
                                    <p><span class="icon_calendar"></span> 01 March 2020</p>
                                    <h4><a href="./blog-details.php">Fate/Stay Night: Untimated Blade World</a></h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="blog__item set-bg" data-setbg="img/blog/blog-12.jpg">
                                <div class="blog__item__text">
                                    <p><span class="icon_calendar"></span> 01 March 2020</p>
                                    <h4><a href="./blog-details.php">Yuri Kuma Arashi Viverra Tortor Pharetra</a></h4>
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
                            <li><a href="./forum.php">Community</a></li>
                            <li class="active"><a href="./blog.php">Manga News</a></li>
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