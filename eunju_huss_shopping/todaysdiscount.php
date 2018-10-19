<?php

 if(date("l") === "Monday") { 

      echo "<h5 style=padding:10px;> Monday! happy discount";
       } 
elseif(date("l") ===  "Wednesday") { 
       echo "<h5 style=padding:10px;>Wednesday! Extra Fresh";

      } 
elseif(date("l") ===  "Friday") {
          
     echo "<h5 style=padding:10px;>Friday! single product over 200 sek you get 20 sek discount";
 
            }
else {
     echo "";
            
            
        }
       

     ?>