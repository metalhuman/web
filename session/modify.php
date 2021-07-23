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
    <form action="modifyProc.php?article_id=<?php echo $article['id'] ?>" method="POST">
        <table>
            <tr>
                <th>제목</th>
                <td><input type="text" name="title" value="<?php echo $article['title'] ?>"></td>
            </tr>
            <tr>
                <th>내용</th>
                <td><textarea name="content"><?php echo $article['content'] ?></textarea></td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit">수정</button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>