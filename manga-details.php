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
                            //
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
                        <a href="./index.php"><i class="fa fa-home"></i> Home</a>
                        <span>Manga Details</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Anime Section Begin -->
    <section class="anime-details spad">
        <div class="container">
            <div class="anime__details__content">
                <?php
                    $id_cards_all = $_GET['id'];

                    $query_details = "SELECT * FROM `manga` m 
                    INNER JOIN auteur a ON m.id_auteur = a.id_auteur 
                    INNER JOIN manga_tag mt ON m.id_manga = mt.id_manga 
                    INNER JOIN tag t ON t.id_tag = mt.id_tag 
                    INNER JOIN manga_artiste ma ON m.id_manga = ma.id_manga 
                    INNER JOIN artiste ar ON ar.id_artiste = ma.id_artiste 
                    WHERE m.id_manga = $id_cards_all;";

                    $result_cards_details = mysqli_query($connection, $query_details);

                    if (mysqli_num_rows($result_cards_details) > 0) {
                        while($row_view_details = mysqli_fetch_assoc($result_cards_details)){
                            $cardArtistUpdate = "";
                            $cardAuhtorUpdate = "";
                            $cardArtistAuthorUpdate="";
                            $tags = "";
                            $button_text = "";

                            $cardTitle = $row_view_details['nom_manga'];
                            $cardTitleJapen = $row_view_details['Japanese_nom_manga'];
                            $cardImage = $row_view_details['couverture_manga'];
                            $cardSummary = $row_view_details['résumé_manga'];
                            $tag_label[]= $row_view_details['label_tag'];
                            $ratimg_manga = $row_view_details['id_api'];

                            foreach($tag_label as $tag){
                                $tags .= '<li  style="margin:0 5px 10px 0;">'.$tag.'</li>';
                            }

                            if($row_view_details['volume_manga'] === '0'){
                                $cardVolumes = '?';
                            }else{
                                $cardVolumes = $row_view_details['volume_manga'];
                            }

                            if($row_view_details['chapitre_manga'] === '0'){
                                $cardChapters = '?';
                            }else{
                                $cardChapters = $row_view_details['chapitre_manga'];
                            }

                            $cardDateAired = $row_view_details['date_de_sortie_manga'];
                            $cardStatus = $row_view_details['etat_manga'];

                            if( $row_view_details['nom_auteur'] == $row_view_details['nom_artiste']){
                                $card_auteur_artiste = $row_view_details['nom_auteur'];
                                $cardArtistAuthorUpdate = '<span>artist/auhtor:</span><a href="#">'.$card_auteur_artiste.'</a>';

                            }else{
                                $cardAuhtor = $row_view_details['nom_auteur'];
                                $cardArtist = $row_view_details['nom_artiste'];
                                $cardArtistUpdate = '<span>artist:</span><a href="#">'.$cardArtist.'</a>';
                                $cardAuhtorUpdate = '<span>auhtor:</span><a href="#">'.$cardAuhtor.'</a>';
                            }
                            if (!empty($cardImage)) { 
                                $cardImageBase64 = base64_encode($cardImage);
                        }
                    }
                }
                ?>
                <?php
                    $disabled="";
                    if(!empty($_SESSION['id_utilisateur'])){
                        $id_likeUser = $_SESSION['id_utilisateur'];
                        $button_text = "";

                        $sql_check_like = "SELECT * FROM likes WHERE id_utilisateur = '$id_likeUser' AND id_manga = '$id_cards_all'";
                        $result_check_like = mysqli_query($connection, $sql_check_like);
                        
                        if(mysqli_num_rows($result_check_like) === 0){
                            $button_text = 'Add to List';
                        }else{
                            $button_text = 'Remove from List';
                        }
                    }
                    else{
                        $button_text = 'Add to List';
                        $disabled="disabled";
                    }
                ?>
                <?php
                    $baseUrl = 'https://api.mangadex.org';
                    $mangaID = $ratimg_manga; 

                    $url = $baseUrl . '/statistics/manga/' . $mangaID;
                    $response = file_get_contents($url);

                    if ($response !== false) {
                        $data = json_decode($response, true);

                        $rating = $data['statistics'][$mangaID]['rating'];
                        $follows = $data['statistics'][$mangaID]['follows'];
                        $rate =  $rating['average'];
                        $rate_two = $rating['bayesian'];

                    } else {
                        echo 'Error: Failed to retrieve manga statistics.';
                    }
                ?>
                <?php 
                echo '
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="anime__details__pic set-bg" data-setbg="data:img/jpeg;base64,'.$cardImageBase64.'">
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="anime__details__text">
                                <div class="anime__details__title">
                                    <h3>'.$cardTitle.'</h3>
                                    <span>'.$cardTitleJapen.'</span>
                                </div>
                                <div class="anime__details__rating">
                                    <h5>'.$rate.'/10</h5>
                                </div>
                                <p>'.$cardSummary.'</p>

                                <div class="anime__details__widget">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 pl-0">
                                            <ul>
                                                <li><span>volumes:</span>'.$cardVolumes.'</li>
                                                <li><span>chapters:</span>'.$cardChapters.'</li>
                                                <li><span>Date aired:</span>'.$cardDateAired.'</li>
                                                <li><span>Status:</span>'.$cardStatus.'</li>
                                                <li>'.$cardAuhtorUpdate.'</li>
                                                <li>'.$cardArtistUpdate.'</li>
                                                <li>'.$cardArtistAuthorUpdate.'</li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-6 col-md-6 pl-0">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 pl-0">
                                            <ul style="margin:0px;">
                                                <div class="product__item__text pt-0 d-flex">
                                                    <li><span>tages:</span></li>
                                                    <ul>
                                                        '.$tags.'
                                                    </ul>
                                                </div>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="anime__details__btn d-flex">
                                    <form method="POST" action="processe-manga.php" >
                                        <input type="hidden" name="idManga" value="'.$id_cards_all.'"/>
                                        <button '.$disabled.' name="to_add_like" type="submit" class="follow-btn"><i class="fa fa-heart-o"></i> '.$button_text.'</button>
                                    </form>
                                    <button '.$disabled.' class="follow-btn"><a href="./add-discussion.php?ADDdisscusion='.$_GET['id'].'&nom_manga='.$cardTitle.'" style="all:unset;">add discussion</a></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    ';
                ?>

                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <div class="anime__details__review">
                            <div class="col-lg-8 col-md-8 col-sm-8 p-0">
                                <div class="section-title">
                                    <h5>Reviews</h5>
                                </div>
                            </div>

                            <style>
                                .hidden {
                                    display: none;
                                    opacity: 0;
                                    transition: opacity 1s cubic-bezier(0.215, 0.61, 0.355, 1);
                                }

                                .visible {
                                    opacity: 1;
                                }
                            </style>
                            <div class="row">
                                <?php
                                $sql_review_manga = "SELECT * 
                                    FROM `review` 
                                    INNER JOIN utilisateur U ON U.id_utilisateur = review.id_utilisateur 
                                    WHERE review.id_manga = '$id_cards_all' 
                                    ORDER BY id_critique DESC 
                                    LIMIT 3";

                                $result_review_manga = mysqli_query($connection, $sql_review_manga);

                                if(mysqli_num_rows($result_review_manga) > 0) {
                                    while($row_review = mysqli_fetch_assoc($result_review_manga)) {
                                        $cardImageBase64 = base64_encode($row_review["image_utilisateur"]);
                                        $note = $row_review["note_critique"];
                                        $noteReview = "";

                                        if($note < 5) {
                                            $noteReview = '<h4 style="color:red;">'.$note.'/10</h4>';
                                        } elseif($note >= 5) {
                                            $noteReview = '<h4 style="color:green;">'.$note.'/10</h4>';
                                        }

                                        echo '
                                        <div class="col-6">
                                            <div class="card card-white post">
                                                <div class="post-heading">
                                                    <div class="float-left image">
                                                        <img src="data:img/jpeg;base64,'.$cardImageBase64.'" class="img-circle avatar" alt="user profile image">
                                                    </div>
                                                    <div class="float-left meta">
                                                        <div class="title h5">
                                                            <a href="#">'.$row_review["nom_utilisateur"].'</a>
                                                            made a post.
                                                        </div>
                                                        <h6 class="text-muted time">'.$row_review["date_creation_critique"].'</h6>
                                                    </div>
                                                    <div class="float-right text-success">
                                                        '.$noteReview.'
                                                    </div>
                                                </div> 
                                                <div class="post-description"> 
                                                    <p>'.$row_review["description_critique"].'</p>
                                                </div>
                                            </div>
                                        </div>
                                        ';
                                    }
                                }else {
                                    echo '
                                    <div class="col-6">
                                        <span style="color:#b7b7b7;" >There are no reviews yet.</span>
                                    </div>
                                    ';
                                }
                                ?>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="note__comment">
                    <form action="processe-manga.php" method="POST">
                        <div class="d-flex" style="column-gap: 20px;">
                            <input type="hidden" name="id" value="<?php echo $id_cards_all;?>"/>
                            <textarea id="review-textarea" name="content" placeholder="Your Comment" class="hidden" required></textarea>
                            <textarea id="review-input" oninput="validateNumber()" name="notereview" placeholder="Note" class="hidden" maxlength="2" required></textarea>
                        </div>
                        <button type="button" id="add-comment-button" onclick="toggleTextarea()">add comment +</button>
                        <?php 
                        //
                        if(empty($_SESSION['id_utilisateur'])){
                            echo '<button type="submit" id="review-button" onclick="addComment()" class="hidden" disabled><i class="fa fa-location-arrow"></i> Review</button>';
                        }else{
                            echo '<button type="submit" name="review" id="review-button" onclick="addComment()" class="hidden"><i class="fa fa-location-arrow"></i> Review</button>';
                        }
                        
                        ?>
                    </form>
                </div>
                <script>
                    function toggleTextarea() {
                        var textarea = document.getElementById("review-textarea");
                        var input = document.getElementById("review-input");
                        var button = document.getElementById("review-button");
                        textarea.classList.toggle("hidden");
                        input.classList.toggle("hidden");
                        button.classList.toggle("hidden");
                    }
                    function validateNumber() {
                        //
                        var input = document.getElementById("review-input").value;
                        var number = parseInt(input);
                        
                        if (isNaN(number) || number < 1 || number > 10) {
                        document.getElementById("review-input").setCustomValidity("Please enter a number between 1 and 10.");
                        } else {
                        document.getElementById("review-input").setCustomValidity("");
                        }
                    }
                </script>

                <div class="anime__details__form ">
                    <div class="section-title">
                        <h5>recommendations</h5>
                    </div>
                    <style>

                    </style>
                    <div class="container col-12">
                        <div class="row d-flex" style="gap:52px; row-gap: 14px;">
                            <?php
                                
                                $sql_recommendation = "SELECT m.* FROM manga m 
                                INNER JOIN manga_tag mt ON mt.id_manga = m.id_manga 
                                INNER JOIN tag t ON mt.id_tag = t.id_tag 
                                WHERE t.id_tag 
                                IN (SELECT id_tag FROM manga_tag WHERE id_manga = '$id_cards_all' ) 
                                GROUP BY m.id_manga 
                                ORDER BY RAND() 
                                LIMIT 8";
                                $query_recommendation = mysqli_query($connection, $sql_recommendation);

                                if(mysqli_num_rows($query_recommendation) >0 ){
                                    while($row_recommondation = mysqli_fetch_assoc($query_recommendation)){

                                        $imageRecommendation = base64_encode($row_recommondation['couverture_manga']);
                                        $titleRecommendation = $row_recommondation['nom_manga'];
                                        $dateRecommendation = $row_recommondation['date_de_sortie_manga'];
                                        $volsRecommendation = $row_recommondation['volume_manga'];
                                        $chapRecommendation = $row_recommondation['chapitre_manga'];
                                        //
                                        $idManga = $row_recommondation['id_manga'];


                                        echo '
                                        <div class="card-container d-flex ">
                                            <img class="card-image" src="data:img/jpeg;base64,'.$imageRecommendation.'">
                                            <div class="card-info">
                                                <a href="processe-manga.php?idManga='.$idManga.'"><p class="card-title">'.$titleRecommendation.'</p></a>
                                                <ul class="card-metadata">
                                                    <li>
                                                        <i class="card-metadata_icon fas fa-calendar-alt"></i>
                                                        <span class="card-metadata_item">'.$dateRecommendation.'</span>
                                                    </li>
                                                    <li>
                                                        <i class="card-metadata_icon fas fa-book-open"></i>
                                                        <span class="card-metadata_item">Vol: '.$volsRecommendation.' - Ch: '.$chapRecommendation.'</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        ';
                                    }
                                }

                            ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Anime Section End -->

        <!-- Footer Section Begin -->
        <footer class="footer">
            <div class="page-up">
                <a href="#" id="scrollToTopButton"><span class="arrow_carrot-up"></span></a>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="footer__logo">
                            <a href="./index.php"><img src="img/logo/logo.png" alt="" style="max-width: 50%;"/></a>
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

        <!-- Js Plugins -->
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/player.js"></script>
        <script src="js/jquery.nice-select.min.js"></script>
        <script src="js/mixitup.min.js"></script>
        <script src="js/jquery.slicknav.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/main.js"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    </body>
    </html>
