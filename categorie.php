<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.6.22/dist/css/uikit.min.css" />
    <link href="assets/css/style.css" rel="stylesheet">
  
    <?php
       include_once 'cnx.php';
       $page = 'Home';
       
       include_once './controllers/login.php';
       include_once './controllers/signin.php';
       include_once "./controllers/categorie.php";
       include_once "./controllers/addtocart.php";
       include_once "./controllers/deletefromcart.php";
       include_once './elements/header.php';
       
    ?>
    <title>Ecom</title>
</head>
<body>
    <script>
    home();
    </script>
    <div id="root" align="center">
    </div>
    <div align='center' id="ro">
      
    </div>
    

        <center><h3>Welcome to the N7 shop <span class="uk-badge">+<?=$nbrArticle?> article</span></h3>
        <hr class="uk-width-1-2@s"> 
        <div class="uk-child-width-expand@s uk-width-1-2@s uk-text-center" uk-grid>
            <div>
                <a href="categorie.php?cat=<?= $_GET["cat"] ?>&page=<?= $pageCourante ?>&order=price&by=DESC" class="btn btn-primary btn-lg" role="button" aria-disabled="true">Prix decroissant</a>
            </div>
            <div>
            <a href="categorie.php?cat=<?= $_GET["cat"] ?>&page=<?= $pageCourante ?>&order=price&by=ASC" class="btn btn-primary btn-lg" role="button" aria-disabled="true">Prix croissant</a>
            </div>
        </div>
        </center>
        <ul style="display:inline" class="uk-pagination uk-margin" uk-margin>
            <li style="float: left;"><a href="categorie.php?cat=<?= $_GET["cat"] ?>&page=<?=$pageCourante-1?>" class="btn btn-primary btn-lg" role="button" aria-disabled="true"><< Page Precedente</a></li>
            <li style="float: right;"><a href="categorie.php?cat=<?= $_GET["cat"] ?>&page=<?=$pageCourante+1?>" class="btn btn-primary btn-lg" role="button" aria-disabled="true">Page Suivante >></a></li>
        </ul>
        
        <div align='left' id="divis" class="uk-grid-small uk-width-6-7 uk-child-width-1-2@s uk-child-width-1-5@l uk-text-center" uk-grid="parallax: 150">
            <?php if($checker>0){ while($a=$article->fetch()){ ?>
                <div>
                    <div class="uk-box-shadow-hover-large uk-card uk-card-default">
                        <div class="uk-card-media-top uk-cover-container">
                            <img src="<?=$a['image']?>" width="200px" height="100px" alt="<?=$a['name']?>">
                        </div>
                        <div class="uk-card-body">
                            <h5><?=$a['name'] ?></h5>
                            <small id="ar<?=$a['sku'] ?>"></small>
                            <b><?=$a['price'] ?>$</b>
                        </div>
                        <div class="uk-card-footer">
                        <a class="uk-button uk-button-primary" href="#modal-full<?=$a['sku']?>" uk-toggle><small>Add to cart</small></a>    
                        </div>
                    </div>
                </div>
                <div id="modal-full<?=$a['sku']?>" class="uk-modal-full" uk-modal>
                <div class="uk-modal-dialog">
                    <button class="uk-modal-close-full uk-close-large" type="button" uk-close></button>
                    <div class="uk-grid-collapse uk-child-width-1-2@s uk-flex-middle" uk-grid>
                        <div class="uk-background-cover" style="background-image: url(<?=$a['image']?>);" uk-height-viewport></div>
                        <div class="uk-padding-large">
                            <h1><?=$a['name'] ?></h1>
                            <p><?=$a['description'] ?></p>
                            <form method="post">    
                            <div class="uk-width-2-3@s">
                                <input <?php if(!isset($_SESSION['id'])) echo 'disabled' ?> required class="uk-input" name="qte" type="number" placeholder="Quantity">
                            </div> 
                            <input required name="id" type="hidden" value="<?=$a['sku'] ?>">
                            <?php if(isset($_SESSION['id']) && !empty($_SESSION['id'])){?>
                            <button class="uk-button uk-button-primary" type="submit">Add</button>
                            <?php }else{?>
                            <button class="uk-button uk-button-primary" onclick="login();">Connectez-vous en premier</button>
                            <?php }?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php  }} ?>
        </div>
        
        <ul class="uk-pagination" uk-margin>
            <li><a href="categorie.php?cat=<?= $_GET["cat"] ?>&page=<?=$pageCourante-1?>"><span uk-pagination-previous></span></a></li>
            <?php for($i=1;$i<=$pageTotal;$i++){
                if($i>7 && ($i%10!=0 || $i%20!=0)) echo '<li> </li>';else{?>
                
                <li><a href="categorie.php?cat=<?= $_GET["cat"] ?>&page=<?=$i?>"><?=$i?></a></li>
            <?php } }?>
            <li><a href="categorie.php?cat=<?= $_GET["cat"] ?>&page=<?=$pageCourante+1?>"><span uk-pagination-next></span></a></li>
        </ul>
        
        <script src="https://cdn.jsdelivr.net/npm/uikit@3.6.22/dist/js/uikit.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/uikit@3.6.22/dist/js/uikit-icons.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="./assets/js/scripts.js"></script>
    </body>

</html>