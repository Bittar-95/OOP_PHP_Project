<?php
class product {
    private $connection;
    private $table_name="products";
    public $id;
    public $name;
    public $description;
    public $category_id;
    public $timestamp;
    public $price;

    public function __construct($connection_db){
    $this->connection=$connection_db;
    }

    public function create(){
        //echo $this->name;
       $this->timestamp =  date('Y-m-d H:i:s');
       //echo $this->timestamp;

        $query = "INSERT INTO $this->table_name (name,description,price,category_id,created)
        VALUES('$this->name','$this->description',$this->price,$this->category_id,'$this->timestamp')";

       // var_dump($query);
        $statement=$this->connection->prepare($query);
        return $statement->execute();
    }


    public function read_products(){
        $query = "SELECT products.id,products.name,products.description,products.price,categories.name as 'category_name' FROM products , categories WHERE products.category_id = categories.id";
        $statement=$this->connection->prepare($query);
        $statement->execute();

        $products = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }

    public function delete_products($product_id){
        $query="DELETE FROM products WHERE id=$product_id" ;
        $statement=$this->connection->prepare($query);
        $statement->execute();
    }


    public function edit($id){
        $current_date =  date('Y-m-d H:i:s');

        $query = "UPDATE $this->table_name SET name='$this->name',description = '$this->description',price = $this->price,category_id=$this->category_id,modified = '$current_date' WHERE id=$id";

        $statement=$this->connection->prepare($query);
        return $statement->execute();
    }


}

?>