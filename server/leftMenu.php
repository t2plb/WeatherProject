<?php
if(isset($_GET['page'])){
    $page = $_GET['page'];
} else {
    $page = null;
}
?>

<nav class="side-nav">
    <div class="wrapper">
        <div class="nav-bloc n-1">
            <img id="menuouvrant" src="lib/icon/icon_menu_ouvrant.png" alt="SoleilNuage" height="75%" width="75%">
            <div class="sub-nav">
                <h2>METEO</h2>
                <ul>
                    <?php
                        if($page != 'home')
                    ?>
                    <li>
                        <a href="index.php?page=home">Accueil</a>
                    </li>
                    <?php
                        if($page != 'sonde'):
                    ?>
                    <li>
                        <a href="#">Mes Sondes</a>
                    </li>
                    <?php
                    endif;
                    ?>
                    <?php
                        if($page != 'graphiques'):
                    ?>
                    <li>
                        <a href="index.php?page=graphiques">Graphiques</a>
                    </li>
                    <?php
                    endif;
                    ?>
                    <?php
                        if($page != 'contact'):
                    ?>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                    <?php
                    endif;
                    ?>
                    <?php
                        if($page != 'aide'):
                    ?>
                    <li>
                        <a href="#">Aide</a>
                    </li>
                    <?php
                    endif;
                    ?>
                </ul>
            </div>
        </div>
    </div>
</nav>