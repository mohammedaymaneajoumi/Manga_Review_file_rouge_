<?php 
include "connectDB.php"; 
session_start();

if(isset($_GET["idManga"])){
    $idManga = $_GET["idManga"];
    header("Location:manga-details.php?id=".$idManga);
}
elseif(isset($_POST['to_add_like'])) {
    $id_likeUser = $_SESSION['id_utilisateur'];
    $id_cards_all = $_POST["idManga"];

    $sql_check_like = "SELECT * FROM likes WHERE id_utilisateur = '$id_likeUser' AND id_manga = '$id_cards_all'";
    $result_check_like = mysqli_query($connection, $sql_check_like);

    if(mysqli_num_rows($result_check_like) === 0) {
        
        $sql_add_like = "INSERT INTO likes (`id_utilisateur`, `id_manga`) VALUES ('$id_likeUser', '$id_cards_all')";
        mysqli_query($connection, $sql_add_like);
        if(mysqli_query($connection, $sql_add_like) === TRUE){
            header("Location:manga-details.php?id=$id_cards_all");
        }
    } else {
        $sql_delete_like = "DELETE FROM likes WHERE id_utilisateur = '$id_likeUser' AND id_manga = '$id_cards_all'";
        
        if(mysqli_query($connection, $sql_delete_like)){
            header("Location:manga-details.php?id=$id_cards_all");
        }
    }
}
elseif(isset($_POST['review'])) {
    $id_manga_review = $_POST['id'];
    $review_content = $_POST['content'];
    $review_note = $_POST['notereview']; 
    $id_user = $_SESSION['id_utilisateur'];            
    $sql_review = "INSERT INTO `review`(`description_critique`, `note_critique`, `id_utilisateur`, `id_manga`) VALUES ('$review_content', '$review_note', '$id_user', '$id_manga_review')";
    $resultat_review = mysqli_query($connection, $sql_review);
    if($resultat_review){
        header("Location:manga-details.php?id=$id_manga_review");
    }

}
?>

<?php
    if(isset($_POST['send-reply'])){
        $spoiler = $_POST['spoiler'];
        $content = $_POST['content'];
        $reply_iddisc_manga = $_POST['id_disscusionReply'];
        $reply_iduser_manga = $_SESSION['id_utilisateur'];

        $sql_insert_reply = "INSERT INTO `reply` (`description_commentaire`,`spoiler_commentaire`,`id_discussion`,`id_utilisateur`) VALUES ('$content','$spoiler','$reply_iddisc_manga','$reply_iduser_manga')";
        $result_insert_reply = mysqli_query($connection, $sql_insert_reply);

        if($result_insert_reply){
            header('Location:forum-details.php?id_disscusion='.$reply_iddisc_manga.'');
        }

    }
?>

<?php 
    if(isset($_POST["disscusion"])){
        $MangaID =$_POST["ADDdisscusion"];
        $mangaName = $_POST["nom_manga"];
        $addComment=$_POST["addComment"];
        $spoiler=$_POST["spoiler"];

        $SQL = "INSERT INTO `discussion`(`titre_discussion`, `subject_discussion`, `spoiler_discussion`, `id_utilisateur`, `id_manga`) VALUES('$mangaName','$addComment','$spoiler',{$_SESSION['id_utilisateur']},'$MangaID')";
        $query = mysqli_query($connection,$SQL);
        if($query){
            header("location:manga-details.php?id=".$MangaID);
        }
    }
?>