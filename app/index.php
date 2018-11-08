<?php
include("config.php");
include("scripts/MenuItem.php");
   //$db = mysqli_connect($db_host,$db_user,$db_pass,$db_name);
  session_start();
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Local CSS -->
    <link rel="stylesheet" href="css/style.css"

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"
    
    
  </head>
  <body>
    <div id="header_rectangle"> 
      <a id="login" class="btn btn-primary" href="login.php">Admin</a>
    </div>

    <div id= "main_content" class="container">
      
      <h1>Restaurant Menu</h1>

      <div id="menu_items" class="container">
        
        <?php
                
          $menu = new SplDoublyLinkedList();

          $menu->push(MenuItem::create()->setPrimaryKey("1")->setName("Polish Sandwich")->setImagePath("img/polish_sandwich.jpg"));
          $menu->push(MenuItem::create()->setPrimaryKey("2")->setName("Italian Sandwich")->setImagePath("img/polish_sandwich.jpg"));
          $menu->push(MenuItem::create()->setPrimaryKey("3")->setName("Frog Sandwich")->setImagePath("img/polish_sandwich.jpg"));
          $menu->push(MenuItem::create()->setPrimaryKey("3")->setName("Frog Sandwich")->setImagePath("img/polish_sandwich.jpg"));
          $menu->push(MenuItem::create()->setPrimaryKey("3")->setName("Frog Sandwich")->setImagePath("img/polish_sandwich.jpg"));
          $menu->push(MenuItem::create()->setPrimaryKey("3")->setName("Frog Sandwich")->setImagePath("img/polish_sandwich.jpg"));
          $menu->push(MenuItem::create()->setPrimaryKey("3")->setName("Frog Sandwich")->setImagePath("img/polish_sandwich.jpg"));


          foreach ($menu as $item){
           
        ?>
          <a class="card" style="" <?php echo "href=ingredients.php?id=$item->primaryKey.php"?>>
            <?php
              echo "<img class='card-img-top' src=$item->imagePath alt='Card image cap'>"
            ?>
              <div class="card-body">
              <?php
                echo "<h5 class='card-title'>$item->name</h5>"
              ?>
              </div>
          </a>
        <?php  
        }
        
        ?>
    </div>

    <div id="footer_spacer"></div>

      

      <div class="container" id= "footer">
        <div id="cart"> 
          <div id="total">
            Total: 42.58$ 
          </div>
        </div>
        <div class="container" id ="order-actions">
          <button type="button" class="btn btn-secondary">Cancel</button>
          <button type="button" class="btn btn-primary">Order</button>
        </div
        
      </div


  

  </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>