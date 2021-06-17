<?php
    if(isset($_SESSION['id'])){
        $panier = $bdd->query('SELECT * FROM panier WHERE id_user='.$_SESSION['id']);
        $cart = $panier->rowCount();
    }
?>
<nav class="uk-navbar-container uk-margin-bottom " uk-navbar="mode: click">

        <div class="uk-navbar-left">
            <div>
                <ul class="uk-navbar-nav">
                    <li id='home' class="uk-active"><a type="button" href="index.php">Home</a></li>
                    <li id='Categorie'>
                    <a type="button" onclick="about()">Categorie</a>
                        <div class="uk-navbar-dropdown">
                            <ul class="uk-nav uk-navbar-dropdown-nav">
                            <li>
                                <?php
                                    $cat = $bdd->query('SELECT * FROM categorie');
                                    while($c=$cat->fetch()){
                                        echo '<a href="categorie.php?cat='.$c['id'].'">'.$c['name'].'</a>';
                                    }
                                ?>
                                
                            </li>
                            </ul>
                        </div>
                    </li>
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
                    <li><a href="#"><span uk-icon="icon: cart; ratio:1.5"></span><span class="uk-label uk-label-warning"><small><?=$cart?></small></span></a>
                        <div class="uk-navbar-dropdown">
                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                <li>
                                    <?php
                                        $pan = $bdd->query('SELECT P.name,pn.id_art,pn.id_user FROM panier pn,products P, users u WHERE id_art = sku and id_user = u.id and id_user ='. $_SESSION['id']);
                                        while($pn=$pan->fetch()){
                                            echo '<a href="index.php?del1='.$pn["id_user"].'&del2='.$pn["id_art"].'">'.$pn['name'].'</a>';
                                        }
                                    ?>
                                </li>
                            </ul>
                        </div>
                    </li>
                <?php }else{?>
                    <li id='log'><a type="button" onclick="login()">Login</a></li>
                    <li id='sign'><a type="button" onclick="sign()">Sign in</a></li>
                <?php }?>
                </ul>
            </div>
        </div>


</nav>