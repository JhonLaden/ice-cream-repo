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
    
    $item = new Item();
    if(isset($_GET['id'])){
        $item->delete_item($_GET['id']);
        header('location: items.php');
    }
?> 
    <div class="main flex-direction-column">
        <!-- header -->
        <div class="header-title flex flex-end">
            <div class="header-container flex flex-justify-between flex-align-center dark-light">
                <i class='bx bxs-user-circle icon'></i>
                <div class="user-name header-text ">Jhon Laden B. Adjaluddin</div>
            </div>
        </div>

        <!-- table -->
        <div class="table-container fluid flex flex-justify-center">
                <!-- button -->
            <div class="wrapper">
                <div class="button-container flex flex-justify-between">
                    <form action="items.php?search="<?php if (isset($_GET['search-submit'])) echo $_GET['search'];?> method = "GET">
                        <input type="text" name = "search" id = "search" autocomplete = "off" placeholder = "<?php if (isset($_GET['search'])) echo $_GET['search']; ?>">
                        <input type="submit" class="button" value="search" name="search-submit" id="search-submit">
                        <button>
                            <a href="items.php" class="clear">Clear Search</a>
                        </button>
                    </form>
                    <a href="addItem.php" class="add-button">
                        <span class = "text"> Add Item </span>
                    </a>
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
                        <th>Action</th>

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
                                    <td class = "action" > <a class = "grass" href = "editItem.php?id=<?php echo $value['id'] ?>">Edit</a> <a href = "items.php?id=<?php echo $value['id'] ?>" class = "danger" > Delete<a></td>
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
                            <td class = "action" > 
                                <a class = "grass" href = "editItem.php?id= <?php echo $value['id']?>">Edit</a> 
                                <a class = "danger" href = "items.php?id=<?php echo $value['id'] ?>" > Delete<a>
                             </td>

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