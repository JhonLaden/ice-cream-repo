<?php
    session_start();
    include_once '../variables/active_nav.php';
    $history = 'active';
    include_once '../includes/header.php';
    include_once '../includes/sidebar.php';
    require_once '../includes/headerMain.php';
    require_once '../database/categories.php';
    require_once '../database/items.php';
    require_once '../classes/user.class.php';
    require_once '../classes/history.class.php';


    $history = new History();
    
    if(isset($_GET['itemTotal']) && isset($_GET['grandTotal'])){
        $history->itemQuantity = $_GET['itemTotal'];
        $history->grandTotal = $_GET['grandTotal'];
        if($history->add_history()){  
            //redirect user to faculty page after saving
            header('location: history.php');
        }
    }

?> 
   <div class="table-container fluid flex flex-justify-center">
        <div class="wrapper">
            
            <table class = "styled-table ">
            <tbody class="scrollit">
                <tr class = "brand bolder " >
                    <th>#</th>
                    <th>Item Quantity</th>
                    <th>Grand Total</th>
                    <th>Created at</th>
                    <th>Updated at</th>


                </tr>
                <?php
                    $counter = 1;
                    foreach($history->show() as $value){
                ?>
                    <tr >
                        <td ><?php echo $counter++ ?> </td>
                        <td><?php echo $value['item_quantity']?></td>
                        <td><?php echo $value['grand_total']?></td>
                        <td><?php echo $value['created_at']?></td>
                        <td><?php echo $value['updated_at']?></td>
                        

                    </tr>
                <?php
                    }
                ?>
                </tr>
            </tbody>
        
            </table>
        </div>
    </div>
                
</body>
</html>