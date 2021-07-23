<?php
include "../lib.php";

$uid = $_POST['uid'];
$pwd = $_POST['pwd'];
$name = $_POST['name'];

$uid = mysqli_real_escape_string($connect,$uid); 
$pwd = mysqli_real_escape_string($connect,$pwd); 
$name = mysqli_real_escape_string($connect,$name); 

$sql = "
    INSERT INTO members
    (uid, pwd, name)
    VALUES('{$uid}', PASSWORD('{$pwd}'), '{$name}'
    )";
// echo $sql;
$result = mysqli_query($connect, $sql);

if ($result === false) {
    echo "저장에 문제가 생겼습니다. 관리자에게 문의해주세요.";
    echo mysqli_error($connect);
} else {
?>
    <script>
        alert("회원가입이 완료되었습니다");
        location.href = "index.php";
    </script>
<?php
}
?>