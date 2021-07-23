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

$title = mysqli_real_escape_string($connect, $_POST['title']);
$content = mysqli_real_escape_string($connect, $_POST['content']);

$sql = "UPDATE articles SET title = '{$title}', content = '{$content}' WHERE id = {$article['id']}";

$result = mysqli_query($connect, $sql);

if (mysqli_error($connect)) {
    echo '게시글 수정 중 오류가 발생했습니다';
    exit;
}

header("Location: view.php?article_id={$article['id']}");