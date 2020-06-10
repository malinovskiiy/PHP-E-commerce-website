<?php

class Cart
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->connection)) return null;
        $this->db = $db;
    }

    // Insert item into cart
    public function insertIntoCart($params = null, $table = 'cart')
    {
        if ($this->db->connection != null) {
            if ($params != null) {

                // Get table columns
                $columns = implode(',', array_keys($params));
                $values = implode(',', array_values($params));

                // Query
                $query = sprintf('INSERT INTO %s(%s) VALUES (%s)', $table, $columns, $values);

                // Execute query
                $result = $this->db->connection->query($query);
                return $result;
            }
        }
    }

    // Get user id and insert it into cart table
    public function addToCart($userId, $itemId)
    {
        if (isset($userId) && isset($itemId)) {
            // Get data from user
            $params = array(
                "user_id" => $userId,
                "item_id" => $itemId
            );

            // Insert data into cart
            $result = $this->insertIntoCart($params);

            if ($result) {
                // Reload page
                header('Location:' . $_SERVER['PHP_SELF']);
            }
        }
    }

    // Delete cart item by id
    public function deleteCartItemById($item_id = null, $table = 'cart')
    {
        if ($item_id != null) {

            // Delete query
            $result = $this->db->connection->query("DELETE FROM {$table} WHERE item_id = {$item_id}");

            if($result){
                // Reload page
                header('Location:' . $_SERVER['PHP+_SELF']);
            }

            return $result;
        }
    }

    // Calculate subtotal
    public function getSumOfProducts($products)
    {
        if (isset($products)) {
            $sum = 0;

            foreach ($products as $product) {
                $sum += floatval($product[0]);
            }

            // Print sum
            return sprintf('%.2f', $sum);
        }
    }

    // Get Cart by id
    public function getCartId($cartArray = null, $key = "item_id"){
        if($cartArray != null){
            $cart_id = array_map(function($value) use ($key){
                return $value[$key];
            }, $cartArray);

            return $cart_id;
        }
    }
}
