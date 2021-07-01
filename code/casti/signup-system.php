<?php 
    if (isset($_POST['sign-submit'])) {
         
        include('./db.php');

    $userName = $_POST['reg-name'];  
    $userEmail = $_POST['reg-email'];  
    $userPassword = $_POST['reg-password'];  
    $userPassAgain = $_POST['reg-again'];  

    if (empty($userName) || empty($userEmail) || empty($userPassword) || empty($userPassAgain)) {
        header("Location: ../index?events=emptyreg&reg-name=$userName&reg-email=$userEmail");
        exit();
    }
    elseif (!filter_var($userEmail, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $userName)) {
        header("Location: ../index?events=invalideemailname");
        exit();
    }
    elseif (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../index?events=invalideemail&reg-name=$userName");
        exit();
    }
    elseif (!preg_match("/^[a-zA-Z0-9]*$/", $userName)) {
        header("Location: ../index?events=invalidename&reg-email=$userEmail");
        exit();
    }
    elseif ($userPassword !== $userPassAgain){
        header("Location: ../index?events=passwordagainfail&reg-name=$userName&reg-email=$userEmail");
        exit();
    }
    else {

        $sql = "SELECT user_name FROM users WHERE user_name=? OR user_email=?;";
        $stmt = mysqli_stmt_init($connection);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../index?events=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "ss", $userName, $userEmail);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultControl = mysqli_stmt_num_rows($stmt);
            if ($resultControl >0){
                header("Location: ../index?events=usertaken");
                exit();
            }
            else {
                $sql = "INSERT INTO users (user_name, user_email, user_password) VALUES (?, ?, ?);";
                $stmt = mysqli_stmt_init($connection);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../index?events=sqlerror");
                    exit();
                }
                else {
                    $hashPassword = password_hash($userPassword, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "sss", $userName, $userEmail, $hashPassword);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../index?events=succesreg");
                    exit();
                }
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($connection);

    }
}
else {
        header("Location: ../index");
        exit();
}

