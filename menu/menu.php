<?php
    session_start();
    include_once '../variables/active_nav.php';
    $menu = 'active';
    include_once '../includes/header.php';
    include_once '../includes/sidebar.php';
    require_once '../database/categories.php';
    require_once '../database/items.php';
    
?>


    <div class = "main">
    <section class="menu">
        <div class="menu-header">
        <input type="text" placeholder="&#xF002; Search" style="font-family:Arial, FontAwesome" />
        </div>

        <div class="menu-body">
        <div class="sorting-cards">

            <?php
                $counter =1 ;
                foreach($category as $key => $value){
                    echo '<div class="card card-'.$counter.'">
                            <div class="card-header">
                                '. $value['icon'].'
                            </div>
                            <div class="card-body">
                                <span class = "card-title" >'.$value['title'] .'</span>
                                <span class = "item-num text" >'.$value ['number'] .'</span>
                            </div>
                        </div>';
                    $counter = $counter + 1;
                }
            ?>     
        </div>

        <hr class = "divider">

        <div class="menu-items" >
            <?php
                foreach($item as $key => $value){
            ?>
                <div class="card item
            <?php
                if($value['number'] > 0){
            ?>
                    active
            <?php
                }
            ?>
                ">
                    <div class="card-header text">
                        <span> Orders 
                        <i class="bx bx-right-arrow-alt "></i> Kitchen 
                        <span>
                    </div>
                    <div class="card-body">
                        <div class="card-title">
                            <span class = "brand"> <?php echo $value['title']; ?></span>
                            
                            <span class = "value">₱ <?php echo ($value['price']);
                            if($value['price'] % 1 == 0) echo ('.00');?>
                            </span>
                    </div>
                        
                </div>
                    <div class="card-footer">
                        <span class = "minus-plus">
                            <i class="bx bx-minus minus-icon icon minus" ></i>
                            <span class = "item-count"><?php echo $value['number'] ?></span>
                            <i class="bx bx-plus icon plus"></i>
                        </span>
                    </div>
                </div>
                <?php 
                }
                ?>
            <!-- <div class="card">
                <div class="card-header text">
                    <span> Orders 
                    <i class='bx bx-right-arrow-alt '></i> Kitchen 
                    <span>
                </div>
                <div class="card-body">
                    <div class="card-title">
                        <span class = "brand">Fish and chips</span>
                        <span class = "value">₱10.00</span>
                    </div>
                    
                </div>
                <div class="card-footer">
                    <span class = "minus-plus">
                        <i class='bx bx-minus minus-icon icon ' id = "minus"></i>
                        <span class = "item-count">0</span>
                        <i class='bx bx-plus icon ' id = "plus"></i>
                    </span>
                </div>
            </div>
            -->

        
    </section>
    <section class = "sidebar-right">
        <div class="title-container">
            <div class="title">
                <h1 class="text">Table 5</h1>
                <span class="sub">Leslie K.</span>
            </div>
            <span class="icon-container">
                <i class='bx bxs-edit-alt icon'></i>
            </span>
        </div>
        <div class="list-total">
            <div class="list-container">
                <ul class="want-list">
                    <!-- <li hidden class="item list-item">
                        <span class="x-mark">
                            <i class='bx bxs-trash icon'></i>
                        </span>
                        <div class="want-item">
                            <div class="details">
                                <div class="counter-name">
                                    <span class="item-counter">1</span>
                                    <span class="item-name">Cookie</span>
                                    <span class="quantity">x2</span>
                                </div>
                                <div class="price">₱25.00</div>
                             </div>
                        </div>
                    </li> -->

                    

                    
                    
            </div>

            <div class="total-container">
                <div class="total">
                    <div class="subtax-total">
                        <div class="subtax">
                            <div class="sub flex-between mb-10">
                                <span class="text">Subtotal</span>
                                <span class="value">₱ 0.00</span>
                            </div>
                            <div class="disc flex-between mb-10">
                                <span class="text">Discount 10%</span>
                                <span class="value">₱ 0.00</span>
                            </div>
                        </div>
                        <hr class = "divider-2">
                        <div class="grand-total flex-between mb-10">
                            <span class="text">Total</span>
                            <span class="value">₱ 0.00</span>
                        </div>
                    </div>
                    <div class="place-order">
                        <button><span>Place Order</span></button>
                    </div>
                </div>
                <div class="total-empty">
                    <div class="text">
                        <p>Add an Item</p>
                    </div>
                </div>
                
            </div>
        </div>
        
    <section>
    <div >

    <script src = "../script/menu.js" > </script>

</body>
</html>