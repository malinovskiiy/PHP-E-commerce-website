<!-- product -->
<?php
$item_id = $_GET['item_id'] ?? 1;
foreach ($product->getDataFromTable() as $item) :
    if ($item['item_id'] == $item_id) :
?>
        <section id="product" class="py-3">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <img src="<?php echo $item['item_image']; ?>" alt="phone" class="img-fluid">
                        <div class="form-row pt-4 fz-16">
                            <div class="col">
                                <button type="submit" class="btn btn-danger form-control">Proceed to buy</button>
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-warning form-control text-white">Add to cart</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 py-5">
                        <h5 class="fz-20"><?php echo $item['item_name'] ?? 'Product'; ?></h5>
                        <small>Brand: <?php echo $item['item_brand'] ?? 'Brand'; ?></small>
                        <div class="d-flex">
                            <div class="rating text-warning fz-12">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="far fa-star"></i></span>
                            </div>
                            <a href="#" class="px-2 fz-14"> 2021 ratings | 100+ answered questions</a>
                        </div>
                        <hr>
                        <!-- product price -->
                        <table class="my-3">
                            <tr class="fz-14">
                                <td>M.R.P:</td>
                                <td><strike>$163.00</strike></td>
                            </tr>
                            <tr class="fz-14">
                                <td>Deal Price:</td>
                                <td>
                                    <span class="fz-25 text-danger">&nbsp;$<?php echo $item['item_price'] ?></span>
                                    <small class="fz-12 text-dark">&nbsp;&nbsp;Includes all taxes</small>
                                </td>
                            </tr>
                            <tr class="fz-14">
                                <td>You save:</td>
                                <td class="fz-20">
                                    <span class=" text-danger">&nbsp;$33.00</span>
                                </td>
                            </tr>
                        </table>

                        <!-- Policy -->
                        <div class="policy">
                            <div class="d-flex">
                                <div class="return text-center mr-5">
                                    <div class="fz-20 my-2 color-secondary">
                                        <span class="fas fa-retweet border p-3 rounded-pill"></span>
                                    </div>
                                    <a href="#" class="fz-12">14 Days <br>Replacement</a>
                                </div>
                                <div class="return text-center mr-5">
                                    <div class="fz-20 my-2 color-secondary">
                                        <span class="fas fa-truck border p-3 rounded-pill"></span>
                                    </div>
                                    <a href="#" class="fz-12">Every day<br>Delivery</a>
                                </div>
                                <div class="return text-center mr-5">
                                    <div class="fz-20 my-2 color-secondary">
                                        <span class="fas fa-check border p-3 rounded-pill"></span>
                                    </div>
                                    <a href="#" class="fz-12">2 year <br>Warranty</a>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <!-- order details -->
                        <div id="order-details" class="d-flex flex-column text-dark">
                            <small class="py-1">Delivery by: Mar 29 - Apr 1</small>
                            <small class="py-1">Seller: <a href="#">Daily Electronics</a> (4.5 out of 5 | 13,565 ratings)</small>
                            <small class="py-1"><i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp;Deliver to Customer - 432456</small>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <!-- colors -->
                                <div class="color my-3">
                                    <div class="d-flex justify-content-between">
                                        <h6>Colors:</h6>
                                        <div class="p-2 bg-color-yellow rounded-circle"><button class="btn fz-14"></button></div>
                                        <div class="p-2 bg-color-primary rounded-circle"><button class="btn fz-14"></button></div>
                                        <div class="p-2 bg-color-secondary rounded-circle"><button class="btn fz-14"></button></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="qty d-flex my-3">
                                    <h6>Quantity:</h6>
                                    <div class="px-4 d-flex">
                                        <button class="bg-light border qty-up" data-id="product"><i class="fas fa-angle-up"></i></button>
                                        <input type="text" class="w-75 qty-input border-0 px-2 bg-light text-dark" disabled value="1" data-id="product">
                                        <button class="bg-light border qty-down" data-id="product"><i class="fas fa-angle-down"></i></button>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- RAM -->
                        <div class="ram-size my-2 d-flex justify-content-between">
                            <h6>RAM Size: </h6>
                            <div class="d-flex justify-content-between w-75">
                                <button class="btn btn-light fz-14">4 GB</button>
                                <button class="btn btn-light fz-14">6 GB</button>
                                <button class="btn btn-light fz-14">8 GB</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <h6>Product description</h6>
                        <hr>
                        <p class="fz-16">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima aliquam quos rem? Doloribus amet itaque expedita perspiciatis voluptatum ut dicta repellat ea quis, ullam eius eos sunt tempora saepe optio eligendi sapiente aperiam eaque quibusdam. Nemo earum est cumque consectetur, soluta quo nostrum sapiente saepe minus ex iure quidem molestiae.
                            <br><br>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet, cumque error necessitatibus debitis harum repellendus ab laudantium voluptatum, quae voluptates unde accusantium amet eaque sint natus suscipit? Fugiat accusamus, autem at delectus nesciunt ipsam nihil quaerat quia quam. Doloribus, harum!
                        </p>
                    </div>
                </div>
            </div>
        </section>
<?php
    endif;
endforeach; ?>