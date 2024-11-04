<?php
include("../Connection/Connection.php");
session_start();
$selqry="select * from tbl_booking where customer_id='".$_SESSION["customerid"]."' and booking_status='0'";

$result=mysql_query($selqry);
if(mysql_num_rows($result)>0)
{
	
	if($row=mysql_fetch_array($result))
	{
		$bid = $row["booking_id"];
		
		
		
		$selqry="select * from tbl_cart where booking_id='".$bid."' and product_id='".$_GET["id"]."'";
		//echo $selqry;
		$result=mysql_query($selqry);
		if(mysql_fetch_array($result))
		{
			 echo "Already Added to Cart";
			
		}
		else
		{
		
		 $insQry1="insert into tbl_cart(product_id,booking_id)values('".$_GET["id"]."','".$bid."')";
         if(mysql_query($insQry1))
          { 
             echo "Added to Cart";
                        }
                        else
                        {
	                       echo"Failed";
                        }
		}
		
	}
	
}
else
{
	

 $insQry=" insert into tbl_booking(customer_id,booking_date)values('".$_SESSION["customerid"]."',curdate())";
			if(mysql_query($insQry))
			{
				$selqry1="select MAX(booking_id) as id from tbl_booking";
                $result=mysql_query($selqry1);
				if($row=mysql_fetch_array($result))
				{
					$bid=$row["id"];
					
					
					$selqry="select * from tbl_cart where booking_id='".$bid."'and product_id='".$_GET["id"]."'";
		$result=mysql_query($selqry);
		if(mysql_fetch_array($result))
		{
			 echo "Already Added to Cart";
			
		}
		else
		{
					
					
	                   $insQry1="insert into tbl_cart(product_id,booking_id)values('".$_GET["id"]."','".$bid."')";
                        if(mysql_query($insQry1))
                        { 
                          echo "Added to Cart";
                        }
                        else
                        {
	                       echo"Failed";
                        }
					  
		}

                }
			}
}
?>