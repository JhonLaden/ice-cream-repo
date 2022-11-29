<?php
    session_start();
    include_once '../variables/active_nav.php';
    $dashboard = 'active';
    include_once '../includes/header.php';
    include_once '../includes/sidebar.php';
    require_once '../includes/headerMain.php';
    require_once '../database/categories.php';
    require_once '../database/items.php';
    
    require_once '../classes/user.class.php';
    require_once '../classes/category.class.php';
    require_once '../classes/item.class.php';

    if (!isset($_SESSION['logged-in'])){
        header('location: ../login/login.php');
    }else{
        if($_SESSION['logged-in']['type'] == 'Cashier'){
            header('location: ../items/items.php');
        }
    }
    $user = new User();
    $userCount = $user->get_user_count()[0] ;
    $latestUser = $user->get_latest_user()[0] ;


    $item = new Item();
    $itemCount = $item->get_item_count()[0];
    $latestItem = $item->get_latest_item()[0];

?> 
    

        <div class="body-main">
            <div class="body-header mb-50 brand light-pink">Welcome back <span class = "dirty-white2 brand">Admin</span></div>
            <div class="card-container flex">
                <div class="dashboard-card dark flex flex-direction-column shadow-pink">
                    <div class="card-title flex flex-direction-column">
                        <div class="card-brand">Users</div>
                        <div class="last-update dirty-white small-font">Last update <?php echo $latestUser ?></div>
                    </div>
                    <div class="card-body flex flex-align-center ">
                        <div class="big value light-blue"><?php echo $userCount ?></div>
                    </div>
                </div>

                <div class="dashboard-card dark flex flex-direction-column shadow-pink">
                    <div class="card-title flex flex-direction-column">
                        <div class="card-brand">Items</div>
                        <div class="last-update dirty-white small-font">Last update <?php echo $latestItem; ?></div>
                    </div>
                    <div class="card-body flex flex-align-center ">
                        <div class="big value light-green"><?php echo $itemCount ;?></div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</body>
</html>