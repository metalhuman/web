<?php
include "../lib.php";

$title = mysqli_real_escape_string($connect, $_POST['title']);
$content = mysqli_real_escape_string($connect, $_POST['content']);

$sql = "INSERT INTO articles (`user_id`, `title`, `content`) VALUES ('{$_SESSION['user_id']}', '{$title}', '{$content}')";

$result = mysqli_query($connect, $sql);

if (mysqli_error($connect)) {
    echo '게시글 작성 중 오류가 발생했습니다';
    exit;
}

$article_id = mysqli_insert_id($connect);

header("Location: view.php?article_id={$article_id}");