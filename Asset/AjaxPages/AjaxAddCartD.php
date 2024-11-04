<?php
include("../Connection/Connection.php");
session_start();
echo $selqry="select * from tbl_booking where shop_id='".$_SESSION["shopid"]."' and booking_status='0'";

$result=mysql_query($selqry);
if(mysql_num_rows($result)>0)
{
	
	if($row=mysql_fetch_array($result))
	{
		$bid = $row["booking_id"];
		
		
		
		 $selqry="select * from tbl_cart where booking_id='".$bid."' and design_id='".$_GET["id"]."'";
		//echo $selqry;
		$result=mysql_query($selqry);
		if(mysql_fetch_array($result))
		{
			 echo "Already Added to Cart";
			
		}
		else
		{
		
		 $insQry1="insert into tbl_cart(design_id,booking_id)values('".$_GET["id"]."','".$bid."')";
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
	

	 $insQry=" insert into tbl_booking(shop_id,booking_date)values('".$_SESSION["shopid"]."',curdate())";
			if(mysql_query($insQry))
			{
				echo	$selqry1="select MAX(booking_id) as id from tbl_booking";
                $result=mysql_query($selqry1);
				if($row=mysql_fetch_array($result))
				{
					$bid=$row["id"];
					
					
					echo	$selqry="select * from tbl_cart where booking_id='".$bid."'and design_id='".$_GET["id"]."'";
		$result=mysql_query($selqry);
		if(mysql_fetch_array($result))
		{
			 echo "Already Added to Cart";
			
		}
		else
		{
					
					
			echo $insQry1="insert into tbl_cart(design_id,booking_id)values('".$_GET["id"]."','".$bid."')";
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