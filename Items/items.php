<?php
    session_start();
    include_once '../variables/active_nav.php';
    $items = 'active';
    include_once '../includes/header.php';
    include_once '../includes/sidebar.php';
    require_once '../includes/headerMain.php';

    require_once '../database/categories.php';
    require_once '../database/items.php';
    
    require_once '../classes/category.class.php';
    require_once '../classes/item.class.php';
    
    if(isset($_GET['id'])){
        $item = new Item();
        foreach($item->show() as $value){
            if($value['id'] == $_GET['id']){
                $item->delete_item($value['id']);
                break;
            }
        }
    }
?> 
    
        <!-- table -->
        <div class="table-container fluid flex flex-justify-center">
                <!-- button -->
            <div class="wrapper">
                <div class="button-container flex flex-justify-between">
                    <form action="items.php?search="<?php if (isset($_GET['search-submit'])) echo $_GET['search'];?> method = "GET">
                        <input type="text" name = "search" id = "search" autocomplete = "off" placeholder = "Search by name" value = "<?php if (isset($_GET['search'])) echo $_GET['search']; ?>">
                        <input type="submit" class="button" value="search" name="search-submit" id="search-submit">
                        <button>
                            <a href="items.php" class="clear">Clear Search</a>
                        </button>
                    </form>
                    <?php
                    if ($_SESSION['logged-in']['type'] == "Admin"){?>
                        <a href="addItem.php" class="add-button">
                            <span class = "text"> Add Button </span>
                        </a>
                    <?php 
                    }
                    ?>
                </div>
                <table class = "styled-table ">
                </div>
            
                
                <tbody class="scrollit">
                    <tr class = "brand bolder " >
                        <th>#</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Created on</th>
                        <th>Updated on</th>
                        <?php
                        if($_SESSION['logged-in']['type'] == "Admin"){ ?>
                            <th>Action</th>
                        <?php
                        }
                        ?>

                    </tr>
                    <?php
                        $item = new Item();
                        $counter = 1;
                        if(isset($_GET['search-submit'])){
                            foreach($item->show_selected_name($_GET['search']) as $value){
                            ?>
                                <tr >
                                    <td ><?php echo $counter++ ?> </td>
                                    <td><?php echo $value['name']?></td>
                                    <td><?php echo $value['price']?></td>
                                    <td><?php echo $value['category']?></td>
                                    <td><?php echo $value['created_at']?></td>
                                    <td><?php echo $value['updated_at']?></td>
                                    <?php
                                        if($_SESSION['logged-in']['type'] == "Admin"){?>
                                         <td class = "action" > 
                                            <a class = "grass" href = "editItem.php?id=<?php echo $value['id']?>">Edit</a> 
                                            <a href = "items.php?id=<?php echo $value['id']?>" class = "danger" > Delete<a>
                                        </td>
                                        <?php
                                    }
                                    ?>
                                   
                                </tr>
                        <?php
                            }
                        }else{
                        foreach($item->show_with_category() as $value){
                    ?>
                        <tr >
                            <td ><?php echo $counter++ ?> </td>
                            <td><?php echo $value['name']?></td>
                            <td><?php echo $value['price']?></td>
                            <td><?php echo $value['category']?></td>
                            <td><?php echo $value['created_at']?></td>
                            <td><?php echo $value['updated_at']?></td>
                            <?php
                            if($_SESSION['logged-in']['type'] == "Admin"){?>
                                <td class = "action" > 
                                    <a class = "grass" href = "editItem.php?id=<?php echo $value['id']?>">Edit</a> 
                                    <a class = "danger" href = "items.php?id=<?php echo $value['id']?> " > Delete<a>
                                </td> 
                            <?php
                            }
                            ?>

                        </tr>
                    <?php
                        }}
                    ?>
                    </tr>
                </tbody>
                </table>
        </div>
    </div>
        
        

</body>
</html>