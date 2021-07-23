<?php
include "../lib.php";

$article_id = mysqli_real_escape_string($connect, $_GET['article_id']);

$sql = "SELECT * FROM articles WHERE id = {$article_id}";
$result = mysqli_query($connect, $sql);

if (!$result || mysqli_num_rows($result) == 0) {
    header('Location: list.php');
    exit;
}

$article = mysqli_fetch_assoc($result);

if ($_SESSION['user_id'] != $article['user_id']) {
    header('Location: list.php');
    exit;
}

$sql = "DELETE FROM articles WHERE id = {$article['id']}";

print_r($sql);

$result = mysqli_query($connect, $sql);

if (mysqli_error($connect)) {
    echo '게시글 삭제 중 오류가 발생했습니다';
    exit;
}

header('Location: list.php');
