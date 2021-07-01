<?php
    
    if (isset($_POST['search-button'])){

    include('./db.php');
    $search = $_POST['search'];
    

    if (empty($search) ) {
        header("Location: ../informace?events=empty");
        exit();
    }
    else {
        $sql = "SELECT * FROM articles WHERE article_subject LIKE '%$search%';";
        $stmt = mysqli_stmt_init($connection);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../informace?events=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "s", $search);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($assoc = mysqli_fetch_assoc($result)) {
                $resultControl = mysqli_stmt_num_rows($stmt);
                if ($resultControl >= 0){
                    header("Location: ../informace?events=search&subject=$search");
                    exit();
                }
                else {
                    header("Location: ../informace?events=infnotexist");
                    exit();
                }
            }
            else {
                header("Location: ../informace?events=infnotexist");
                exit();
            }
        }
    }
    }
    else {
        header("Location: ../informace");
        exit();
    }