<section>
                <div class="cont-sect">
                                <h2>Kontakt</h2>
                        <div class="text">
                                <p class="text-text">Pokud jste narazili na nějakou chybu nebo máte nějakou připomínku neváhejte a kontaktujte mě.</p>
                        </div>
                        <form class="cont-form" action="./casti/kontakt-form.php" method="POST">
                                <input class="cont-txt" type="email" name="cont-email" placeholder="Email">
                                <?php
                                    if (isset($_GET['name'])){
                                        $name = $_GET['name'];
                                        echo '<input class="cont-txt" type="text" name="cont-name" placeholder="Jméno" value="'.$name.'">';
                                    }
                                    else {
                                        echo '<input class="cont-txt" type="text" name="cont-name" placeholder="Jméno">';
                                    }

                                    if (isset($_GET['subject'])){
                                        $subject = $_GET['subject'];
                                        echo '<input class="cont-txt" type="text" name="cont-subject" placeholder="Předmět" value="'.$subject.'">';
                                    }
                                    else {
                                        echo '<input class="cont-txt" type="text" name="cont-subject" placeholder="Předmět">';
                                    }

                                    if (isset($_GET['message'])){
                                        $message = $_GET['message'];
                                        echo '<textarea class="cont-txt" name="cont-mess" placeholder="Vaše zpráva">'.$message.'</textarea>';
                                    }
                                    else {
                                        echo '<textarea class="cont-txt" name="cont-mess" placeholder="Vaše zpráva"></textarea>';
                                    }
                                ?>
                                <button class="cont-btn" name="submit" type="submit">Odeslat</button>

                                <?php
                            if(!isset($_GET['event'])){  
                            }
                            else {
                                $eventCheck = $_GET['event'];
                                if ($eventCheck == 'empty') {
                                    echo '<p class="form-check">Prosím vyplňte celý formulář.</p>';
                                    
                                }
                                elseif ($eventCheck == 'email') {
                                    echo '<p class="form-check">Zadaný email neexistuje.</p>';
                                    
                                }
                                elseif ($eventCheck == 'send')
                                    echo '<p class="form-check">Vaše zpráva byla odeslána.</p>';
                                    
                            }

                                ?>
                        </form>
                        
                </div>
</section>  