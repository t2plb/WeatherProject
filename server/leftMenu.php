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
                    if($page != 'sonde'){
                        echo '<li><a href="index.php?page=sonde">Mes Sondes</a></li>';
                    }
                    ?>
                    <?php
                        if($page != 'sonde'):
                    ?>
                    <li>
                        <a href="index.php?page=sonde">Mes Sondes</a>
                    </li>
                    <?php
                    endif;
                    ?>
                    <li>
                        <a href="meteo.html">Graphiques</a>
                    </li>
                    <li>
                        <a >Contact</a>
                    </li>
                    <li>
                        <a >Aide</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>