<?php
    session_start();
    include_once '../variables/active_nav.php';
    $menu = 'active';
    include_once '../includes/header.php';
    include_once '../includes/sidebar.php';
    require_once '../database/categories.php';
    require_once '../database/items.php';
    
    require_once '../classes/category.class.php';
    require_once '../classes/item.class.php';  
?>



    <div class = "main">
    <section class="menu">
        <div class="menu-header">
        <input type="text" placeholder="&#xF002; Search" style="font-family:Arial, FontAwesome" />
        </div>

        <div class="menu-body">
        <div class="sorting-cards">

            <?php
                $category_obj = new Category();

                foreach($category_obj->show() as $value){
                ?>
                         <a href = "menu.php?id=<?php echo $value['id']; ?>" class="card category-card" style = "background-color: <?php echo $value['color']?>">
                                <div class="card-header">
                                    <?php echo $value['icon'] ?>
                                </div>
                                <div class="card-body">
                                    <span class = "card-title" > <?php echo $value['name'] ?> </span>
                                    <span class = "item-num text" ><?php echo $value ['quantity'] ?> Items</span>
                                </div>
                        </a>
                     
                <?php
                }
                ?>      
        </div>

        <hr class = "divider">

        <div class="menu-items" >
            <?php
                $item = new Item();
                $id = 1;
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                }
                foreach($item->selectId($id) as $value){
            ?>
                <div class="card menu-item
            <?php
                if($value['quantity'] > 0){
            ?>
                    active
            <?php
                }   
            ?>
                ">
                <div class="background-card"></div>
                    <div class="card-header text">
                        <span> Category 
                        <i class="bx bx-right-arrow-alt "></i><?php echo $item->selectCategoryName($id)[0]?> 
                        <span>
                    </div>
                    <div class="card-body">
                        <div class="card-title">
                            <span class = "brand"> <?php echo $value['name']; ?></span>
                            
                            <span class = "value">₱ <?php echo ($value['price']);
                            if($value['price'] % 1 == 0) echo ('.00');?>
                            </span>
                        
                        </div>
                    </div>
                    <div class="card-footer">
                        <span class = "minus-plus">
                            <i class="bx bx-minus minus-icon icon minus" ></i>
                            <span class = "item-count"><?php echo $value['quantity'] ?></span>
                            <i class="bx bx-plus icon plus"></i>
                        </span>
                    </div>
                </div>
                <?php 
                }
                ?>
        
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
            <span class="dummy-element">sdf</span>

            <div class="list-container">
                <ul class="want-list">
 
            </div>

            <div class="total-container">
                <div class="total">
                    <div class="subtax-total">
                        <div class="subtax">
                            <div class="sub flex-between mb-10 ">
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
                    <button class = "clear-button"> Clear </button>
                    <a class="place-order" href = "#">
                        <button><span>Place Order</span></button>
                    </a>
                    
                    <span class="dialog">
                        <p class="text">Select an item to add</p>
                    </span>
                </div>
                
            </div>
        </div>
        
    <section>
    <div >
    <script src = "../script/menu.js" ></script>

</body>
</html>