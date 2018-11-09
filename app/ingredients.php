<?php
	include("session.php");

  $menu_item = "Polska Sandwich";
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"
  </head>

  <?php
echo  <<<EOL

  <body>
    <div class="container">
        <h1>$menu_item </h1>

        <ul class="list-group">

EOL;

  include("scripts/Ingredient.php");

  $cheddar = Ingredient::create()->setName("Cheddar Cheese")->setQuantity("200")->setUnit("g");
  $pickles = Ingredient::create()->setName("Bread and Butter Pickles")->setQuantity("2");
  $fish = Ingredient::create()->setName("Red Snapper")->setQuantity("100")->setUnit("g");
  $ingredients = new SplDoublyLinkedList();
  $ingredients->push($cheddar);
  $ingredients->push($pickles);
  $ingredients->push($fish);
  
  foreach ($ingredients as $ingredient){
    echo "<li class='list-group-item'>$ingredient->quantity$ingredient->unit $ingredient->name</li>";
  }
  ?>
  
        </ul>
    </div>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>