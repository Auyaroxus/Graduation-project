<section>
            <div class="sect-search">
                <form class="search-form"  method="POST" action="./casti/search">
                    <input class="search-input" type="text" name="search" placeholder="hledat">
                    <div class="search-button">
                    <button name="search-button">hledat</button>
                    </div>
                </form>
            </div>
        </section>

        <section>
            <div class="sect-art">
                <div class="container">
                    <?php 
                        include('./casti/db.php'); 
                    if (!isset($_GET['events']))   {  
                            if (isset($_GET['id'])) {
                            $id = mysqli_real_escape_string($connection, $_GET['id']);
                            $sql = "SELECT * FROM articles WHERE article_id='$id';";
                            $result = mysqli_query($connection, $sql);
                            $resultControl = mysqli_num_rows($result);


                                if ($resultControl > 0) {
                                    while($assoc = mysqli_fetch_assoc($result)) {
                                        $id = mysqli_real_escape_string($connection, $_GET['id']);
                                        $subject = $assoc['article_subject'];
                                        echo "<h2>$subject</h2>";
                                        $sql = "SELECT * FROM articles JOIN article_content ON connect_id = article_id AND article_id = $id;";
                                        $result = mysqli_query($connection, $sql);
                                        $resultControl = mysqli_num_rows($result);
                                        if ($resultControl > 0){
                                            while($assoc = mysqli_fetch_assoc($result)){

                                                $content1 = $assoc['content_1'];
                                                $content2 = $assoc['content_2'];
                                                $content3 = $assoc['content_3'];
                                                $content4 = $assoc['content_4'];
                                                $content5 = $assoc['content_5'];
                                                $content6 = $assoc['content_6'];
                                                
                                                echo "<div class='article-content'>$content1</div>";
                                                echo "<div class='article-content'>$content2</div>";
                                                echo "<div class='article-content'>$content3</div>";
                                                echo "<div class='article-content'>$content4</div>";
                                                echo "<div class='article-content'>$content5</div>";
                                                echo "<div class='article-content'>$content6</div>";
                                            }
                                        }
                                        echo '<div class="sect-a"><a href="informace">Zpět</a></div>';
                                    }
                                }
                                else {
                                    header('Location: ./informace');
                                }
                            }
                            else {
                                $sql = "SELECT * FROM articles;";
                                $result = mysqli_query($connection, $sql);
                                $resultControl = mysqli_num_rows($result);
                                echo '<div class="sect-menu">';
                                    if ($resultControl >0) {
                                        while ($assoc = mysqli_fetch_assoc($result)) {
                                                $id = $assoc['article_id'];
                                                $subject = $assoc['article_subject'];
                                                echo "<a href='informace?id=$id'>$subject</a><br>";
                                        }
                                    }
                                echo '</div>';
                            } 
                        }
                        else {
                            $eventCheck = $_GET['events'];
                            if ($eventCheck == 'empty'){
                                echo '<p>Nic jste nezadali.</p>';
                            }
                            elseif ($eventCheck == 'infnotexist') {
                                echo '<p>Nalzeneno 0 Článků s tímto názvem.</p>';
                            }
                            elseif ($eventCheck == 'sqlerror'){
                                echo 'Error';
                            }
                            elseif ($eventCheck == 'search') {
                                $subject = $_GET['subject'];
                                $sql = "SELECT * FROM articles WHERE article_subject LIKE '%$subject%';";
                                $result = mysqli_query($connection, $sql);
                                $resultControl = mysqli_num_rows($result);
                                echo "Nalezeno $resultControl Čláků. <br>";
                                echo '<div class="sect-menu">';
                                if ($resultControl >0) {
                                            
                                    while ($assoc = mysqli_fetch_assoc($result)) {
                                            $id = $assoc['article_id'];
                                            $subject = $assoc['article_subject'];
                                            echo "<a href='informace?id=$id'>$subject</a><br>";
                                    }
                                }
                            echo '</div>';
                            }
                        }
                    ?>
                </div>
            </div>
        </section>
        