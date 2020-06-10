<!-- shopping cart -->
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['delete_cart_item_submit'])) {
        $deleteItem = $Cart->deleteCartItemById($_POST['item_id']);
    }
}

?>
<section id="cart" class="py-3">
    <div class="container">
        <h5 class="fz-20">Shopping cart</h5>
        <!-- cart items -->
        <div class="row">
            <div class="col-sm-9">
                <!-- cart item -->
                <?php
                foreach ($product->getDataFromTable('cart') as $item) :
                    $cart_items = $product->getProductById($item['item_id']);
                    $subtotal[] = array_map(function ($item) {
                ?>
                        <div class="row border-top py-3 mt-3">
                            <div class="col-lg-2">
                                <img src="<?php echo $item['item_image']; ?>" alt="cart item" class="img-fluid" style="min-height: 120px; min-width: 100px">
                            </div>
                            <div class="col-lg-8">
                                <h6 class="fz-14"><?php echo $item['item_name']; ?></h6>
                                <small>Brand: <?php echo $item['item_brand']; ?></small>
                                <!-- rating -->
                                <div class="d-flex">
                                    <div class="rating text-warning fz-12">
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="far fa-star"></i></span>
                                    </div>
                                </div>
                                <!-- qty -->
                                <div class="qty d-flex justify-content-between my-3">
                                    <h6>Quantity:</h6>
                                    <div class="px-4 d-flex">
                                        <button class="bg-light border qty-up" data-id="<?php echo $item['item_id'] ?? 0; ?>"><i class="fas fa-angle-up"></i></button>
                                        <input type="text" class="w-50 qty-input border-0 px-2 bg-light text-dark" disabled value="1" data-id="<?php echo $item['item_id'] ?? 0; ?>">
                                        <button class="bg-light border qty-down" data-id="<?php echo $item['item_id'] ?? 0; ?>"><i class="fas fa-angle-down"></i></button>
                                    </div>
                                    <form method="post">
                                        <input type="hidden" value="<?php echo $item['item_id'] ?? 0; ?>" name="item_id">
                                        <button type="submit" class="btn btn-sm btn-danger" name="delete_cart_item_submit">Delete</button>
                                        <button type="submit" class="btn btn-sm btn-light px-2">Save for later</button>
                                    </form>

                                </div>

                            </div>
                            <div class="col-lg-2">
                                <div class="fz-20 text-danger text-right">
                                    $ <span class="product-price" data-id="<?php echo $item['item_id'] ?? 0; ?>"><?php echo $item['item_price'] ?></span>
                                </div>
                            </div>
                        </div>
                <?php
                        return $item['item_price'];
                    }, $cart_items); // Closing array map

                endforeach;
                ?>
            </div>
            <div class="col-sm-3">
                <!-- subtotal    -->
                <div class="subtotal border text-center mt-2">
                    <?php if ($Cart->getSumOfProducts($subtotal) > 200) : ?>
                        <h6 class=" fz-12 text-success py-3 border-bottom"><i class="fas fa-check"></i> Your order is eligible for FREE Delivery <br>
                            <small class="fz-12">(Subtotal is greater than 200$)</small></h6>
                    <?php endif; ?>
                    <div class=" py-4">
                        <h5 class="fz-16">Subtotal (<?php echo isset($subtotal) ? count($subtotal) : 0; ?> items): <span class="text-danger">$<span id="deal-price"><?php echo isset($subtotal) ? $Cart->getSumOfProducts($subtotal) : 0 ?></span></span></h5>
                        <button type="submit" class="btn btn-success mt-2">Proceed to buy</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>