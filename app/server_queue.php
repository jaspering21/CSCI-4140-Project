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

</script>

