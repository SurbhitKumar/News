<?php
include "config.php";
$post_id = $_GET['id'];
$cat_id = $_GET['catid'];
$sql1 = "SELECT* FROM post where post_id = {$post_id}";
$result = mysqli_query($conn, $sql1) or die ("query failed : select");
$sql = "DELETE FROM post where post_id = {$post_id};";
$sql .= "UPDATE category set post= post - 1 where category_id = {$cat_id};";
$row = mysqli_fetch_assoc($result);
unlink("upload/".$row['post_img']);
if (mysqli_multi_query($conn, $sql)) {
header("location: {$hostname}/admin/post.php");
}
else {
echo "Query Failed";
}
?>