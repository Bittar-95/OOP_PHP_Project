<?php include "config/Database.php"?>
<?php include "model/product.php"?>
<?php include "model/category.php"?>

<?php

$new = new database();//instance from connection
$connection=$new->db_connection(); // call function from database connection

?>
<?php

$category=new category($connection);
$data=$category->get_categories();


?>
<div class="container">
    <form action="<?php
    $_SERVER["PHP_SELF"]
    ?>" method="POST">
        <div class="form-group">
            <label for="exampleFormControlInput1">Product Name</label>
            <input name="product_name" type="text" class="form-control" id="exampleFormControlInput1" autofocus>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Category</label>
            <select name="category_id" class="form-control" id="exampleFormControlSelect1">


                <?php
                foreach ($data as $category)
                    echo "<option value=$category[id]>$category[name]</option>";
                ?>


            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Description</label>
            <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div><div class="form-group">
            <label for="exampleFormControlTextarea1">price</label>
            <input name="price" type="text" class="form-control" id="exampleFormControlInput1" >
        </div>
        <button  name="submit" type="submit" class="btn btn-dark">Create</button>

    </form>
</div>
<?php
if(isset($_POST["submit"])){
    $product =new product($connection);
    $product->name=$_POST["product_name"];
    $product->price=$_POST["price"];
    $product->description=$_POST["description"];
    $product->category_id=$_POST["category_id"];

    if(isset($_GET["id_edit"]))
    {

        if($product->edit($_GET["id_edit"])){
            echo "<div class='alert alert-success'>Product was Updated</div>";
        }
        else{
            echo "<div class='alert alert-danger'>Unable To Update</div>";
        }


    }
    else{


                if($product->create()){
                    echo "<div class='alert alert-success'>Product was created</div>";
                }
            else{
                echo "<div class='alert alert-danger'>Unable to create</div>";
            }
    }
}
?>

