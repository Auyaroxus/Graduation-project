<?php 

if (isset($_POST['log-submit'])) {

    include('./db.php');

    $userName = $_POST['log-name'];
    $userPassword = $_POST['log-password'];

    if (empty($userName) || empty($userPassword)) {
        header("Location: ../index?events=empty");
        exit();
    }
    else {
        $sql = "SELECT * FROM users WHERE user_name=?;";
        $stmt = mysqli_stmt_init($connection);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../index?events=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "s", $userName);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($assoc = mysqli_fetch_assoc($result)) {
                $passwordControl = password_verify($userPassword, $assoc['user_password']);
                if ($passwordControl == false) {
                    header("Location: ../index?events=wrongpassword&username=$userName");
                    exit();
                }
                elseif ($passwordControl == true){
                    session_start();
                    $_SESSION['user_password'] =  $assoc['user_password'];
                    $_SESSION['user_name'] =  $assoc['user_name'];
                    
                    header("Location: ../index?events=succes");
                    exit();
                }
                else {
                    header("Location: ../index?events=wrongpassword");
                    exit();
                }
            }
            else {
                header("Location: ../index?events=notexist");
                exit();
            }
        }
    }


}
else {
    header("Location: ../index");
    exit();
}

