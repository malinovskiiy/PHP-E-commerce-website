<?php 
    ob_start();
    /**
     * Include header
     */
    include './header.php';
?>

<?php 
    /** 
     * Include main content
    */

    // Cart items
    include './templates/cartTemplate.php';

    // Wishlist items
    include './templates/wishlistTemplate.php';

    // New phones section
    include './templates/newPhones.php';

?>

<?php 
    /**
     * Include footer
     */
    include './footer.php';
?>