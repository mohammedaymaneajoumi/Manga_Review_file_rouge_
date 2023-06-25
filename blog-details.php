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

    <!-- Blog Details Section Begin -->
    <section class="blog-details spad">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="blog__details__title">
                        <h6>Action, Magic <span>- june 12, 2023</span></h6>
                        <h2>Best Manga Panels Of All Time From Popular Manga</h2>
                        <div class="blog__details__social">
                            <a href="#" class="facebook"><i class="fa fa-facebook-square"></i> Facebook</a>
                            <a href="#" class="pinterest"><i class="fa fa-pinterest"></i> Pinterest</a>
                            <a href="#" class="linkedin"><i class="fa fa-linkedin-square"></i> Linkedin</a>
                            <a href="#" class="twitter"><i class="fa fa-twitter-square"></i> Twitter</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="blog__details__pic">
                        <img src="img/Slider/blog.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="blog__details__content">
                        <div class="blog__details__text">
                            <p>While reading a manga, have you ever paused and thought, “Wow! This manga panel is out of this world.”? If you’re a manga reader, you must have often come across scenes that left an unforgettable impression on you.
                            So, I have attempted to pick and choose some manga panels with exquisite artwork or heavy emotional value, are talked about a lot, are memorable to the fans, or all of these combined.
                            It is hard to say these few panels out of thousands are the best, and your favorites might differ from the ones on this list. But, I have tried my best to pick those that are impactful in one way or another.
                            So, without any more talk, get your eyes ready to feast on some beautiful art, and let’s get to the list!
                            Note: The list is in no particular order. Also, please look out for spoilers!</p>
                        </div>
                        <div class="blog__details__item__text">
                            <h4>1.CHAINSAW MAN</h4>
                            <img src="img/Slider/1.jpg" alt="">
                            <p>
                            Tatsuki Fujimoto has established himself as one of the greatest mangakas of this generation with his over-the-top hair-raising artwork that cannot go unappreciated.
                            Yes, this is the one panel that went insanely viral. The Darkness Devil standing at the back with deceased astronauts praying embodies the idea of primal fears.
                            It is the “unknown” in the darkness we fear, and these astronauts who ventured into the void met a miserable fate. It conveys the folly of those who recklessly go into the unexplored,
                            ignorant of the horrors that lurk inside.
                            </p>
                        </div>
                        <div class="blog__details__item__text">
                            <h4>2.ATTACK ON TITAN</h4>
                            <img src="img/Slider/2.jpg"  alt="">
                            <p>
                            This manga panel symbolizes a lot of things. It is unfathomably beautiful with Eren smiling, like his search for freedom has finally ended.
                            The clouds blanketing the tragedy and all the catastrophes beneath represent Eren’s attempt to ignore the pain of his victims in that instant.
                            This panel portrays Eren’s youthful dream of going outside the walls and attaining freedom no matter what.
                            He has no answer to the questions of the future, but at this moment, he feels free, no matter the gravity of his actions.
                            </p>
                        </div>
                        <div class="blog__details__item__text">
                            <h4>3.AKIRA</h4>
                            <img src="img/Slider/3.jpg" alt="">
                            <p>
                            Katsuhiro Otomo is a one-of-a-kind artist and this panel alone is a testimony to that:
                            A fun fact about this magnific manga panel is that Otomo spent a whole evening drawing thin black lines to illustrate the volume of the massive sphere in focus and to depict the gravity of this scene, with the number of people dying inside.
                            Not just that, the entire panel is exceptionally detailed, with genius shading and crosshatching. That is why it feels all the more real and menacing. It truly deserves all the hype around it.
                            </p>
                        </div>
                        <div class="blog__details__btns">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="blog__details__btns__item">
                                        <h5><a href="#"><span class="arrow_left"></span> Building a Better LiA...</a>
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="blog__details__btns__item next__btn">
                                        <h5><a href="#">Mugen no Juunin: Immortal 21 <span
                                            class="arrow_right"></span></a></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="blog__details__form">
                                <h4>Leave A Commnet</h4>
                                <form action="#">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <textarea placeholder="Message"></textarea>
                                            <button type="submit" class="site-btn">Send Message</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Blog Details Section End -->

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