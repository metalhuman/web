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

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th>제목</th>
            <td><?php echo $article['title'] ?></td> 
        </tr>
        <tr>
            <th>작성자</th>
            <td><?php echo getUserName($connect, $article['user_id']) ?></td> 
        </tr>
        <tr>
            <th>작성일</th>
            <td><?php echo $article['created_at'] ?></td> 
        </tr>
        <tr>
            <th>내용</th>
            <td><?php echo nl2br($article['content']) ?></td>
        </tr>
    </table>

    <a href="list.php">목록</a>
    <?php
        if ($article['user_id'] == $_SESSION['user_id']) {
    ?>
        <a href="modify.php?article_id=<?php echo $article['id'] ?>">수정</a>
        <a href="delete.php?article_id=<?php echo $article['id'] ?>" onclick="return confirm('정말 삭제하시겠습니까?')">삭제</a>
    <?php
        }
    ?>
</body>
</html>