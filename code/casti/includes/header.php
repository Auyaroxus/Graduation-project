    
    
    
    
    <header>
        <nav>
            <?php 
                if (!isset($_SESSION['user_name'])) {
                    echo '
                    <div class="menu-icon">
                                    <i class="fa fa-bars"></i>
                            </div>
                            <div class="menu-logo">
                                                    <h1>Fyzika</h1>
                            </div>
                            <div class="menu">
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
                    echo '
                        <div class="menu-icon">
                                    <i class="fa fa-bars"></i>
                            </div>
                            <div class="menu-logo">
                                        <h1>Fyzika</h1>
                            </div>
                            <div class="menu">
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
              
        </nav>
    </header>