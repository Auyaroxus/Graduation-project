<?php
    include('./db.php');

if (isset($_POST['Submit-count'])) {
        $resultNumber = $_POST['result'];
        $resultId = $_GET['id'];
        if (empty($resultNumber)) {
            header("Location: ../priklady?id=$resultId&event=empty");
            exit();
        }
        else {
            $sql = "SELECT * FROM examples WHERE example_id=$resultId;";
            $stmt = mysqli_stmt_init($connection);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../priklady?id=$resultId&event=resultnotexist");
                exit();
            }
            else {
                mysqli_stmt_bind_param($stmt, "s", $resultNumber);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if ($assoc = mysqli_fetch_assoc($result)){
                        $dataResult = $assoc['example_result'];
                        if ($dataResult == $resultNumber) {
                            header("Location: ../priklady?id=$resultId&event=correctanswer");
                            exit();
                        }
                        else {
                            header("Location: ../priklady?id=$resultId&event=wronganswer");
                            exit();
                        }
                }
                else {
                    header("Location: ../priklady?id=$resultId&event=resultnotexist");
                    exit();
                }
            }
        }
}
else {
    header('Location: ../priklady');
    exit();  
}



