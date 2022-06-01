<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Météo</title>
    <link rel="icon" type="image/png" sizes="512x512" href="lib/icon/icon_onglet.png">
    <link rel="stylesheet" href="lib/css/style_index.css">
    <link rel="stylesheet" href="lib/css/style_sidenav.css">
</head>
<body>
<?php
require_once 'leftMenu.php';
?>

<main class="main-content">
    <?php
        if(isset($_GET['page'])){
            switch ($_GET['page']){
                case 'sonde':

                    break;
                case 'graphique':
                    require_once 'pages\graph.php';
                    break;
                case 'contact':

                    break;
                case 'aide':

                    break;
                default:
                    require_once 'pages\index.php';
                    break;
            }
        } else {
            require_once 'pages\index.php';
        }
    ?>

</main>
</body>

</html>