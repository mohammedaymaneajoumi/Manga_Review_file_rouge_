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

    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" />
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css" />
    <link rel="stylesheet" href="css/plyr.css" type="text/css" />
    <link rel="stylesheet" href="css/nice-select.css" type="text/css" />
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css" />
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css" />
    <link rel="stylesheet" href="css/style.css" type="text/css" />
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container">
            <div class="row" style="align-items: center;">
                <div class="col-lg-2">
                    <div class="header__logo d-flex" >
                        <a href="./index.php">
                            <a href="./index.php">
                                mangalead
                            </a>
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
                            if(isset($_SESSION['id_utilisateur'])){
                                $id_user_profile = $_SESSION['id_utilisateur'];
                                //
                                $query_user_profile = "SELECT * FROM `utilisateur` WHERE id_utilisateur = '$id_user_profile'";
                                $result_user_profile = mysqli_query($connection, $query_user_profile);

                                if(mysqli_num_rows($result_user_profile) > 0){
                                    
                                    $row_user_profile = mysqli_fetch_assoc($result_user_profile);
                                    $user_profile = $row_user_profile['image_utilisateur'];
                                    $user_profileBase64 = base64_encode($user_profile);

                                    echo '
                                            <a href="./profile.php"><span class="userimage"><img src="data:img/jpeg;base64,'.$user_profileBase64.'" alt=""></span></a>
                                        ';
                                } else {
                                    //
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
                    </div>
                </div>
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="hero__slider owl-carousel">
            <div class="hero__items set-bg" data-setbg="img/Slider/1.jpg">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="hero__text">
                            <div class="label">blog</div>
                            <h2>Chainsaw Man / チェンソーマン</h2>
                            <p>Tatsuki Fujimoto has established himself as one of the greatest mangakas of this generation...</p>
                            <a href="./blog-details.php"><span>Read More</span> <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero__items set-bg" data-setbg="img/Slider/2.jpg">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="hero__text">
                            <div class="label">blog</div>
                            <h2>Attack on Titan / 進撃の巨人</h2>
                            <p>It never fails to amaze the readers how Hajime Isayama’s artwork has transformed...</p>
                            <a href="./blog-details.php"><span>Read More</span> <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero__items set-bg" data-setbg="img/Slider/3.jpg">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="hero__text">
                            <div class="label">blog</div>
                            <h2>Akira / アキラ</h2>
                            <p>Katsuhiro Otomo is a one-of-a-kind artist and this panel alone is a testimony...</p>
                            <a href="./blog-details.php"><span>Read More</span> <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
                <div class="col-lg-12 pr-0" >
                    <div class="trending__product">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="section-title">
                                    <h4>Recently Added</h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="btn__all">
                                    <a href="./view-all.php" class="primary-btn">View All <span
                                            class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>

                        <?php
                            $sqlQuery = "SELECT * FROM manga ORDER BY id_manga DESC LIMIT 12";
                            $result = mysqli_query($connection, $sqlQuery);
                            if (mysqli_num_rows($result) > 0) {
                                $counter = 0;
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $sql_commentaireNumber = "SELECT COUNT(*) FROM discussion WHERE id_manga = {$row['id_manga']}";
                                    $query_commentaireNumber = mysqli_query($connection,$sql_commentaireNumber);
                                    $row_commentaireNumber = mysqli_fetch_assoc($query_commentaireNumber);
                                    $numberCommentaire = $row_commentaireNumber["COUNT(*)"];
                                    
                                    $cardTitle = $row['nom_manga'];
                                    $cardTitleJapen = $row['Japanese_nom_manga'];
                                    $cardImage = $row['couverture_manga'];
                                    $cardStatus = $row['etat_manga'];

                                    if (!empty($cardImage)) {
                                        $cardImageBase64 = base64_encode($cardImage);
                                        $counter++;
                                        if ($counter % 6 == 1) {

                                            echo '<div class="container pr-0">
                                                    <div class="row" style="justify-content: space-between;">';
                                        }
                                            echo '<div class="col-lg-2 col-md-4 col-sm-4 pl-0" >
                                                        <div class="product__item">
                                                                <input type="hidden" name="image_home_racent">
                                                                <div class="product__item__pic set-bg" data-setbg="data:img/jpeg;base64,'.$cardImageBase64.'">
                                                                <div class="comment">
                                                                    <i class="fa fa-comments"></i> '.$numberCommentaire.'
                                                                </div>
                                                                <div class="ep">'.$cardStatus.'</div>
                                                            </div>
                                                            <div class="product__item__text">
                                                                <h6><a href="./manga-details.php?id='.$row['id_manga'].'">'.$cardTitle.'</a><br><a href="./manga-details.php?id='.$row['id_manga'].'">'.$cardTitleJapen.'</a></h6>
                                                            </div>
                                                        </div>
                                                    </div>';
                                        if ($counter % 6 == 0 || $counter == mysqli_num_rows($result)) {
                                            // 
                                            echo '</div>
                                                </div>';
                                        }
                                    }
                                }
                            }
                        ?>

                    <div class="recent__product">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="section-title">
                                    <h4>Top Rated</h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="btn__all">
                                    <a href="./top-rated.php" class="primary-btn">View All <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="container pr-0">
                            <div class="row" style="justify-content: space-between;">
                                <?php

                                $sql_rated = "SELECT manga.Japanese_nom_manga,manga.couverture_manga,manga.id_manga, manga.nom_manga, COUNT(*) AS repetition_count
                                    FROM likes
                                    INNER JOIN manga ON manga.id_manga = likes.id_manga
                                    GROUP BY manga.id_manga
                                    ORDER BY repetition_count DESC LIMIT 12";
                                $result_rated = mysqli_query($connection,$sql_rated);
                                $i = 0;
                                while($row_rated = mysqli_fetch_assoc($result_rated)){
                                    $image = base64_encode($row_rated["couverture_manga"]);

                                    $id = $row_rated["id_manga"];

                                    $i++;
                                    echo    
                                        '<div class="col-lg-2 col-md-4 col-sm-4 pl-0">
                                            <div class="product__item">
                                                <div class="product__item__pic set-bg" data-setbg="data:img/jpeg;base64,'.$image.'">
                                                    <div class="ep">#'.$i.'</div>
                                                </div>
                                                <div class="product__item__text">
                                                    <h6><a href="manga-details.php?id='.$id.'">'.$row_rated["nom_manga"].'</a><br><a href="manga-details.php?id='.$id.'">'.$row_rated["Japanese_nom_manga"].'</a></h6>
                                                </div>
                                            </div>
                                        </div>';
                                    //
                                    if ($i % 6 == 0) {
                                        echo '</div>
                                            <div class="row" style="justify-content: space-between;">';
                                    }
                                }
                                ?>
                            </div>
                    </div>

                    <div class="recent__product">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="section-title">
                                    <h4>Popular Discussions</h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="btn__all">
                                    <a href="./forum.php" class="primary-btn">View All <span
                                            class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        <style>
                            .RecentDiscussion {
                                display: flex;
                                align-items: center;
                                text-decoration: none;
                                color: inherit;
                                background-color:#1d1e39; 
                                border-radius: 8px;
                                padding: 30px;
                                transition: background-color 0.3s ease;
                                }

                                .RecentDiscussion:hover {
                                background-color: #1d1e39;
                                }

                                .RecentDiscussion__poster {
                                display: flex;
                                align-items: center;
                                }

                                .user__profile_image {
                                max-width: 90px; 
                                max-height: 90px;
                                margin-right: 16px;
                                border:none;
                                }

                                .RecentDiscussion__poster_metadata {
                                display: flex;
                                flex-direction: column;
                                }

                                .RecentDiscussion__username {
                                font-size: 16px;
                                font-weight: bold;
                                margin-bottom: 4px;
                                }

                                .RecentDiscussion__date {
                                font-size: 14px;
                                color: #777;
                                }

                                .RecentDiscussion__time {
                                font-size: 14px;
                                color: #777;
                                }

                                .RecentDiscussion__discussion {
                                margin-left: 16px;
                                flex: 1;
                                }

                                .RecentDiscussion__content {
                                overflow: hidden;
                                text-overflow: ellipsis;
                                display: -webkit-box;
                                -webkit-box-orient: vertical;
                                -webkit-line-clamp: 3;
                                margin: 0;
                                font-size: 14px;
                                }

                        </style>
                        <?php
                        $sql_discussion_homepage = "SELECT * FROM discussion d 
                        INNER JOIN utilisateur u ON d.id_utilisateur = u.id_utilisateur 
                        INNER JOIN manga m ON d.id_manga = m.id_manga 
                        ORDER BY d.id_discussion 
                        DESC 
                        LIMIT 3";

                        $result_discussion_homepage = mysqli_query($connection, $sql_discussion_homepage);
                        if(mysqli_num_rows($result_discussion_homepage)>0){
                            while($row_discussion_homepage = mysqli_fetch_assoc( $result_discussion_homepage)){

                                $user_discussion_homepage = $row_discussion_homepage['nom_utilisateur'];
                                $user_discussion_image = base64_encode($row_discussion_homepage['image_utilisateur']);
                                $date_discussion_homepage = $row_discussion_homepage['date_creation_discussion'];
                                $subject_discussion_homepage = $row_discussion_homepage['subject_discussion'];
                                $name_manga_discussion_homepage = $row_discussion_homepage['nom_manga'];
                                $id_discussion_get = $row_discussion_homepage['id_discussion'];
                                echo'
                                <div class="d-flex">
                                <div class="">
                                    <div class="col-lg-12 col-md-12 col-sm-12 m-0 pl-0">
                                        <div class="pure-u-1"><a class="RecentDiscussion rounded-card" href="forum-details.php?id_disscusion='.$id_discussion_get.'">
                                            <div class="RecentDiscussion__poster">
                                                <img class="user__profile_image RecentDiscussion__profile_image" src="data:img/jpeg;base64,'.$user_discussion_image.'">
                                                <div class="RecentDiscussion__poster_metadata">
                                                    <p class="RecentDiscussion__username">'.$user_discussion_homepage.'</p>
                                                <time class="RecentDiscussion__date">'.$date_discussion_homepage.'</time>
                                                </div>
                                            </div>
                                            <div class="RecentDiscussion__discussion">
                                                <p class="RecentDiscussion__content" style="overflow: hidden; text-overflow: ellipsis; -webkit-box-orient: vertical; display: -webkit-box; -webkit-line-clamp: 3;color:white;" >'.$name_manga_discussion_homepage.'<br>
                                                <br>
                                                '.$subject_discussion_homepage.'</p> 
                                            </div>
                                            </a></div>
                                        </div>
                                    </div>
                                
                                ';
                            }
                        }
                        ?>
                        
                    </div>
                    </div>
    </section>
    <!-- Product Section End -->

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
                    <p>&copy; 2023 MangaLead. All rights reserved.</p>
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