<?php
include_once("header_template.php");
include_once("scripts/MenuItem.php");
include_once("scripts/getMenuItems.php");
?>
    <div id= "main_content" class="container">
      
      <h1>Recipes</h1>

      <div id="menu_items" class="container">
        
        <?php
                
          $menu = getMenuItems();


          foreach ($menu as $item){
           
        ?>
          <a class="card" style="" <?php echo "href=ingredients.php?itemID=$item->primaryKey&itemName=$item->name"?>>
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

  </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>