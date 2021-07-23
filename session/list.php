<?php
    include "../lib.php";
 
    
    $isLogin = $_SESSION['isLogin'];

    if(!$isLogin){
        echo "회원만 접근 가능합니다.";
        exit; 
    }
    
    $sql = "SELECT * FROM articles ORDER BY created_at DESC";

    $result = mysqli_query($connect, $sql);

    $articles = [];

    while($row = mysqli_fetch_assoc($result)) {
        $articles[] = $row;
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
    <a href="write.php">작성</a>
    <a href="logOut.php">로그아웃</a> 
    <table>
        <thead>
            <tr>
                <th>번호</th>
                <th>제목</th>
                <th>작성자</th>
                <th>작성일</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($articles as $article) {
            ?>
                <tr>
                    <td><?php echo $article['id']; ?></td>
                    <td><a href="view.php?article_id=<?php echo $article['id']; ?>"><?php echo $article['title']; ?></a></td>
                    <td><?php echo getUserName($connect, $article['user_id']); ?></td>
                    <td><?php echo $article['created_at']; ?></td>
                </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</body>
</html>