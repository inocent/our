<html> 
    
<?php
session_start();
$hotelName="KIRIA";
require_once 'models/Common.php';
if($_SESSION["status"]!=null){
 $status=$_SESSION["status"];
 $pg=$_GET["page"];
 $userid="";
 $title="";
 if($status=="guest"){
    $userid=$_SESSION["guestID"];                
 }  
 else if($status=="reception"){
    $userid=$_SESSION["receptionID"];  
    $title="Reception Home";
    $pg="Reception_Home.php";
 }
 else if($status=="admin"){
    $userid=$_SESSION["adminID"];  
    $pg="Admin_Home";
    $title="Administrator  Home"; 
	
	
 else if($status=="acha"){
    $userid=$_SESSION["adminID"];  
    $pg="acha";
    $title="Acha  Home"; 
 }
 require_once 'models/View.php';
 require_once 'models/MysqlConnection.php';
 require_once 'models/Hotel.php';
 $hotel=new Hotel($connect);
?>      
<head>  
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Management System | Main</title>    
    <link href="resource/css/bootstrap.min.css" rel="stylesheet">
    <link href="resource/font-awesome/css/font-awesome.css" rel="stylesheet">	       
    <link href="resource/css/bootstrap.min.css" rel="stylesheet">
    <link href="resource/css/font-awesome/css/font-awesome.css" rel="stylesheet">      
    <script src="resource/js/jquery.js"></script>
    <script src="resource/js/ui.js"></script>    
    <link href="resource/css/ui.css" rel="stylesheet">   
    <link href="resource/js/jquery/images/ui-bg_flat_0_aaaaaa_40x100.png" rel="stylesheet">   
    <link href="resource/css/main.css" rel="stylesheet">   
    <script src="resource/js/bootstrap.min.js"></script>	 
    <script src="resource/js/plugins/metisMenu/jquery.metisMenu.js"></script>    
    <script src="resource/js/main.js"></script>    
</script>
<script>  
//history.forward();
var waitBookTimeMin=2;
</script>
<style type="text/css">
.loader{
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url('image/load.gif') 50% 50% no-repeat rgb(249,249,249);
	}
</style>	
</head>
<body style="overflow:hidden">
<img src="image/header.jpg" style="position:absolute;width:100%;top:0px;z-index:999999999999999"/>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-default navbar-static-side" role="navigation">
               <div class="sidebar-collapse">
		<?php if($status=="guest")
                 { // Guest Panel Panel
			?>
			<ul class="nav" id="side-menu" class="linksCo" style="padding-top:30px">
                        <li>
                            <a href="router.php?page=guest"> Home</a>
                        </li>
                        <li>
                            <a href="router.php?page=history">View Guest History</a>
                        </li> 
                        <li>
                            <a> Transaction<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                 <li>
                                    <a href="router.php?page=rooom_avail"> Check Available Balances</a>
                                </li> 
                                 <li>
                                    <a href="router.php?page=rooom_athorise_reservation"> Authorize Reservation </a>
                                </li> 
                                   <li>
                            <a href="router.php?page=transaction">View Transaction History</a>
                        </li> 
						    <li>
                            <a href="router.php?page=transaction">View Transaction Mambo History</a>
                        </li> 
	       		     </ul></li>
						<li>
                            <a> Reservation<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                 <li>
                                    <a href="router.php?page=rooom_avail"> Check Available Rooms</a>
                                </li> 
	       		     <li>
                                    <a href="router.php?page=verify_tok">Verify Mobile Payments </a>
                                </li>                                                           
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>							                  									
						<li>	
						<a href="#"> Profile<span class="fa arrow"></span></a>	
						  <ul class="nav nav-second-level">
                       <li><a href="router.php?page=profile&&uid=<?php echo  $_SESSION['gid']; ?>"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>						
						</li>
                           <li class="linksCo">
					        <a style="font-weight:bold">Guest Details</span></a>
                            <ul class="nav nav-second-level">
							<li>
                                    <a><span id="info">Username:&nbsp;&nbsp;<?php echo $userid;?></span></a>
                                </li>
                                <li>
                                    <a><span id="info">GUEST ID:&nbsp;&nbsp;<?php echo $_SESSION["gid"];?></span></a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>	
                    </ul>			
<?php                         
      } if($status=="reception")
                 { // reception Panel
			?>
			<ul class="nav" id="side-menu" class="linksCo" style="padding-top:30px">
                        <li>
                            <a href="router.php?page=home"> Home</a>
                        </li>
                       
                             <li>
                            <a style="cursor:pointer"> Guest<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                  <li>
                                    <a href="router.php?page=add_guest">Add Guest</a>
                                </li>
                             <li>
                            <a href="router.php?page=history">View Guest History</a>
                        </li>   <li>
                            <a href="router.php?page=transaction">View Transaction History</a>
                        </li>                                                           
							</ul>
                            <!-- /.nav-second-level -->
                        </li> 
                      
						<li>
                            <a> Reservation<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">                                                            
                                <li>
                                    <a href="router.php?page=appoint"> View </a>
                                </li>                               
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>							                  									
			<li>	
			<a href="#"> Profile<span class="fa arrow"></span></a>	
						  <ul class="nav nav-second-level">
                       <li><a href="router.php?page=profile&&uid=<?php echo  $_SESSION['rid'];?>"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>						
						</li>
                           <li class="linksCo">
					        <a style="font-weight:bold">Reception Details</span></a>
                            <ul class="nav nav-second-level">
							<li>
                                    <a><span id="info">Username:&nbsp;&nbsp;<?php echo $userid;?></span></a>
                                </li>
                                <li>
                                    <a><span id="info">Reception ID:&nbsp;&nbsp;<?php echo $hotelName."-ID-".$_SESSION["rid"];?></span></a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>	
                    </ul>			
<?php                         
      }

                 else if($status=="admin"){   //Administrator panel
					?>
			<ul class="nav" id="side-menu" style="padding-top:20px">
                        <li>
                            <a href="router.php?page=home"> Home</a>
                        </li>
                         <li>
                             <a target="blank" href="mobileAgent.php">Listen to Incomming Request</a>
                        </li> 
                        <li>
                            <a style="cursor:pointer"> Create Account<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                  <li>
                                    <a href="router.php?page=add_guest">Add Guest Account</a>
                                </li>
                                <li>
                                    <a href="router.php?page=AdminReceptReg">Add Reception Account</a>
                                </li>
                                <li>
                                    <a href="router.php?page=admin_reg">Add Administrator Account</a>
                                </li>
                            
			</ul>
                            <!-- /.nav-second-level -->
                        </li> 
			<li>
                            <a style="cursor:pointer"> Guest<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
						<li>
                            <a href="router.php?page=history">Guest History</a>
                        </li>   
                        <li>
                            <a href="router.php?page=transaction">Transaction</a>
                        </li>                     
						 </li> 
							</ul>
                            <!-- /.nav-second-level -->
                      <li>
                            <a href="#"> View Account<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="router.php?page=view_receptions">Reception Account</a>
                                </li>
                                <li>
                                    <a href="router.php?page=view_admin">Administrator Account</a>
                                </li>
                                <li>
                                    <a href="router.php?page=view_guest">Guest Account</a>
                                </li>							 
			 </ul>
                            <!-- /.nav-second-level -->
                        </li>
                           <li>						
                            <a href="router.php?page=accoutant_pay"> <span class="fa arrow"></span>Room Management</a>								  
						    <ul class="nav nav-second-level">
							  <li class="divider"></li>						
				<li>
                                          <a href="router.php?page=addRoom">Add Room</a>
                                </li>
                                <li>
                                          <a href="router.php?page=addRoomType">Room Type</a>
                                </li>
                                 <li>
                                          <a href="router.php?page=rooms">Rooms View </a>
                                </li>
                                
						    <li class="divider"></li>
							 </ul>							 
                        </li>
					<li>	
						<a href="#"> Profile<span class="fa arrow"></span></a>	
						  <ul class="nav nav-second-level">
                       <li><a href="router.php?page=profile&&uid=<?php echo $_SESSION["adminID"]; ?>"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>						
						</li>
					<li style="background:#ffffff">
					        <a style="font-weight:bold;cursor:pointer">ADMIN INFORMATION</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
							<li>
                                    <a><span id="info">Username:&nbsp;&nbsp;<?php echo $_SESSION["username"];?></span></a>
                                </li>
                                <li>
                                    <a><span id="info">Admin Id:&nbsp;&nbsp;<?php echo $_SESSION["adminID"];?></span></a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>		
					</ul>
                <?php	                
      }  
   ?> 
               </div></div></nav>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">	
                    <?php 
              $pg=$_GET["page"];       //    
             if($status=="admin" and $pg=="home"){
                        $title="Administrator Home";
             }else if($status=="admin" and $pg=="AdminReceptReg"){
                        $title="Add Reception";
             }if($status=="admin" and $pg=="admin_reg"){
                        $title="Add AdminStrator";
             }if($status=="admin" and $pg=="view_receptions"){
                        $title="Receptions Staff";
             }else if($status=="admin" and $pg=="view_admin"){
                        $title="Admin Staff";
             }else if($status=="admin" and $pg=="view_guest"){
                        $title="List of Registered Guests";
             }else if($status=="guest" and $pg=="guest"){
                        $title="Guest Home";
             }
             else if($status=="guest" and $pg=="verify_tok"){
                        $title="Verify Mobile Payment";
             }
              else if($status=="admin" and $pg=="view_reception_delete"){
                        $title="List of Registered Reception Staff";
             }
             else if($status=="admin" and $pg=="editReception"){
                        $title="Edit Reception Staff ";
             }else if($status=="admin" and $pg=="roomFacility"){
                        $title="Room Facilities ";
             }  else if($status=="admin" and $pg=="view_facility_delete"){
                 $title=" Room Facilities ";                 
             } else if($status=="admin" and $pg=="rooms"){
                 $title=" Rooms ";                 
             }
             else if($status=="admin" and $pg=="view_facility_edit"){
                        $title="{$_GET['name']} Room Facility ";
             }
              else if($pg=="profile"){
                  
                  if("admin"==$status){
                     $user="AdminStrator";
                  } else if("guest"==$status) {                      
                   $user="Guest";
                  } else if("reception"==$status) {                      
                   $user="Reception";
                  }                  
                   $title=$user." Profile ";                                                
             }  else if($pg=="rbprice"){                  
                  if("admin"==$status){
                     $user="AdminStrator";
                  } else if("guest"==$status) {                      
                   $user="Guest";
                  } else if("reception"==$status) {                      
                   $user="Reception";
                  }                  
                   $title=$user." Room Check Price ";                                                
             }
              else if($status=="admin" and $pg=="view_guest_edit"){
                        $title="Edit Guest  ";
             }
             else if($status=="reception" and $pg=="home"){                             
                   $title="Reception Home";    
             }else if($status=="guest" and $pg=="rooom_avail"){                             
                   $title="Room   Available";    
             }else if(($status=="reception" or $status=="admin") and $pg=="add_guest"){                             
                   $title="Add Guest";    
             }else if($status=="admin" and $pg=="rooom_avail"){                             
                 $title="Room   Available";   
             }  else if($pg=="rooom_athorise_reservation"){
                 $title="Room   Monitor Reservation";   
             }else if($status=="admin" and $pg=="addRoomType"){
                        $title="Room   Service"; 
             }else if( $pg=="history"){
                    $title="Guest History"; 
             }else if( $pg=="transaction"){
                    $title="Transaction History"; 
             }
             else if($status=="guest" and $pg=="room"){  
                   $dataImageMap=array(1=>"executive",2=>"Standard",3=>"Super",4=>"normal");
                     if(isset($_GET['type'])){
                   $title=$dataImageMap[$_GET['type']]."   Room   ";    
                     }
             } else if($status=="admin" and $pg=="room"){  
                   $dataImageMap=array(1=>"executive",2=>"Standard",3=>"Super",4=>"normal");
               if(isset($_GET['type'])){
                   $title=$dataImageMap[$_GET['type']]."   Room   ";   
                } else if($pg=="bookRoom"){            
                 $title="Book Room Service"; 
             } 
                
             }          
                    ?>
                    <h2><div style="margin-top:30px" class="page-header">&nbsp;&nbsp;&nbsp;<?php echo strtoupper($title); ?></div></h2>           
				</div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.Content Page -->
            <div class="row" style="overflow-y: auto;height: 650px;">
                       
            <?php             
              if($status=="admin" and $pg=="home"){
                  require_once 'adminHome.php';       
             }else if($pg=="AdminReceptReg"){                             
                   require_once 'addReceptionReg.php';     
             }
             else if($status=="admin" and $pg=="admin_reg"){
                 require_once 'addAdmin.php';
             } else if($status=="admin" and $pg=="view_receptions"){
                        require_once 'viewReceptionist.php';
             }else if($status=="admin" and $pg=="view_admin"){
                        require_once 'viewAdmin.php';
             }else if($status=="admin" and $pg=="addRoom"){
                        require_once 'addRoom.php';
             }else if($status=="admin" and $pg=="addRoomType"){
                        require_once 'addRoomType.php';
             }else if($status=="admin" and $pg=="roomAvail"){
                        require_once 'viewRoomAvailAdmin.php';
             }else if( $pg=="transaction"){
                 require_once 'transaction.php';
             }
             else if($status=="admin" and $pg=="editReception" and isset($_GET['action']) and $_GET['action']=="edit"){                         
                        require_once 'editReception.php';
             }else if($status=="admin" and $pg=="view_reception_delete" and isset($_GET['action'])and $_GET['action']=="delete"){               
                  echo "<script type='text/javascript'> if(!confirm('Are you sure'))return false;</script>";  
                      (new View($connect,"reception"))->deleteRecordByName("rid",$_GET['id']);
                      require_once 'viewReceptionist.php';
             }else if($status=="admin" and $pg=="view_guest_delete" and isset($_GET['action'])and $_GET['action']=="delete"){                             
                      (new View($connect,"guest"))->deleteRecordByName("gid",$_GET['id']);
                      require_once 'viewGuest.php';
             }else if($status=="admin" and $pg=="view_guest"){
                        require_once 'viewGuest.php';
             }else if($status=="admin" and $pg=="view_guest_edit"  and isset($_GET['action']) and $_GET['action']=="edit"){
                        require_once 'editGuestView.php';
             }
             else if($status=="guest" and $pg=="guest"){
                 require_once 'guestHome.php';
             }
             else if($status=="reception" and $pg=="home"){                             
                   require_once 'receptionHome.php';   
             }else if($status=="guest" and $pg=="rooom_avail"){                             
                 require_once 'roomAvail.php';
             } else if($status=="admin" and $pg=="rooom_avail"){                             
                 require_once 'roomAvail.php';
             }else if(($status=="reception" or $status=="admin") and $pg=="add_guest"){                             
                 require_once 'addGuestAdmin.php';    
             }else if($status=="admin" and $pg=="roomFacility"){
                 require_once 'roomFacility.php';
             }else if($status=="admin" and $pg=="view_facility_edit"){
                 require_once 'facilityEdit.php';
             }else if($status=="admin" and $pg=="rooms"){
                 require_once 'rooms.php';
             }else if($pg=="history"){
                 require_once 'guestHistory.php';
             }
             else if($pg=="rooom_athorise_reservation"){
                 require_once 'rooom_athorise_reservation.php';
             }
             else if($status=="admin" and $pg=="edit_admin"){
                 require_once 'editAdmin.php';
             } else if($status=="admin" and $pg=="view_admin_delete"){
                 (new View($connect,"users"))->deleteRecordByName("id",$_GET['id']);
                 require_once 'viewAdmin.php';
             }
             else if($status=="admin" and $pg=="view_facility_delete"){
                 (new View($connect,"facility_list"))->deleteRecordByName("id",$_GET['id']);
                 require_once 'roomFacility.php';
             }
             else if(($status=="admin" or $status=="reception" or $status=="guest") and $pg=="profile"){
                 require_once 'profile.php';
             }
             else if($status=="guest" and $pg=="room"){                     
                 require_once 'room.php';
             } else if($status=="admin" and $pg=="room"){                     
                 require_once 'room.php';
             }  else if($pg=="rbprice"){            
                 require_once 'roomBookPrice.php';
             }  else if($pg=="bookRoom"){            
                 require_once 'bookRoom.php';
             } else if($status=="guest" and $pg=="verify_tok"){
                 require_once 'verifyToken.php';
             }
?>			
            <!-- /.Content Page -->
        </div>
        <!-- /#page-wrapper -->
    </div>

    <script src="resource/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="resource/js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script src="resource/js/main.js"></script>
</body>
<?php
}//session exist else
 else {
    header("location:index.php");    
}
?>
