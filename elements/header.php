<?php
    if(isset($_SESSION['id'])){
        $panier = $bdd->query('SELECT * FROM panier WHERE id_user='.$_SESSION['id']);
        $cart = $panier->rowCount();
    }
?>

<nav class="navbar navbar-dark bg-primary">
<div class="uk-navbar-left">    
                <ul class="uk-navbar-nav">
                    <li id='home' class="uk-active"><a type="button" onclick="home()">Home</a></li>
                    <li id='Categorie'><a type="button" onclick="about()">Categorie</a></li>
                </ul>
            </div>
        </div>
     
        <div class="uk-navbar-right">
            <div>
                <ul class="uk-navbar-nav">
                <?php 
                if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
                ?>
                    <li>
                        <a href="#"><?=$_SESSION['username']?></a>
                        <div class="uk-navbar-dropdown">
                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                <li><a href="./controllers/deconnexion.php">Logout</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><a href="#"><span uk-icon="icon: cart; ratio:1.5"></span><span class="uk-label uk-label-warning"><small><?=$cart?></small></span></a></li>
                <?php }else{?>
                    <li id='log'><a type="button" onclick="login()">Login</a></li>
                    <li id='sign'><a type="button" onclick="sign()">Sign in</a></li>
                <?php }?>
                </ul>
            </div>
</nav>