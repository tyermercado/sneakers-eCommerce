<?php

class ProductsDB
{
        public $server;
        public $username;
        public $password;
        public $products_db;
        public $tbl_products;
        public $con;


        // class constructor
    public function __construct(
        $products_db = "Productsdb",
        $tbl_products = "Products_tbl",
        $server = "localhost",
        $username = "root",
        $password = ""
    )
    {
      $this->products_db = $products_db;
      $this->tbl_products = $tbl_products;
      $this->server = $server;
      $this->username = $username;
      $this->password = $password;

      // Create connection to mysql
        $this->con = mysqli_connect($server, $username, $password);

        // Check connection to mysql
        if (!$this->con){
            die("Connection failed : " . mysqli_connect_error());
        }

        // Query
        $sql = "CREATE DATABASE IF NOT EXISTS $products_db";

        // Execute query
        if(mysqli_query($this->con, $sql)){

            $this->con = mysqli_connect($server, $username, $password, $products_db);

            // SQL to create new table
            $sql = " CREATE TABLE IF NOT EXISTS $tbl_products
                            (id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                             product_name VARCHAR (25) NOT NULL,
                             product_categ VARCHAR (25) NOT NULL,
                             product_size FLOAT NOT NULL,
                             product_price FLOAT NOT NULL,
                             product_image VARCHAR(100)
                            );";

            if (!mysqli_query($this->con, $sql)){
                echo "Error creating table : " . mysqli_error($this->con);
            }

        }else{
            return false;
        }
    }

    // Get product from the database
    public function getData(){
        $sql = "SELECT * FROM $this->tbl_products";

        $result = mysqli_query($this->con, $sql);

        if(mysqli_num_rows($result) > 0){
            return $result;
        }
    }
}






