<?php
    session_start();
    include_once '../variables/active_nav.php';
    $users = 'active';
    include_once '../includes/header.php';
    include_once '../includes/sidebar.php';
    require_once '../includes/headerMain.php';
    require_once '../database/categories.php';
    require_once '../database/items.php';
    require_once '../classes/user.class.php';

    $user = new User();
    
    if(isset($_GET['id'])){
        foreach($user->show() as $value){
            if($value['id'] == $_GET['id']){
                $user->delete($value['id']);
            }
        }
    }

?> 
   <div class="table-container fluid flex flex-justify-center">
        <div class="wrapper">
            <div class="button-container flex flex-justify-between">
                <form action="users.php?search="<?php if (isset($_GET['search-submit'])) echo $_GET['search'];?> method = "GET">
                    <input type="text" name = "search" id = "search" autocomplete = "off" placeholder = "Search by name" value = "<?php if (isset($_GET['search'])) echo $_GET['search']; ?>">
                    <input type="submit" class="button" value="search" name="search-submit" id="search-submit">
                    <button>
                        <a href="users.php" class="clear">Clear Search</a>
                    </button>
                </form>
                <?php
                    if ($_SESSION['logged-in']['type'] == "Admin"){?>
                        <a href="addUser.php" class="add-button">
                            <span class = "text"> Add user </span>
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
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>type</th>

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
                    $user = new User();
                    $counter = 1;
                    if(isset($_GET['search-submit'])){
                        foreach($user->search_by_name($_GET['search']) as $value){
                        ?>
                            <tr >
                                <td ><?php echo $counter++ ?> </td>
                                <td><?php echo $value['firstname']?></td>
                                <td><?php echo $value['lastname']?></td>
                                <td><?php echo $value['username']?></td>
                                <td><?php echo $value['email']?></td>
                                <td><?php echo $value['type']?></td>
                                <td><?php echo $value['created_at']?></td>
                                <td><?php echo $value['updated_at']?></td>
                                <?php
                                    if($_SESSION['logged-in']['type'] == "Admin"){
                                    ?>
                                        <td class = "action" > 
                                            <a class = "grass" href = "editUser.php?id=<?php echo $value['id']?>">Edit</a> 
                                            <a href = "users.php?id=<?php echo $value['id']?>" class = "danger" > Delete<a>
                                        </td>
                                    <?php
                                    }
                                    ?>
                            </tr>
                    <?php
                        }
                    }else{
                    foreach($user->show() as $value){
                ?>
                    <tr >
                        <td ><?php echo $counter++ ?> </td>
                        <td><?php echo $value['firstname']?></td>
                        <td><?php echo $value['lastname']?></td>
                        <td><?php echo $value['username']?></td>
                        <td><?php echo $value['email']?></td>
                        <td><?php echo $value['type']?></td>
                        <td><?php echo $value['created_at']?></td>
                        <td><?php echo $value['updated_at']?></td>
                        <?php
                        if($_SESSION['logged-in']['type'] == "Admin"){
                        ?>
                            <td class = "action" > 
                                <a class = "grass" href = "editUser.php?id=<?php echo $value['id']?>">Edit</a> 
                                <a class = "danger" href = "users.php?id=<?php echo $value['id']?> " > Delete<a>
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