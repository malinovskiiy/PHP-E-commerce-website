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

    // Banner area
    include './templates/banner.php';

    // Top Sale section
    include './templates/topSale.php';

    // Special price section
    include './templates/specialPrice.php';

    // Ads section
    include './templates/adds.php';

    // New phones section
    include './templates/newPhones.php';

    // Blog section
    include './templates/blog.php';
?>

<?php 
    /**
     * Include footer
     */
    include './footer.php';
?>