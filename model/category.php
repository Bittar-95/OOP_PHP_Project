<?php
class category{
    private $connection;
    private $table_name="categories";
    public $id;
    public $name;
    public function __construct($connection)
    {
      $this->connection=$connection;

    }
    public function get_categories(){
        $query ="select id,name from $this->table_name order by name";
        $statement=$this->connection->prepare($query);
        $statement->execute();
        $categories =$statement->fetchAll(PDO::FETCH_ASSOC);


        return $categories;
    }
}
?>