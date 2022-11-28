<?php
    session_start();
    include_once '../variables/active_nav.php';
    $dashboard = 'active';
    include_once '../includes/header.php';
    include_once '../includes/sidebar.php';
    require_once '../includes/headerMain.php';
    require_once '../database/categories.php';
    require_once '../database/items.php';
    
    require_once '../classes/category.class.php';
    require_once '../classes/item.class.php';

    if (!isset($_SESSION['logged-in'])){
        header('location: ../login/login.php');
    }else{
        if($_SESSION['logged-in']['type'] == 'Cashier'){
            header('location: ../items/items.php');
        }
    }
?> 
    

        <div class="body-main">
            <div class="body-header mb-50 brand light-pink">Welcome back <span class = "dirty-white2 brand">Admin</span></div>
            <div class="card-container flex">
                <div class="dashboard-card dark flex flex-direction-column shadow-pink">
                    <div class="card-title flex flex-direction-column">
                        <div class="card-brand">Users</div>
                        <div class="last-update dirty-white small-font">Last update 02/November/2022</div>
                    </div>
                    <div class="card-body flex flex-align-center ">
                        <div class="big value light-blue">15</div>
                    </div>
                </div>

                <div class="dashboard-card dark flex flex-direction-column shadow-pink">
                    <div class="card-title flex flex-direction-column">
                        <div class="card-brand">Items</div>
                        <div class="last-update dirty-white small-font">Last update 02/November/2022</div>
                    </div>
                    <div class="card-body flex flex-align-center ">
                        <div class="big value light-green">64</div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</body>
</html>