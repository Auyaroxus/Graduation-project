

    
        <section>
            <div class="sect-art">
                <div class="container">
                    <?php 
                    if (!isset($_SESSION['user_name'])) {
                    }
                    else {
                   
                            include('./casti/db.php'); 
                
                        if (isset($_GET['id'])) {

                        $id = mysqli_real_escape_string($connection, $_GET['id']);
                        $sql = "SELECT * FROM examples WHERE example_id='$id';";
                        $result = mysqli_query($connection, $sql);
                        $resultControl = mysqli_num_rows($result);

                        echo '<div class="sect-test">';
                        if ($resultControl > 0) {
                            while($assoc = mysqli_fetch_assoc($result)) {
                                $subject = $assoc['example_subject'];
                                $content = $assoc['example_content'];
                                $res = $assoc['example_result'];
                                $id = $assoc['example_id'];

                                echo "<h2>$subject</h2>";
                                echo $content;
                                echo '<div class="sect-a"><a href="priklady">Zpět</a></div>';

                                echo  "<form class='form-ans' action='./casti/count?id=$id' method='POST'>
                                            <input class='inp-ans' type='text' name='result'>
                                            <button class='btn-ans' name='Submit-count'>Odeslat</button>
                                        </form>";
                                
                            }
                            echo '</div>';
                        }
                        else {
                            header('Location: ./priklady');
                        }
                        }
                        else {
                            $sql = "SELECT * FROM examples;";
                            $result = mysqli_query($connection, $sql);
                            $resultControl = mysqli_num_rows($result);
                            echo '<div class="sect-test">';
                                if ($resultControl >0) {
                                    while ($assoc = mysqli_fetch_assoc($result)) {
                                        $id = $assoc['example_id'];
                                        $subject = $assoc['example_subject'];
                                            echo "<a href='priklady?id=$id'>$subject</a><br>";
                                            
                                    }
                                }
                            echo '</div>';
                        } 


                        if (!isset($_GET['event'])){
                        }
                        else{
                            $eventCheck = $_GET['event'];
                            if ($eventCheck == 'empty'){
                                echo '<p class="result-check">Prázdný formulář.</p>';
                            }
                            elseif ($eventCheck == 'resultnotexist'){
                                echo '<p class="result-check">Error.</p>';
                            }
                            elseif ($eventCheck == 'wronganswer'){
                                echo '<p class="result-check">Špatná odpověd.</p>';
                                $id = mysqli_real_escape_string($connection, $_GET['id']);
                                $sql = "SELECT example_postup FROM examples WHERE example_id = $id";
                                $result = mysqli_query($connection, $sql);
                                $resultControl = mysqli_num_rows($result);

                                if ($resultControl > 0){
                                    while($assoc = mysqli_fetch_assoc($result)){
                                            $postup = $assoc['example_postup'];

                                            echo "<div class='example'>
                                                <div class='postup'><p class='exa-btn'>Postup</p></div>
                                                <div class='example-postup'>$postup</div>
                                                </div>";
                                    }
                                }
                            }
                            elseif ($eventCheck == 'correctanswer'){
                                echo '<p class="result-check">Správná odpověd</p>';
                            }
                        }
                        
                    }
                    
                         
                    
                
                    ?>
                </div>
            </div>
        </section>
        