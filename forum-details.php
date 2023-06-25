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
                            <a href="./Forum.php"><i class="fa fa-home"></i> Community</a>
                            <a href="./Forum.php"></i>Racent Manga Discussion</a>
                            <span>Discussion details</span>
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
                <div class="col-lg-8 col-md-8 col-sm-8 pb-5">
                    <div class="section-title">
                        <h4>Discussion details</h4>
                    </div>
                </div>
                <style>

                    .panel .panel-heading,
                    .panel>:first-child {
                        border-top-left-radius: 0;
                        border-top-right-radius: 0;
                    }

                    .panel-body {
                        padding: 30px 25px;
                    }

                    .media-block .media-left {
                        display: block;
                        float: left
                    }

                    .media-block .media-right {
                        float: right
                    }

                    .media-block .media-body {
                        display: block;
                        overflow: hidden;
                        width: auto
                    }

                    .middle .media-left,
                    .middle .media-right,
                    .middle .media-body {
                        vertical-align: middle
                    }

                    .thumbnail {
                        border-radius: 0;
                        border-color: #e9e9e9
                    }

                    .tag.tag-sm,
                    .btn-group-sm>.tag {
                        padding: 7px 12px;
                    }

                    .tag:not(.label) {
                        padding: 6px 12px;
                        border-radius: 2px;
                        border: 1px solid #cdd6e1;
                        font-size: 14px;
                        line-height: 1.42857;
                        vertical-align: middle;
                        -webkit-transition: all .15s;
                        transition: all .15s;
                    }

                    .text-muted,
                    a.text-muted:hover,
                    a.text-muted:focus {
                        color: #fff;
                    }

                    .text-sm {
                        font-size: 0.9em;
                    }

                    .text-5x,
                    .text-4x,
                    .text-5x,
                    .text-2x,
                    .text-lg,
                    .text-sm,
                    .text-xs {
                        line-height: 1.25;
                    }

                    .btn-trans {
                        background-color: transparent;
                        border-color: transparent;
                        color: #929292;
                    }

                    .btn-icon {
                        padding-left: 9px;
                        padding-right: 9px;
                    }

                    .btn-sm,
                    .btn-group-sm>.btn,
                    .btn-icon.btn-sm {
                        padding: 5px 10px !important;
                    }

                    .btn-sm {
                        color: #fff;
                        background-color: #e53637;
                        font-size: 1rem;
                    }

                    .mar-top {
                        margin-top: 15px;
                    }

                    /* Added border style */
                    .main {
                        border: 1px solid #7b7b7b;
                        border-radius: 0px;
                        margin-bottom: 50px;
                        padding: 17px;
                    }
                    .main:hover {
                        background-colo:#7b7b7b;
                    }

                    .replies {
                        border: 1px solid #7b7b7b;
                        border-radius: 0px;
                        padding: 10px;
                        margin-bottom: 15px;
                    }

                    .mar-btm a {
                        font-size: 1.8rem;
                    }

                    .mar-btm p  {
                        margin-bottom:0px;
                    }
                    .mar-btm .mb-3 p:hover {
                        color:#e53637!important;
                    }

                    .text-muted {
                        font-size: 1.2rem;
                    }

                    .pad-ver {
                        justify-content: space-between;
                    }

                    .panel {
                        border-radius: 0px;
                        background-color: #070720;
                        border: 1px solid #7b7b7b;
                    }

                    .panel .form-control {
                        background-color: #1d1e39;
                        color: white;
                        border: none;
                        font-size: 1.4rem;
                        padding: 15px 15px 15px 8px;
                    }

                    .main p {
                        color: white;
                    }

                    .main .mb-3 a {
                        color: #7b7b7b;
                    }

                    .btn-sm,
                    .btn-trans {
                        font-size: small;
                    }
                    .btn-sm:hover{
                        color:white;
                    }
                    .spoiler{
                        background-color: #1d1e39;
                        padding: 15px;
                        border-radius: 5px;
                        color: #aeaeae;
                        margin-bottom: 28px;
                        display:none;
                    }

                    .btnSpoiler,.show,.btnSpoilers{
                        background-color:#070720;
                        border:none
                    }
                    .span{
                        display: flex;
                    }
                </style>

                <!--===================================================-->
                <div class="container">
                    <div style="display:flex;">
                    <?php
                        
                        $sql_discussion_forum = "SELECT *
                        FROM discussion d 
                        INNER JOIN utilisateur u ON d.id_utilisateur = u.id_utilisateur 
                        INNER JOIN manga m ON d.id_manga = m.id_manga 
                        WHERE d.id_discussion = {$_GET['id_disscusion']}";

                        $result_discussion_forum = mysqli_query($connection, $sql_discussion_forum);
                        if(mysqli_num_rows($result_discussion_forum)>0){
                            while($row_discussion_forum = mysqli_fetch_assoc( $result_discussion_forum)){

                                $user_discussion_forum = $row_discussion_forum['nom_utilisateur'];
                                $user_discussion_image = base64_encode($row_discussion_forum['image_utilisateur']);
                                $date_discussion_forum = $row_discussion_forum['date_creation_discussion'];
                                $name_manga_discussion_forum = $row_discussion_forum['nom_manga'];
                                $subject_discussion_forum = $row_discussion_forum['subject_discussion'];
                                $spoiler_discussion_forum = $row_discussion_forum['spoiler_discussion'];

                                echo'
                                <a class="media-left " href="#"><img class="img-sm mr-3" alt="Profile Picture" style="max-width: 110px; max-height: 111px;" 
                                    src="data:img/jpeg;base64,'.$user_discussion_image.'"></a>
                                    <div class="main pb-0">
                                        <div class="media-block ">
                                            <div class="media-body">
                                                <div class="mar-btm">
                                                    <div class="mb-3">
                                                        <p mb-0>'.$name_manga_discussion_forum.' <a href="#" class="">by '.$user_discussion_forum.'</a></p>
                                                        <div class="text-muted mt-2">'.$date_discussion_forum.'</div>
                                                    </div>
                                                </div>
                                                <p class="mb-5">'.$subject_discussion_forum.'
                                                </p>
                                                <P class="spoiler">
                                                '.$spoiler_discussion_forum.'
                                                </P>
                                                <div class="pad-ver d-flex">
                                                    <div class="span">
                                                        <a class="btn btn-sm ml-2" href="#go"><i class="fa-sharp fa-solid fa-reply"></i> reply</a>
                                                        <button class="btnSpoiler" onclick="showSpoiler()"><a class="btn btn-sm ml-2" href="#">Show spoiler</a></button>
                                                    </div>
                                                    <div class="pr-3">
                                                        <a class="btn btn-sm" href="#"><i class="fa-solid fa-circle-exclamation"></i> report</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                ';
                            }
                        }
                    ?>
                    <script>
                        function showSpoiler(){
                            var btnSpoiler = document.querySelector(".btnSpoiler");
                            var spoiler = document.querySelector(".spoiler");
                            spoiler.style.display="block";
                            btnSpoiler.classList.add("show");
                            if(btnSpoiler.classList.contains("show")){
                                btnSpoiler.innerHTML="";
                                btnSpoiler.innerHTML='<a class="btn btn-sm ml-2" href="#">Hide spoiler</a>';
                                btnSpoiler.setAttribute("onclick","hiddeSpoiler()");
                            }
                            

                        }
                        function hiddeSpoiler(){
                            var btnSpoiler = document.querySelector(".show");
                            var spoiler = document.querySelector(".spoiler");
                            spoiler.style.display="none";
                            btnSpoiler.classList.remove('show');
                            btnSpoiler.innerHTML = "";
                            btnSpoiler.innerHTML='<a class="btn btn-sm ml-2" href="#">Show spoiler</a>';
                            btnSpoiler.setAttribute("onclick","showSpoiler()");
                        }
                        
                    </script>
                        
                    </div>
                </div>

                <div class="container">
                    <div style="margin-left:85px;">
                    <?php
                        
                        $disscusion = $_GET["id_disscusion"];
                        $sql_discussion_forum_reply = "SELECT * 
                        FROM reply r
                        INNER JOIN utilisateur u ON r.id_utilisateur = u.id_utilisateur 
                        WHERE r.id_discussion = {$_GET['id_disscusion']}";

                        $result_discussion_forum_reply = mysqli_query($connection, $sql_discussion_forum_reply);
                        if(mysqli_num_rows($result_discussion_forum_reply)>0){
                            $i=0;
                            while ($row_discussion_forum_reply = mysqli_fetch_assoc($result_discussion_forum_reply)) {
                                $i++;
                            
                                $user_discussion_forum_reply = $row_discussion_forum_reply['nom_utilisateur'];
                                $user_discussion_image_reply = base64_encode($row_discussion_forum_reply['image_utilisateur']);
                                $date_discussion_forum_reply = $row_discussion_forum_reply['date_creation_commentaire'];
                                $subject_discussion_forum_reply = $row_discussion_forum_reply['description_commentaire'];
                                $spoiler_discussion_reply = $row_discussion_forum_reply['spoiler_commentaire'];
                            
                                echo '
                                    <div style="display:flex;">
                                        <a class="media-left " href="#"><img style="max-width: 110px; max-height: 111px;" class="img-sm mr-3" alt="Profile Picture" src="data:img/jpeg;base64,' . $user_discussion_image_reply . '"></a>
                                        <div class="main pb-0">
                                            <div class="media-block">
                                                <div class="media-body">
                                                    <div class="mar-btm">
                                                        <div class="mb-3">
                                                            <a href="#" class="">' . $user_discussion_forum_reply . '</a>
                                                            <div class="text-muted mt-2">' . $date_discussion_forum_reply . '</div>
                                                        </div>
                                                    </div>
                                                    <p class="mb-5">' . $subject_discussion_forum_reply . '</p>
                                                    <P class="spoiler" id="spoiler-' . $i . '">
                                                        ' . $spoiler_discussion_reply . '
                                                    </P>
                                                    <div class="pad-ver d-flex">
                                                        <div class="span">
                                                            <a class="btn btn-sm ml-2" href="#go"><i class="fa-sharp fa-solid fa-reply"></i> reply</a>
                                                            <button class="btnSpoilers" onclick="showSpoilers(' . $i . ')"><a class="btn btn-sm ml-2" href="#">Show spoiler</a></button>
                                                        </div>
                                                        <div class="pr-3">
                                                            <a class="btn btn-sm" href="#"><i class="fa-solid fa-circle-exclamation"></i> report</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                ';
                            }
                            
                            
                            }
                            ?>
                        
                    </div>
                    <script>
                        
                        function showSpoilers(spoilerId) {
                            var btnSpoiler = document.querySelector('#spoiler-' + spoilerId + ' + .pad-ver .btnSpoilers');
                            var spoiler = document.getElementById('spoiler-' + spoilerId);
                            spoiler.style.display = 'block';
                            btnSpoiler.classList.add('show');
                            if (btnSpoiler.classList.contains("show")) {
                                btnSpoiler.innerHTML = "";
                                btnSpoiler.innerHTML = '<a class="btn btn-sm ml-2" href="#">Hide spoiler</a>';
                                btnSpoiler.setAttribute("onclick", 'hideSpoilers("' + spoilerId + '")');
                            }
                        }   

                        function hideSpoilers(spoilerId) {
                            var btnSpoiler = document.querySelector('#spoiler-' + spoilerId + ' + .pad-ver .btnSpoilers');
                            var spoiler = document.getElementById('spoiler-' + spoilerId);
                            spoiler.style.display = 'none';
                            btnSpoiler.classList.remove('show');
                            if (!btnSpoiler.classList.contains("show")) {
                                btnSpoiler.innerHTML = "";
                                btnSpoiler.innerHTML = '<a class="btn btn-sm ml-2" href="#">Show spoiler</a>';
                                btnSpoiler.setAttribute("onclick", 'showSpoilers("' + spoilerId + '")');
                            }
                        }
                    </script>
                </div>

                <div class="container bootdey" id="go">
                    <div class="col-md-12 p-0 bootstrap snippets">
                        <div class="panel">
                            <div class="panel-body pb-5">
                                <form action="processe-manga.php" method="post">
                                    <textarea name="spoiler" class="form-control mb-4 " rows="2"
                                        placeholder="What are you thinking?"></textarea>
                                    <textarea name="content" class="form-control mb-4 " rows="2" placeholder="content"></textarea>
                                    <input type="hidden" name="id_disscusionReply" value="<?php echo $_GET["id_disscusion"];?>">
                                    <div class="mar-top clearfix">
                                        <button class="btn btn-sm float-right" name="send-reply" type="submit"><i class="fa-sharp fa-solid fa-paper-plane"></i> Send</button>
                                        <a class="btn btn-trans btn-icon fa fa-video-camera add-tooltip" href="#"></a>
                                        <a class="btn btn-trans btn-icon fa fa-camera add-tooltip" href="#"></a>
                                        <a class="btn btn-trans btn-icon fa fa-file add-tooltip" href="#"></a>
                                    </div>
                                </form>

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