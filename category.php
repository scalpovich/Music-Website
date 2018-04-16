<?php
session_start();
require_once("vars.php");
ob_start();
if(!isset($_SESSION["utype"]))
header("location:error.php");
								
?>
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Mosaic a Entertainment Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Mosaic Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
 <!-- Meters graphs -->
<script src="js/jquery-1.10.2.min.js"></script>

</head> 
   
 <body class="sticky-header left-side-collapsed"  onload="initMap()">
    <section>
      <!-- left side start-->
		<div class="left-side sticky-left-side">

			<!--logo and iconic logo start-->
			<?php
			include_once("logo.php")
			?>
			<!--logo and iconic logo end-->
			<div class="left-side-inner">

				<!--sidebar nav start-->
					<?php
					include_once("side2.php")
					?>
				<!--sidebar nav end-->
			</div>
		</div>
					<!-- app-->
			
			<!-- //app-->

		<!-- signup -->
        
      
        
			<!-- //signup -->

		<!-- left side end-->
		<!-- main content start-->
		<div class="main-content">
			<!-- header-starts -->
			<?php
			
			include_once("header.php")
			?>
			<!--notification menu end -->
			<!-- //header-ends -->

		<!-- //header-ends -->
          <br/><br/><br/>
		
            
            <form name="form1" method="post" action="" enctype="multipart/form-data">
              <table width="500" align="center" >
                <tr>
                  <td colspan="2" align="center"><h1>Add Category</h1></td>
                </tr>
                <tr>
                  <td width="200" align="center">Category Name</td>
                  <td width="208" align="left"><label>
                    <input type="text" name="category" id="category">
                  </label></td>
                </tr>
                <tr>
                  <td width="200" align="center">Category Image</td>
                  <td width="208" align="left"><label>
                    <input type="file" name="catimg" id="catimg">
                  </label></td>
                </tr>
                <tr>
                  <td align="center">&nbsp;</td>
                  <td align="left"><input type="submit" name="submit" id="submit" value="Add Category"></td>
                </tr>
              </table>
            </form>
            
            <?php
			
			
			if(isset($_POST["submit"]))
			{
				$cname=$_POST["category"];
				
				 $err=$_FILES["catimg"]["error"];
			  
			 
			 if($err==0)
         	{
				$date = date_create();
		        $tstamp=date_timestamp_get($date);
				$cimage=$tstamp.$_FILES["catimg"]["name"];
				$tname=$_FILES["catimg"]["tmp_name"];
				
		        move_uploaded_file($tname,"images/$cimage");
				
			}
			else 
			{
				$cimage="no.png";
			}
			
					
	        $conn=mysqli_connect(host,usern,pass,dbname) or die("Error in connection " . mysqli_connect_error());	
	
	
			$q="insert into category(category,catimage) values ('$cname','$cimage')";
			
			mysqli_query($conn,$q) or die("Error in query " . mysqli_error($conn));
			
			$cnt=mysqli_affected_rows($conn);
			
			if($cnt==1)
			{
				print"<h3 align='center'><font color='green'>Category added successfully</font></h3>";
			}
			else
			{
				print"<h3 align='center'><font color='red'>Problem while adding, please try again</font></h3>";
			}
					}
			?> 
            
                       <h1>&nbsp;</h1>
            <div class="clearfix"></div>
						<!--body wrapper end-->

					</div>
			  <!--body wrapper end-->
			     
			</div>
        <!--footer section start-->
			  <?php
	  include_once("footer.php")
	  
	  ?>
        <!--footer section end-->

      <!-- main content end-->
   </section>
  
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
</body>
</html>