<?php
session_start();

?>
<!DOCTYPE html>
<Html lang="en">

<?php include 'head.php';?> 

<?php include 'todaysdiscount.php';?> 
 <?php include 'array.php';?> <!--separate files for value processing-->

    
    <body>
       
        <form action="checkout.php" method="post" id="productForm">  
          <div class="row">
          
          
         <?php
              for ($i=0; $i< count($products); $i++) : //Call for values from array
                    ?>
                        
                             
                        <div class="col-12 col-md-3 border-primary card" style="max-width: 30rem;">
                            <img src="images/<?= $products[$i]['images']; ?>" alt="<?= $products[$i]['name'];?>" class="img-fluid"/>
                            <h4><?= $products[$i]['name']; ?></h4>
                            
                        
                            <p><?= $products[$i]['costs']; echo " sek"?></p>
                        
                        
                            <label for="qty">Quantity</label>
                            <input type="number" form="productForm" name="amount[]" min="0" max="99" value="0"/>
                            
                            <input type="hidden" form="productForm" name="products" value="<?= $products[$i]['name'];?>">
                            <input type="hidden" form="productForm" name="cost" value="<?= $products[$i]['costs'];?>">
                            
                        
                            <input class="btn btn-primary" type="submit" value="Add">
                          
                        </div>
                        
                    
                    <?php
                    endfor; 
                    ?> <!--end of for loop-->
                     </div>

 
    
    <div class="row">
    <div class="col-12 col-md-12 border-primary text-center card" style="max-width: 30rem;">
    <h2>SIGN UP</h2>
  
        <input type="text" name="username" placeholder="Full Name" required autofocus><br>
    
        <input type="Mobile" name="mobile" placeholder="Mobile Number" required autofocus><br>
        
   
        <input type="text" name="email" placeholder="Email address" required autofocus><br>
        

        <input type="text" name="address" placeholder="Address" required autofocus><br>
       
    
        <input type="text" name="postcode" placeholder="Postcode" required autofocus><br>
        
          <input class="btn btn-primary" type="submit" value="SUBMIT">
           
      
        
        </div>
         
      
  
    </div>
   </form>
   
    
    </body>
    <?php include 'footer.php';?>
</Html>