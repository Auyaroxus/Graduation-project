<section class="log-sect">
                <div class="log-reg">
                        <div class="right">
                                <?php  
                                if (isset($_SESSION['user_name'])) {
                                        echo '<div class="tabs">
                                                        <h2 class="text-h2"><h2>Vítejte</h2></h2>
                                                </div>';
                                        echo '
                                        <form action="./casti/logout-system.php">
                                                <div class="btn">
                                                        <button type="submit" name="logout-submit">Log out</button>
                                                        </div>
                                                </div>
                                        ';
                                }
                                else {
                                        echo '<div class="tabs">
                                                        <ul>
                                                <li class="register_li">Register</li>
                                                <li class="login_li">Login</li>
                                                        </ul>
                                                </div>';
                                        echo '<form action="./casti/login-system.php" class="login" method="POST">';
                                        if (isset($_GET['username'])) {
                                                $userName = $_GET['username'];
                                                echo '<div class="inputs">
                                                <input type="text" placeholder="Jmeno" class="input" name="log-name" value = "'.$userName.'">
                                                </div>';
                                        }
                                        else {
                                                echo '<div class="inputs">
                                                <input type="text" placeholder="Jmeno" class="input" name="log-name">
                                                </div>';
                                        }
                                                echo '<div class="inputs">
                                                <input type="password" placeholder="Heslo" class="input" name="log-password">
                                                </div>

                                                <div class="btn">
                                                <button name="log-submit" type="submit">Login</button>
                                                </div>';
                                                echo '</form>';

                                                echo'<form action="./casti/signup-system.php" class="register" method="POST">';
                                        
                                                if (isset($_GET['reg-email'])) {
                                                $userEmail = $_GET['reg-email'];
                                                echo '
                                                        <div class="inputs">
                                                        <input type="email" placeholder="Email" class="input" name="reg-email" value = "'.$userEmail.'">
                                                        </div>' ;                      

                                                }
                                                else {
                                                        echo '<div class="inputs">
                                                        <input type="email" placeholder="Email" class="input" name="reg-email">
                                                        </div>';
                                                                
                                                }
                                                if (isset($_GET['reg-name'])){
                                                        $userName = $_GET['reg-name'];
                                                        echo '<div class="inputs">
                                                        <input type="text" placeholder="Jmeno" class="input" name="reg-name" value="'.$userName.'">
                                                        </div>';
                                                }
                                                else {
                                                        echo '<div class="inputs">
                                                        <input type="text" placeholder="Jmeno" class="input" name="reg-name">
                                                        </div>';    
                                                }
                                                echo  '    <div class="inputs">
                                                                <input type="password" placeholder="Heslo" class="input" name="reg-password">
                                                        </div>

                                                        <div class="inputs">
                                                                <input type="password" placeholder="Heslo znovu" class="input" name="reg-again">
                                                        </div>
                                                        
                                                        
                                                        <div class="btn">
                                                        <button name="sign-submit" type="submit" id="button-reg">Register</button>
                                                        </div>';

                                                echo '</form>';
                                }
                                ?>

                        <?php
                            if(!isset($_GET['events'])){  
                                   
                            }
                            else {
                                $eventCheck = $_GET['events'];
                                if ($eventCheck == 'wrongpassword') {
                                    echo '<p class="form-check">Špatné heslo.</p>';
                                }
                                elseif ($eventCheck == 'notexist') {
                                    echo '<p class="form-check">Uživatel s tímto jménem neexistuje.</p>';
                                }
                                elseif ($eventCheck == 'empty'){
                                        echo '<p class="form-check">Vyplňte celý formulář.</p>';
                                }
                                elseif ($eventCheck == 'sqlerror'){
                                        echo '<p class="form-check">Error.</p>';
                                }
                                elseif ($eventCheck == 'usertaken'){
                                        echo '<p class="form-check">Toto jméno nebo email už někdo používá.</p>';
                                }
                                elseif ($eventCheck == 'sqlerror'){
                                        echo '<p class="form-check">Error.</p>';
                                }
                                elseif ($eventCheck == 'succesreg'){
                                        echo '<p class="form-check">Úspěšně zaregistrován.</p>';
                                }
                                elseif ($eventCheck == 'succesreg'){
                                        echo '<p class="form-check">Úspěšně zaregistrován.</p>';
                                }
                                elseif ($eventCheck == 'passwordagainfail'){
                                        echo '<p class="form-check">Zadaná hesla se neshodují.</p>';
                                }
                                elseif ($eventCheck == 'invalidename'){
                                        echo '<p class="form-check">Pro jméno použíte prosím pouze obyčejné znaky.</p>';
                                }
                                elseif ($eventCheck == 'invalideemail'){
                                        echo '<p class="form-check">Prosím zadejte validní email.</p>';
                                }
                                elseif ($eventCheck == 'invalideemailname'){
                                        echo '<p class="form-check">Prosím zadejte validní email a jméno.</p>';
                                }
                                elseif ($eventCheck == 'emptyreg'){
                                        echo '<p class="form-check">Vyplňte celý formulář.</p>';
                                        
                                }
                        }

                                ?>
                                
                        </div>
                </div>
            </section>