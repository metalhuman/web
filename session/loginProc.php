<?php
    include "../lib.php";

    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];

    $uid = mysqli_real_escape_string($connect,$uid); 
    $pwd = mysqli_real_escape_string($connect,$pwd); 

    $query = "select * from members where uid='$uid' and pwd=password('$pwd') ";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result);

    if(mysqli_num_rows($result) == 1) {
        $_SESSION['isLogin'] = time(); 
        $_SESSION['user_id'] = $row['id'];
?>
    <script>
        location.href = 'list.php';
    </script>
<?php 
    }else{

        echo "로그인정보가 올바르지 않습니다.";
    }

    ?>