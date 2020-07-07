<?php
//use to fetch product data
class Product{
    public $db=null;
    public function __construct(DBController $db){
        if(!isset($db->conn))return null;
        $this->db=$db;
    }
    //fetch product data

    public function getData($table='product'){
       $result= $this->db->conn->query("select * from {$table}");
        
       $resultArray=array();
       while($item=mysqli_fetch_array($result,MYSQLI_ASSOC))
       {
           $resultArray[]=$item;
       }
       return $resultArray;
    }

    public function getByLimit($table='product',$limit){
        $result= $this->db->conn->query("select * from {$table} limit {$limit}");
         
        $resultArray=array();
        while($item=mysqli_fetch_array($result,MYSQLI_ASSOC))
        {
            $resultArray[]=$item;
        }
        return $resultArray;
     }
      //getproduct by item id
    public function getProduct($item_id=null,$table='product'){
        if(isset($item_id))
        {
            $result=$this->db->conn->query("select * from {$table} where item_id={$item_id};");
                $resultArray=array();
            while($item=mysqli_fetch_array($result,MYSQLI_ASSOC))
            {
                $resultArray[]=$item;
            }
            return $resultArray;
        }
    }
}