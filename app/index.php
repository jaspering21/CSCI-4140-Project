<?php
include("header_template.php");
include("scripts/MenuItem.php");

echo "
    <div id= \"main_content\" class=\"container\">  
      <h1>Restaurant Menu - Table "; echo $_SESSION["tableID"]; echo "</h1>
      
      <form action=\"scripts/PlaceOrderScript.php\" method=\"post\">

        <div id=\"menu_items\" class=\"container\">
          ";
        
                  
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
            <a class="card" style="">
              <?php
                echo "<img class='card-img-top' src=$item->imagePath alt='Card image cap'>";
              ?>
                <div class="card-body">
                <?php
                  echo "<h5 class='card-title'>$item->name</h5>";
                ?>

                <div class="input-group number-spinner">
                    <span class="input-group-btn">
                      <button type="button" class="btn btn-default" data-dir="dwn"><span class="glyphicon glyphicon-minus"> - </span></button>
                    </span>
                    <input type="text" name=<?php $postVariable = $item->encodePostVariable($item->primaryKey); echo "$postVariable"; ?>  class="form-control text-center" value=0>
                    <span class="input-group-btn">
                      <button type="button" class="btn btn-default" data-dir="up"><span class="glyphicon glyphicon-plus"> + </span></button>
                    </span>
                  </div>
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
            <input type="submit" role="button" value="Order" class="btn btn-primary"></input>
          </div>
          
        </div>
      </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


    <script>
        $(document).on('click', '.number-spinner button', function () {    
      var btn = $(this),
        oldValue = btn.closest('.number-spinner').find('input').val().trim(),
        newVal = 0;
      
      if (btn.attr('data-dir') == 'up') {
        newVal = parseInt(oldValue) + 1;
      } else {
        if (oldValue > 0) {
          newVal = parseInt(oldValue) - 1;
        } else {
          newVal = 0;
        }
      }
      btn.closest('.number-spinner').find('input').val(newVal);
    });

</script>
  </body>
</html>