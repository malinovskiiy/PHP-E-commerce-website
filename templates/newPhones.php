<?php
// Mix up products
shuffle($product_array);


// Get info from button 'Add to cart'
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // If button is clicked
    if (isset($_POST['new_phones_submit'])) {
        // Call addToCart()
        $Cart->addToCart(
            $_POST['user_id'],
            $_POST['item_id']
        );
    }
}
?>
<!-- new phones -->
<section id="new-phones">
    <div class="container">
        <h4 class="fz-20">New phones</h4>
        <hr>
        <div class="owl-carousel owl-theme">
            <?php foreach ($product_array as $item) : ?>
                <div class="item py-2">
                    <div class="product">
                        <a href="<?php printf('%s?item_id=%s', 'product.php', $item['item_id']) ?>">
                            <img src="<?php echo $item['item_image'] ?? './assets/products/1.png'; ?>" alt="" class="img-fluid">
                        </a>
                        <div class="text-center">
                            <h6><?php echo $item['item_name'] ?? 'Product'; ?></h6>
                            <div class="rating text-warning fz-12">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="far fa-star"></i></span>
                            </div>
                            <div class="price py-2">
                                <span>$<?php echo $item['item_price'] ?? '0'; ?></span>
                            </div>
                            <form method="post">
                                    <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'; ?>">
                                    <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                                    <?php
                                    if (in_array($item['item_id'], $Cart->getCartId($product->getDataFromTable('cart')) ?? [])){
                                        echo '<button type="submit" disabled class="btn btn-sm btn-success font-size-12">In the Cart</button>';
                                    }else{
                                        echo '<button type="submit" name="new_phones_submit" class="btn btn-sm btn-warning font-size-12 text-white">Add to Cart</button>';
                                    }
                                    ?>
                                </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>