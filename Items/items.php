<?php
    session_start();
    include_once '../variables/active_nav.php';
    $items = 'active';
    include_once '../includes/header.php';
    include_once '../includes/sidebar.php';
    require_once '../database/categories.php';
    require_once '../database/items.php';
    
    require_once '../classes/category.class.php';
    require_once '../classes/item.class.php';
    
?> 


</body>
</html>