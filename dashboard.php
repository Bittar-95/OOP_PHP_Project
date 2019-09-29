<?php
include "layout/header.php";
include "config/Database.php";
include "model/product.php";

$db = new database();

$connection_db = $db->db_connection();

$products = new product($connection_db);
$products_data = $products->read_products();

?>


<?php
if(isset($_GET["id_remove"]))
{
    $products->delete_products($_GET["id_remove"]);



}
?>

<div class="container">

    <div class="row" >
        <div class="col-3">
            <h4>Name</h4>
        </div>
        <div class="col-3">
            <h4>Descritpion</h4>
        </div>
        <div class="col-2">
            <h4>Price</h4>
        </div>
        <div class="col-2">
           <h4>Category</h4>
        </div>
        <div class="col-2">
            <h4>ACTION</h4>
        </div>
    </div>

<hr/>


    <?php

        
        foreach ($products_data as $product) {
            echo "<div class=row onmouseover=this.style.backgroundColor='#F3F3F3' onmouseout=this.style.backgroundColor='#FFF'>";
            echo "<div class=col-3> $product[name]</div>";
            echo "<div class=col-3> $product[description]</div>";
            echo "<div class=col-2> $product[price] $</div>";
            echo "<div class=col-2> $product[category_name]</div>";
            echo "<div class=col-2> <a href=index.php?id_edit=$product[id] class=\"badge badge-warning\">EDIT</a> || <a href=dashboard.php?id_remove=$product[id] class=\"badge badge-danger\">DELETE</a></div>";


            echo "</div>";
            echo "<hr/>";

        }

    ?>


</div>

<?php include "layout/footer.php"; ?>


