<?
   
    include "../lib.php"; 

    $isLogin = $_SESSION['isLogin']; 

    
    if(!$isLogin){ 
        
        ?>

        로그인후 이용해 주세요. <br>
        <a href="login.php">로그인</a> <br>
        <a href="signup.php">회원가입</a><br>

    <? } ?> 