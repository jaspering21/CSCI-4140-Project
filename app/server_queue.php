<?php
include("header_template.php");

echo '
<div id= "main-content" class="container">
  <h1>Order Queue</h1>
  <table id="order-queue" class="table">
    <thead>
      <tr>
        <th scope="col">Table Number</th>
        <th scope="col">Order</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody id ="order-table-body">
';

echo '      
    </tbody>
  </table>
</div>
'
?>
</script>
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script>
  /*Update order table every 3000 milliseconds using data from PHP server/DB*/
  var updateInterval = 3000;
  window.onload = updateTable();

  setInterval(updateTable, updateInterval);

  function updateTable() {    
   xmlhttp = new XMLHttpRequest();
   xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        document.getElementById("order-table-body").innerHTML = this.responseText;
    }
  }
    xmlhttp.open("GET","scripts/getOrderQueue.php", true);
    xmlhttp.send();
  }

  /*Attach Javascript to buttons for updating order status*/
  function updateOrderStatus(button) {  
    $.post("scripts/UpdateOrderStatus.php", {
      orderID: button.id,
      statusMessage: button.innerHTML
    },
    function(data, status){
      
      updateTable();
    });
  }
</script>




