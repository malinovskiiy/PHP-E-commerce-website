<?php

class Wishlist{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->connection)) return null;
        $this->db = $db;
    }

    public function insertIntoWish($params = null, $table = 'wishlist')
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
    public function addToWish($userId, $itemId)
    {
        if (isset($userId) && isset($itemId)) {
            // Get data from user
            $params = array(
                "user_id" => $userId,
                "item_id" => $itemId
            );

            // Insert data into wishlist
            $result = $this->insertIntoWish($params);

            if ($result) {
                // Reload page
                header('Location:' . $_SERVER['PHP_SELF']);
            }
        }
    }

    public function deleteWishItem($item_id = null, $table='wishlist'){
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
}