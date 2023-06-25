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

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/1171a84c58.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


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
                    </div>
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
                        <span>view all</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Product Section Begin -->
    <section class="product-page spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product__page__content">
                        <div class="product__page__title">
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-6">
                                    <div class="section-title">
                                        <h4>Browse manga</h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <form method="POST" action="" id="formData">
                            <div class="container" style="padding-left:0px;">
                                <div class="col" style="padding-left: 0px; margin: 59px 0 24px 0;">
                                    <button class="btn btn-sm btn-custom mb-3 d-flex" type="button" data-toggle="collapse" data-target="#collapseFilters" aria-expanded="false" aria-controls="collapseFilters" style="outline: 0; box-shadow: none; color:white; align-items: center; gap: 4px;">
                                        <i class="fa-solid fa-arrow-down-wide-short"></i> Filters
                                    </button>
                                    <div class="collapse" id="collapseFilters">
                                        <div class="card-movies-series border-0 shadow-sm mb-3">
                                            <div class="card-body" style="padding-left: 0px;">
                                                <div class="row">
                                                    <div class="line my-3"></div>
                                                    <div class="col-12 col-md-6 col-lg-3">
                                                        <div class="facet-wrap">
                                                            <h6 class="facet-label">Search</h6>
                                                            <div class="facetwp-facet facetwp-facet-post_type_search_box facetwp-type-search" data-name="post_type_search_box" data-type="search">
                                                                <span class="facetwp-input-wrap">
                                                                    <i class="facetwp-icon"></i>
                                                                    <input type="text" class="facetwp-search form-control form-control-sm" value="" id="name" placeholder="Type Name" autocomplete="off">
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-3">
                                                        <div class="facet-wrap">
                                                            <h6 class="facet-label">Tags</h6>
                                                            <div class="facetwp-facet facetwp-facet-post_type_search_box facetwp-type-search" data-name="post_type_search_box" data-type="search">
                                                                <span class="facetwp-input-wrap">
                                                                    <i class="facetwp-icon"></i>
                                                                    <input type="text" class="facetwp-search form-control form-control-sm" value="" placeholder="Type Name" autocomplete="off">
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-3">
                                                        <div class="facet-wrap">
                                                            <h6 class="facet-label">Author</h6>
                                                            <div class="facetwp-facet facetwp-facet-post_type_search_box facetwp-type-search" data-name="post_type_search_box" data-type="search">
                                                                <span class="facetwp-input-wrap">
                                                                    <i class="facetwp-icon"></i>
                                                                    <input type="text" class="facetwp-search form-control form-control-sm" value="" placeholder="Type Name" autocomplete="off">
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-3">
                                                        <div class="facet-wrap">
                                                            <h6 class="facet-label">Artiste</h6>
                                                            <div class="facetwp-facet facetwp-facet-post_type_search_box facetwp-type-search" data-name="post_type_search_box" data-type="search">
                                                                <span class="facetwp-input-wrap">
                                                                    <i class="facetwp-icon"></i>
                                                                    <input type="text" class="facetwp-search form-control form-control-sm" value="" placeholder="Type Name" autocomplete="off">
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                
                            </div>
                        </form>
                        <div id="searchBox">
                        </div>

                        <div class="row">
                            <?php
                                $sql = "";
                                $result = "";
                                $itemsPerPage = 30;

                                $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

                                $start = ($currentPage - 1) * $itemsPerPage;

                                $sqlQuery = "SELECT COUNT(*) as total FROM manga";
                                $totalQuery = $connection->query($sqlQuery);
                                $totalResult = $totalQuery->fetch_assoc();
                                $totalItems = $totalResult['total'];

                                $totalPages = ceil($totalItems / $itemsPerPage);

                                if(isset($_POST["name"])){
                                    $name = $_POST["name"];
                                    $sql  = "SELECT * FROM manga WHERE nom_manga LIKE '%{$name}%' ORDER BY nom_manga LIMIT $start, $itemsPerPage";
                                    $result = mysqli_query($connection,$sql);
                                }
                                else{
                                    $sql  = "SELECT * FROM manga ORDER BY nom_manga LIMIT $start, $itemsPerPage";
                                    $result = mysqli_query($connection,$sql);
                                }
                                if (mysqli_num_rows($result) > 0) {
                                    $counter = 0;
                                    while ($row = mysqli_fetch_assoc($result)) {

                                        $sql_commentaireNumber = "SELECT COUNT(*) FROM discussion WHERE id_manga = {$row['id_manga']}";
                                        $query_commentaireNumber = mysqli_query($connection,$sql_commentaireNumber);
                                        $row_commentaireNumber = mysqli_fetch_assoc($query_commentaireNumber);
                                        $numberCommentaire = $row_commentaireNumber["COUNT(*)"];

                                        $idManga = $row['id_manga'];
                                        $cardTitle = $row['nom_manga'];
                                        $cardTitleJapen = $row['Japanese_nom_manga'];
                                        $cardImage = $row['couverture_manga'];
                                        $cardStatus = $row['etat_manga'];
                                        if (!empty($cardImage)) {
                                            $cardImageBase64 = base64_encode($cardImage);
                                            
                                            $counter++;
                                            
                                            if ($counter % 6 == 1) {
                                                echo '<div class="container">
                                                        <div class="row" style="justify-content: space-between;">';
                                            }
                                            echo '<div class="col-lg-2 col-md-4 col-sm-4" >
                                                    <div class="product__item">
                                                        <div class="product__item__pic set-bg" data-setbg="data:img/jpeg;base64,'.$cardImageBase64.'">
                                                            <div class="comment">
                                                                <i class="fa fa-comments"></i> '.$numberCommentaire.'
                                                            </div>
                                                            <div class="ep">'.$cardStatus.'</div>
                                                        </div>
                                                        <div class="product__item__text">
                                                            <h6><a href="./manga-details.php?id='.$idManga.'">'.$cardTitle.'</a><br><a href="./manga-details.php?id='.$idManga.'">'.$cardTitleJapen.'</a></h6>
                                                        </div>
                                                    </div>
                                                </div>';
                                            if ($counter % 6 == 0 || $counter == mysqli_num_rows($result)) {
                                                echo '</div>
                                                    </div>';
                                            }
                                        }
                                    }
                                }
                            ?>
                        </div>
                    </div>

                    <div class="pagination">
                        <?php
                        if ($totalPages > 1) {
                        echo '<ul>';

                        if ($currentPage > 1) {
                            echo '<li><a href="?page=' . ($currentPage - 1) . '">&laquo;</a></li>';
                        }

                        for ($i = 1; $i <= $totalPages; $i++) {
                            if ($i == $currentPage) {
                            echo '<li class="active"><span>' . $i . '</span></li>';
                            } else {
                            echo '<li><a href="?page=' . $i . '#annonces">' . $i . '</a></li>';
                            }
                        }

                        if ($currentPage < $totalPages) {
                            echo '<li><a href="?page=' . ($currentPage + 1) . '#annonces">&raquo;</a></li>';
                        }

                        echo '</ul>';
                        }
                        ?>
                    </div>
                </div>

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
    <script src="js/bootstrap.min.js"></script>
    <script src="js/player.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>
</html>