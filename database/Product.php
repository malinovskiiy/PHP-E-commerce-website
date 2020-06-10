<?php

// Fetch product data class

class Product
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->connection)) return null;
        $this->db = $db;
    }

    // Fetch product data using getData method
    public function getDataFromTable($table = 'product')
    {
        $result = $this->db->connection->query("SELECT * FROM ${table}");
        $resultArray = array();

        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }

        return $resultArray;
    }

    // Get product by item id
    public function getProductById($itemId = null, $table = 'product')
    {
        if (isset($itemId)) {
            $result = $this->db->connection->query("SELECT * FROM {$table} WHERE item_id={$itemId}");

            $resultArray = array();

            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $resultArray[] = $item;
            }

            return $resultArray;
        }
    }
}
