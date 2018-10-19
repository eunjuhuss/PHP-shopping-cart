<?php
session_start();


?>
<?php include 'head.php';?>
<?php include 'array.php';?> <!--separate files for value processing-->

<!DOCTYPE html>
<Html lang="en">


    <body>
    
    <div class="card text-center">
     
     
      <h3>Your Shopping Cart</h3>
        <p style="text-align:left; color:grey;">*Monday! get 50% discount <br> *Wednsday! Extra fresh, 110% <br> *Friday! 200 sek over you get 20 sek discount</p>
      
       <?php
        $subPrice = 0;
        $total = 0;
        $today = date("l");
        $fridayDiscount = 20;
        
        
    foreach($products as $index => $singleProducts){  
           if(isset($_POST['amount'][$index]) && $_POST['amount'][$index]>0){
           
                $subPrice = $_POST['amount'][$index] * $singleProducts['costs'];
            
                $total+=$subPrice; ?> <!--collecting data from main page index.php to add total cost of order-->
                
     

   <table class="table table-hover">
  <thead>
       <tr>
     <th scope="col">Product</th>
      <th scope="col">Each</th>
      <th scope="col">Price</th>
      <th scope="col">Sub price</th>
    </tr>
  </thead>
  <tbody>
    <tr class="table-active">
      <th scope="row"><?php echo $singleProducts['name']?></th> <!--print out of index order--> 
      <td><?php echo $_POST['amount'][$index]?></td>
      <td><?php echo $singleProducts['costs'].' '.'sek'?></td>
      <td><?php echo $subPrice .' '. 'sek'?></td>
    </tr>
   
</table> 
      
    <?php
        }else{
            echo ''; /*bug fix for empty numeric field to prevent crashing of program */ 
         } 
        } 
        
     
       /*discount due to day a week */ 
     
       if($today === "Monday") { 
            $discount = $total / 2;
           echo  "<h5>Original price $total sek </h5>";
           echo "<h5 style=color:red;>Discount price $discount sek </h5>";
           echo "<br>";
       } 
        
        else if($today === "Wednesday") { 
            echo  "<h5>original price $total sek";
            echo "<br>";
                $increase = ($total * 0.1) + $total;
            echo "<h5>Total price $increase sek</h5>";
            echo "<br>";
      } 
        
        else if($today === "Friday") {
            if($singleProducts['costs'] > 200){
                    $friday = $total- 20;
                echo "<br>";
                echo "<h5>Today's price $friday</h5>";
                echo "<br>";
              
                }
              
            }
         else {
             echo  "<h5>Total price $total sek</h5>";
             echo "<br>";
            
            
        }
       
   
     ?>

        <?php
        /*Order id if signing up, data is saved on computer for fast reuse*/  if(isset($_POST["username"])&&isset($_POST["mobile"])&&isset($_POST["email"])&&isset($_POST["address"])&&isset($_POST["postcode"])){
            
            $_SESSION["username"]=$_POST["username"];
            $_SESSION["mobile"]=$_POST["mobile"];
            $_SESSION["email"]=$_POST["email"];
            $_SESSION["address"]=$_POST["address"];
            $_SESSION["postcode"]=$_POST["postcode"];
            
               
                echo "<h3>Your Information</h3>";
                echo $_SESSION["username"];
                echo "<br>";
                echo $_SESSION["mobile"];
                echo "<br>";
                echo $_SESSION["email"];
                echo "<br>";
                echo $_SESSION["address"];
                echo "<br>";
                echo $_SESSION["postcode"];
           
            }
 
    ?>
    <form action="index.php" method="post" id="productForm">  
     <input class="btn btn-primary" type="submit" value="Go back">  <!--reset form buttom-->
        </form>
</div>
       
       
       
       
       

       
    </body>
 

</Html>