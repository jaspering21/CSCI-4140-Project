<?php
include_once("header_template.php");
include_once("scripts/MenuItem.php");
include_once("scripts/getMenuItems.php");


echo "
    <div id= \"main_content\" class=\"container\">  
      <h1>Restaurant Menu - Table "; echo $_SESSION["tableID"]; echo "</h1>
      
      <form action=\"scripts/PlaceOrderScript.php\" method=\"post\">
        <div id=\"menu_items\" class=\"container\">
          ";
      
            $menu = getMenuItems();

            foreach ($menu as $item){
             
          ?>
            <a class="card menu-item-card" style="">
              <?php
                echo "<img class='card-img-top' src=$item->imagePath alt='Card image cap'>";
              ?>
                <div class="card-body">
                <?php
                  echo "
                  <h5 class='card-title'>$item->name</h5><h5 class='card-title menu-item-price'>
                  \$$item->price</h5>";
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
            <div id="price-total">
              <input type='hidden' id='post-price-value' name='totalPrice' value='0'>
              <span>Total: $</span><span id= "price-value">0</span> 
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
      var totalPrice = 0.00;
      /*Updates counts of menu items for spinners as well as price total*/
        $(document).on('click', '.number-spinner button', function () {    
      var btn = $(this),
        oldValue = btn.closest('.number-spinner').find('input').val().trim(),
        newVal = 0;
        var card = btn.closest('.menu-item-card');
        var price = Number(card.find('.menu-item-price').text().trim().replace('$', ''));
        
      if (btn.attr('data-dir') == 'up') {
        newVal = parseInt(oldValue) + 1;
        totalPrice +=price;
      } else {
        if (oldValue > 0) {
          newVal = parseInt(oldValue) - 1;
          totalPrice -=price;
        } else {
          newVal = 0;
        }
      }
      $('#price-value').html(totalPrice);
      $('#post-price-value').val(totalPrice);
      btn.closest('.number-spinner').find('input').val(newVal);
    });
</script>
  </body>
</html>