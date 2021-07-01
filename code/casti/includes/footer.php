<footer>
<div class="footer-line"><div class="line"></div></div>
        <div class="footer-content">
            <div class="left-col">
                <div class="social-icons">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href=""><i class="fab fa-youtube"></i></a>
                </div>
            </div>

            <div class="right-col">
            <?php
                if (!isset($_SESSION['user_name'])){
                echo '<div class="footer-nav">

                    <ul>
                        <li>
                            <a href="index">Domů</a>
                        </li>
                        <li>
                            <a href="kontakt">Kontakt</a>
                        </li>
                        <li>
                            <a href="informace">Informace</a>
                        </li>
                        
                    </ul>
                </div>';
}
            else {
                echo '<div class="footer-nav">

                                <ul>
                                    <li>
                                        <a href="index">Domů</a>
                                    </li>
                                    <li>
                                        <a href="kontakt">Kontakt</a>
                                    </li>
                                    <li>
                                        <a href="informace">Informace</a>
                                    </li>
                                    <li>
                                        <a href="priklady">Příklady</a>
                                    </li>
                                </ul>
                            </div>';
            }
            ?>
            </div>
        </div>    
    </footer>