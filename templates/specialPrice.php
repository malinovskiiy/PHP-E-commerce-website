<!-- special price -->
<?php
$brand = array_map(function ($product) {
    return $product['item_brand'];
}, $product_array);
$unique = array_unique($brand);
sort($unique);
shuffle($product_array);


// Get info from button 'Add to cart'
if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    // If button is clicked
    if (isset($_POST['special_price_submit'])){
        // Call addToCart()
        $Cart->addToCart(
            $_POST['user_id'],
            $_POST['item_id']
        );
    }
}

$in_cart = $Cart->getCartId($product->getDataFromTable('cart')) ?? []

?>



<section id="special-price">
    <div class="container">
        <div class="row d-flex align-items-center justify-content-between">
            <h4 class="fz-20 m-0">Special Price</h4>
            <div id="filters" class=" button-group">
                <button class="btn is-checked" data-filter="*">All brands</button>
                <?php
                array_map(function ($brand) {
                    printf('<button class="btn" data-filter=".%s">%s</button>', $brand, $brand);
                }, $unique);

                ?>
            </div>
        </div>
        <hr>
        <div class="grid">
            <?php array_map(function ($item) use ($in_cart) { ?>
                <div class="grid-item <?php echo $item['item_brand']; ?>">
                    <div class="item py-2" style="width: 200px;">
                        <div class="product">
                            <a href="<?php printf('%s?item_id=%s', 'product.php', $item['item_id']) ?>">
                                <img src="<?php echo $item['item_image'] ?? './assets/products/13.png' ?>" alt="" class="img-fluid">
                            </a>
                            <div class="text-center">
                                <h6><?php echo $item['item_name'] ?? 'Product' ?></h6>
                                <div class="rating text-warning fz-12">
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="far fa-star"></i></span>
                                </div>
                                <div class="price py-2">
                                    <span>$<?php echo $item['item_price'] ?></span>
                                </div>
                                <form method="post">
                                    <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'; ?>">
                                    <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                                    <?php
                                    if (in_array($item['item_id'], $in_cart )){
                                        echo '<button type="submit" disabled class="btn btn-sm btn-success font-size-12">In the Cart</button>';
                                    }else{
                                        echo '<button type="submit" name="top_sale_submit" class="btn btn-sm btn-warning font-size-12 text-white">Add to Cart</button>';
                                    }
                                    ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }, $product_array) // End array_map() 
            ?>
        </div>
    </div>
</section>