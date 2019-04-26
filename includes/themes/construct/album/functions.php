<?php




function countAllPhotosonalbum($id){
    global $link;
	$sql = "SELECT id FROM medias WHERE albumid='$id'";
    $allphoto = mysqli_num_rows(mysqli_query($link, $sql));
    return $allphoto;
}