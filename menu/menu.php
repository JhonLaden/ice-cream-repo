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
                    echo '
                    <div class="card ';
                    if($value['number'] > 0){
                        echo 'active';
                    }
                    echo '">
                    <div class="card-header text">
                        <span> Orders 
                        <i class="bx bx-right-arrow-alt "></i> Kitchen 
                        <span>
                    </div>
                    <div class="card-body">
                        <div class="card-title">
                            <span class = "brand">'.$value['title'] .'</span>
                            <span class = "value">₱'.$value['price'] ;
            ?>
            <?php
                if($value['price'] % 1 == 0) echo '.00';
            ?>
            <?php
                echo '
                            </span>
                        </div>
                        
                    </div>
                    <div class="card-footer">
                        <span class = "minus-plus">
                            <i class="bx bx-minus minus-icon icon " id = "minus"></i>
                            <span class = "item-count">'.$value['number'].'</span>
                            <i class="bx bx-plus icon " id = "plus"></i>
                        </span>
                    </div>
                </div>
                    ';
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
            <div class="card active">
                <div class="card-header text">
                    <span> Orders 
                    <i class='bx bx-right-arrow-alt '></i> Kitchen 
                    <span>
                </div>
                <div class="card-body">
                    <div class="card-title">
                        <span class = "brand">Roast Chicken</span>
                        <span class = "value">₱10.00</span>
                        
                    </div>
                    
                </div>
                <div class="card-footer">
                    <span class = "minus-plus">
                        <i class='bx bx-minus minus-icon icon ' id = "minus"></i>
                        <span class = "item-count">2</span>
                        <i class='bx bx-plus icon ' id = "plus"></i>
                    </span>
                </div>
            </div>
            <div class="card">
                <div class="card-header text ">
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
            <div class="card">
                <div class="card-header text">
                    <span > Orders 
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
            <div class="card">
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
            <div class="card">
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
            <div class="card">
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
            <div class="card">
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
            </div> -->

        
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
                    
                    <li class="item">
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
                        
                    </li>

                    <li class="item">
                        <span class="x-mark">
                            <i class='bx bxs-trash icon'></i>
                        </span>
                        <div class="want-item">
                            <div class="details">
                                <div class="counter-name">
                                    <span class="item-counter">2</span>
                                    <span class="item-name">Caramel</span>
                                    <span class="quantity">x3</span>
                                </div>
                            <div class="price">₱35.00</div>
                        </div>
                        
                    </li>

                    <li class="item">
                        <span class="x-mark">
                            <i class='bx bxs-trash icon'></i>
                        </span>
                        <div class="want-item">
                            <div class="details">
                                <div class="counter-name">
                                    <span class="item-counter">3</span>
                                    <span class="item-name">Chocolate Bar</span>
                                    <span class="quantity">x1</span>
                                </div>
                            <div class="price">₱10.00</div>
                        </div>
                        
                    </li>

                    <li class="item">
                        <span class="x-mark">
                            <i class='bx bxs-trash icon'></i>
                        </span>
                        <div class="want-item">
                            <div class="details">
                                <div class="counter-name">
                                    <span class="item-counter">4</span>
                                    <span class="item-name">Irish Cream coffee</span>
                                    <span class="quantity">x1</span>
                                </div>
                            <div class="price">₱25.00</div>
                        </div>
                        
                    </li>

                    
                    
            </div>

            <div class="total-container">
                <div class="total">
                    <div class="subtax-total">
                        <div class="subtax">
                            <div class="flex-between mb-10">
                                <span class="text">Subtotal</span>
                                <span class="value">₱190.00</span>
                            </div>
                            <div class="flex-between mb-10">
                                <span class="text">Discount 10%</span>
                                <span class="value">₱19.00</span>
                            </div>
                        </div>
                        <hr class = "divider-2">
                        <div class="flex-between mb-10">
                            <span class="text">Total</span>
                            <span class="value">₱171.00</span>
                        </div>
                    </div>
                    <div class="place-order">
                        <button><span>Place Order</span></button>
                    </div>
                </div>
                
            </div>
        </div>
        
    <section>
    <div >

</body>
</html>