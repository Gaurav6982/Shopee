<?php
//php cart class
class Cart{
    public $db=null;

    public function __construct(DBController $db){
        if(!isset($db->conn))return null;
        $this->db=$db;
    }
    public function InsertInto($params=null,$table="cart"){
       if($this->db->conn!=null)
       {
           if($params!=null)
           {
            $columns=implode(',',array_keys($params));
            $values=implode(',',array_values($params));
            
            $query_string=sprintf("INSERT INTO %s(%s) VALUES(%s);",$table,$columns,$values);
            $result=$this->db->conn->query($query_string);
            return $result;       
           }
       }
        
    }

    // to get user_id and item_id and insert into cart table
    public function addToCart($user_id,$item_id)
    {
        if(isset($user_id) && isset($item_id))
        {
            $params=array(
                "user_id"=>$user_id,
                "item_id"=>$item_id
            );
            $result=$this->InsertInto($params);
            if($result)
            {
                header("Location:".$_SERVER['PHP_SELF']);
            }
        }
    }
    //calculate sub total
    public function getSum($arr)
    {
        if(isset($arr))
        {
            $sum=0;
            foreach($arr as $item)
            {
                $sum+=floatval($item[0]);
            }
            return sprintf("%.2f",$sum);
        }
    }

    //Delete
    public function DeleteFrom($table='cart',$itemid)
    {
        if(isset($table))
        {
            $result=$this->db->conn->query("delete from {$table} where item_id={$itemid}");
            if($result)
            {
                header("Location:".$_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }

    //get Item Id of shopping cart list
    public function getCartId($cartArray=null,$key='item_id'){
        if($cartArray!=null)
        {
            $cart_id=array_map(function($item) use ($key){
                return $item[$key];
            },$cartArray);
            return $cart_id;
        }
    }

    public function SaveFromTo($item_id=null,$fromTable='cart',$toTable='wishlist')
    {
        if(isset($item_id))
        {
            $query="INSERT INTO {$toTable} SELECT * FROM {$fromTable} WHERE item_id={$item_id};";
            $query.="DELETE FROM {$fromTable} where item_id={$item_id}";
            $result=$this->db->conn->multi_query($query);
            if($result)
            {
                header("Location:".$_SERVER['PHP_SELF']);
            }
        }
    }
   
}