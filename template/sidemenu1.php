<?php
include("dbconnection/connection.php");
if($name != "admin"){
$emp_id = $name;
	
$r=mysqli_query($link,"select empname from admin_login where user='$emp_id'") or die(mysqli_close($link));
$row=mysqli_fetch_array($r);
  $empname=$row['empname'];	
	 $p="SELECT D.menus FROM hr_user as D,admin_login as M  WHERE D.emp_id=M.empname and D.emp_id='$empname' ";
$sql = mysqli_query($link,$p) or die(mysqli_close($link));
$menu2 = "0";
// $menu0200 = "0";
// $menu3 = "0";
// $menu31 = "0";
$menu4 = "0";
$menu240 = "0";
$menu5 = "0";
$menu99 = "0";
$menu6 = "0";
$menu10 = "0";
if($sql){
$i=0;
while($row = mysqli_fetch_array($sql)){
  $menu= $row[0];
	if($menu == "2"){$menu2="2";}
	if($menu == "21"){$menu21="21";}
	if($menu == "22"){$menu22="22";}
	if($menu == "23"){$menu23="23";}
	if($menu == "24"){$menu24="24";}
	if($menu == "25"){$menu25="25";}
	if($menu == "26"){$menu26="26";}
    if($menu == "92"){$menu92="92";}
    if($menu == "93"){$menu93="93";}
	if($menu == "94"){$menu94="94";}
	if($menu == "95"){$menu95="95";}
	if($menu == "96"){$menu96="96";}
	if($menu == "97"){$menu97="97";}
	if($menu == "98"){$menu99="98";}
	if($menu == "99"){$menu99="99";}
	if($menu == "100"){$menu100="100";}
	if($menu == "101"){$menu101="101";}
	// if($menu == "102"){$menu102="102";}
	// if($menu == "103"){$menu103="103";}
	
	
	
	// if($menu == "3"){$menu3="3";}
	// if($menu == "31"){$menu31="31";}
	//if($menu == "32"){$menu32="32";}
	//if($menu == "33"){$menu33="33";}
	//if($menu == "34"){$menu34="34";}
	
	
	// if($menu == "8"){$menu8="8";}
	// if($menu == "81"){$menu81="81";}
	// if($menu == "82"){$menu82="82";}
	// if($menu == "83"){$menu83="83";}
	// if($menu == "84"){$menu84="84";}
	// if($menu == "85"){$menu85="85";}
	
	
	if($menu == "5"){$menu5="5";}
	if($menu == "51"){$menu51="51";}
	if($menu == "52"){$menu52="52";}
	if($menu == "53"){$menu53="53";}
	if($menu == "54"){$menu54="54";}
	if($menu == "55"){$menu55="55";}
	if($menu == "56"){$menu56="56";}
	if($menu == "57"){$menu57="57";}
	if($menu == "58"){$menu58="58";}
	if($menu == "59"){$menu59="59";}
	if($menu == "500"){$menu500="500";}
	if($menu == "501"){$menu501="501";}
	if($menu == "502"){$menu502="502";}
	if($menu == "503"){$menu503="503";}
	// if($menu == "504"){$menu504="504";}
	if($menu == "505"){$menu505="505";}
	if($menu == "506"){$menu506="506";}
	// if($menu == "507"){$menu507="507";}
	if($menu == "508"){$menu508="508";}
	
	if($menu == "4") {$menu4="4";}
	if($menu == "41"){$menu41="41";}
	if($menu == "42"){$menu42="42";}
	if($menu == "43"){$menu43="43";}
	if($menu == "44"){$menu44="44";}
	if($menu == "45"){$menu45="45";}
	if($menu == "46"){$menu46="46";}
	if($menu == "47"){$menu47="47";}
	if($menu == "48"){$menu48="48";}
	if($menu == "49"){$menu49="49";}
	if($menu == "400"){$menu400="400";}
	if($menu == "401"){$menu401="401";}
	if($menu == "402"){$menu402="402";}
	if($menu == "403"){$menu403="403";}
	// if($menu == "404"){$menu404="404";}
	if($menu == "405"){$menu405="405";}
	if($menu == "406"){$menu406="406";}
	if($menu == "407"){$menu407="407";}
	if($menu == "408"){$menu408="408";}
	
	if($menu == "6"){$menu6="6";}
	if($menu == "61"){$menu61="61";}
	if($menu == "62"){$menu62="62";}
	if($menu == "63"){$menu63="63";}
	if($menu == "64"){$menu64="64";}
	if($menu == "65"){$menu65="65";}
	if($menu == "66"){$menu66="66";}
	if($menu == "67"){$menu67="67";}
	if($menu == "68"){$menu68="68";}
	if($menu == "69"){$menu69="69";}
	if($menu == "600"){$menu600="600";}
	if($menu == "601"){$menu601="601";}
	if($menu == "602"){$menu602="602";}
	if($menu == "603"){$menu603="603";}
	// if($menu == "604"){$menu604="604";}
	if($menu == "605"){$menu605="605";}
	if($menu == "606"){$menu606="606";}
	// if($menu == "607"){$menu607="607";}
	if($menu == "608"){$menu608="608";}
	
	// if($menu == "7"){$menu7="7";}
	// if($menu == "71"){$menu71="71";}
	// if($menu == "72"){$menu72="72";}
	// if($menu == "73"){$menu73="73";}
	// if($menu == "74"){$menu74="74";}
	// if($menu == "75"){$menu75="75";}
	// if($menu == "76"){$menu76="76";}
	// if($menu == "77"){$menu77="77";}
	// if($menu == "78"){$menu78="78";}
	// if($menu == "79"){$menu79="79";}
	// if($menu == "700"){$menu700="700";}
	// if($menu == "701"){$menu701="701";}
	// if($menu == "702"){$menu702="702";}
	// if($menu == "703"){$menu703="703";}
	// if($menu == "704"){$menu704="704";}
	// if($menu == "705"){$menu705="705";}
	// if($menu == "706"){$menu706="706";}
	// if($menu == "707"){$menu707="707";}
	// if($menu == "708"){$menu708="708";}
	
	if($menu == "10"){$menu10="10";}
	if($menu == "11"){$menu11="11";}
	if($menu == "12"){$menu12="12";}
	if($menu == "13"){$menu13="13";}
	if($menu == "14"){$menu14="14";}
	if($menu == "15"){$menu15="15";}
	// if($menu == "16"){$menu16="16";}
	if($menu == "17"){$menu17="17";}
	if($menu == "18"){$menu18="18";}
	if($menu == "19"){$menu19="19";}
	if($menu == "20"){$menu20="20";}
	if($menu == "116"){$menu116="116";}
	if($menu == "121"){$menu121="121";}
	if($menu == "122"){$menu122="122";}
	if($menu == "123"){$menu123="123";}
	if($menu == "124"){$menu124="124";}
	// if($menu == "125"){$menu125="125";}
	if($menu == "126"){$menu126="126";}
	// if($menu == "127"){$menu127="127";}
	if($menu == "128"){$menu128="128";}
	

	if($menu == "91"){$menu91="91";}
	if($menu == "92"){$menu92="92";}
	if($menu == "93"){$menu93="93";}
	if($menu == "94"){$menu94="94";}
	if($menu == "95"){$menu95="95";}
	if($menu == "96"){$menu96="96";}
	if($menu == "97"){$menu97="97";}
	if($menu == "98"){$menu98="98";}
	if($menu == "16"){$menu16="16";}
	if($menu == "9"){$menu9="9";}
	if($menu == "999"){$menu999="999";}

	//EXPENSES
	
	if($menu == "1111"){$menu1111="1111";}
	if($menu == "110"){$menu110="110";}
	if($menu == "111"){$menu111="111";}
	if($menu == "112"){$menu112="112";}
	if($menu == "113"){$menu113="113";}
	if($menu == "114"){$menu114="114";}
	if($menu == "115"){$menu115="115";}
	
	
	//OD TRACKER
	if($menu == "240"){$menu240="240";}
	if($menu == "241"){$menu241="241";}
	if($menu == "242"){$menu242="242";}
	if($menu == "243"){$menu243="243";}
	if($menu == "244"){$menu244="244";}
	if($menu == "245"){$menu245="245";}
	if($menu == "246"){$menu246="246";}
	if($menu == "247"){$menu247="247";}
	if($menu == "248"){$menu248="248";}
	if($menu == "249"){$menu249="249";}
	if($menu == "2410"){$menu2410="2410";}
	if($menu == "2411"){$menu2411="2411";}
	if($menu == "2412"){$menu2412="2412";}
	if($menu == "2413"){$menu2413="2413";}
	if($menu == "2414"){$menu2414="2414";}
	if($menu == "2415"){$menu2415="2415";}
	if($menu == "2416"){$menu2416="2416";}
	// if($menu == "2417"){$menu2417="2417";}
	// if($menu == "2418"){$menu2418="2418";}
}
}
	
?>	
	
<ul class="nav nav-list">
				<li class="">
						<a href="dashboard.php">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>
					
					 <li class="">
								<a href="store_list.php">
									<i class="menu-icon fa fa-hospital-o"></i>
									Store List
								</a>
			
							</li>
<?php if($menu2 == "2"){ ?>	
<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-cog"></i>
							<span class="menu-text">
								Settings
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
					<?php if($menu21 == "21"){ ?>	<li class="">
								<a href="organization.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Update Organization
								</a>

								
							</li><?php }?>
							
						<?php if($menu22 == "22"){ ?>	<li class="">
								<a href="addemployee.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Add Employee
								</a>

								
							</li><?php }?>
							<?php if($menu23 == "23"){ ?><li class="">
								<a href="addmaterials.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Add Materials
								</a>

								
							</li><?php }?>
							<?php if($menu91 == "91"){ ?>
							<li class="">
								<a href="superwiser.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Add Supervisor Name
								</a>
			
							</li>
							<?php }  if($menu92 == "92"){ ?>
							<li class="">
								<a href="company.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Add Company Name
								</a>
			
							</li><?php }  if($menu93 == "93"){ ?>
							<li class="">
								<a href="afm.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Add AFM
								</a>
			
							</li><?php }  if($menu94 == "94"){ ?>
							<li class="">
								<a href="coordination.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Add Co-Ordinator
								</a>
			
							</li><?php }  if($menu95 == "95"){ ?>
                            	<li class="">
								<a href="ac_det.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Add Account Details
								</a>
			
							</li><?php }  if($menu96 == "96"){ ?>
							 <li class="">
								<a href="store_list.php">
									<i class="menu-icon fa fa-hospital-o"></i>
									Store List
								</a>
			
							</li><?php }  if($menu97 == "97"){ ?>
					
                            
	<li class="">
								<a href="uploaditems_list.php">
									<i class="menu-icon fa fa-caret-right"></i>
								Items List
								</a>
			
							</li>
                            <?php }if($menu98 == "98"){ ?>
					
                            
	<li class="">
								<a href="uploaditems_list.php">
									<i class="menu-icon fa fa-caret-right"></i>
								KN Items List
								</a>
			
							</li>
							<?php }?>
							<?php if($menu99 == "99"){ ?>  <li class="">
								<a href="upload_store1.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Upload store list 
								</a>

								
							</li><?php }?>
							
							<?php if($menu100 == "100"){ ?>  <li class="">
								<a href="tguploaditems_list.php">
									<i class="menu-icon fa fa-caret-right"></i>
									TG Item list 
								</a>

								
							</li><?php }?>
							
							<?php if($menu101 == "101"){ ?>  <li class="">
								<a href="uploadtnitems.php">
									<i class="menu-icon fa fa-caret-right"></i>
								Upload	TN Item list 
								</a>

								
							</li><?php }?>
							
							<?php if($menu102 == "102"){ ?>  <li class="">
								<a href="changeusernames.php">
									<i class="menu-icon fa fa-caret-right"></i>
								Change User Names 
								</a>

								
							</li><?php }?>
							
							<?php if($menu103 == "103"){ ?>  <li class="">
								<a href="form.php">
									<i class="menu-icon fa fa-caret-right"></i>
								Change Status 
								</a>

								
							</li><?php }?>

                            
                           
						</ul>
					</li>
 <?php } ?>
 
 
 
 <?php if($menu3 == "3"){ ?>
<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-upload"></i>
							<span class="menu-text">
								Upload Formats
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
						   
						<?php if($menu24 == "24"){ ?><li class="">
								<a href="productsformat.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Update Products Format
								</a>

								
							</li><?php }?>
                            
							
							<?php if($menu25 == "25"){ ?><li class="">
								<a href="billingformat.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Upload Add Billing Format
								</a>
			
							</li><?php }?>
							
							
							
							
                             <?php if($menu26 == "26"){ ?><li class="">
								<a href="empsalaryformat.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Update Employees Salary Format
								</a>

								
							</li><?php }?>


						   
                          <?php if($menu31 == "31"){ ?>  <li class="">
								<a href="finalemp1.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Employee Activity Report
								</a>

								
							</li><?php }?>

							 

							

							

							
						</ul>
					</li> 
   <?php }?>
	
	
					
 <?php if($menu8 == "8"){ ?> 
<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-cog"></i>
							<span class="menu-text">
								Employee
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
						   
						<?php if($menu81 == "81"){ ?><li class="">
								<a href="addtool.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Add Tools
								</a>

								
							</li><?php }?>
                            
							
							<?php if($menu82 == "82"){ ?><li class="">
								<a href="ptoollist.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Add Tool Purchase
								</a>
			
							</li><?php }?>
							
							
							
							
                             <?php if($menu83 == "83"){ ?><li class="">
								<a href="addacc.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Add Accessories
								</a>

								
							</li><?php }?>


						   
                          <?php if($menu84 == "84"){ ?>  <li class="">
								<a href="employeelist.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Add Employee 
								</a>

								
							</li><?php }?>
							
							<?php if($menu85 == "85"){ ?>  <li class="">
								<a href="assignusernames.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Assign users
								</a>

								
							</li><?php }?>

							 

							

							

							
						</ul>
					</li> 
 <?php }?>           
  
  
                                 
   <?php if($menu4 == "4"){ ?> 
 <li class="">
						<a href="#" class="dropdown-toggle">
						<!--	<i class="menu-icon fa fa-cog"></i>-->
						 <img src="images/ap.png">
							<span class="menu-text">
								AP Tracker
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
						   
						<?php if($menu41 == "41"){ ?>	<li class="">
								<a href="qot_list.php">
									<i class="menu-icon fa fa-caret-right"></i>
									AP Quotations
									<?php $k=mysqli_query($link,"select * from add_qot") or die(mysqli_error($link));
									echo "<b style='color:red;'>(".mysqli_num_rows($k).")</b>";
									?>
								</a>

								
							</li><?php }?>
                            
							
							<?php if($menu42 == "42"){ ?><li class="">
								<a href="roqot_list.php?state=AP">
								    
									<i class="menu-icon fa fa-caret-right"></i>
									RO Required
										<?php $k2=mysqli_query($link,"select * from add_qot where status='Ro Required'") or die(mysqli_error($link));
									echo "<b style='color:red;'>(".mysqli_num_rows($k2).")</b>";
									?>
								</a>
			
							</li><?php }?>
							
                             <?php if($menu43 == "43"){ ?><li class="">
								<a href="wtsqot_list.php">
							
									<i class="menu-icon fa fa-caret-right"></i>
									Work To Be Started
									<?php $k3=mysqli_query($link,"select * from add_qot where status='work to be started'") or die(mysqli_error($link));
									echo "<b style='color:red;'>(".mysqli_num_rows($k3).")</b>";
									?>
								</a>
			
							</li><?php }?>


						   
                          <?php if($menu44 == "44"){ ?> <li class="">
								<a href="req_list.php">
								  
									<i class="menu-icon fa fa-caret-right"></i>
									Requested Amount List
										<?php $k4=mysqli_query($link,"select distinct quet_num from request_amnt where confirm='Pending'") or die(mysqli_error($link));
									echo "<b style='color:red;'>(".mysqli_num_rows($k4).")</b>";
									?>
								</a>
			
							</li><?php }?>
							
							<?php if($menu45 == "45"){ ?>  <li class="">
								<a href="req_list1.php">
								   
									<i class="menu-icon fa fa-caret-right"></i>
									Amount Approved List
										<?php $k5=mysqli_query($link,"select * from request_amnt where confirm='Yes' and status=''") or die(mysqli_error($link));
									echo "<b style='color:red;'>(".mysqli_num_rows($k5).")</b>";
									?>
								</a>
			
							</li><?php }?>
							
							<?php if($menu46 == "46"){ ?>  <li class="">
								<a href="bill_list.php">
								    
									<i class="menu-icon fa fa-caret-right"></i>
									Document Required List
									<?php $k6=mysqli_query($link,"select distinct quet_num from request_amnt where status='Amount Transferred' and bill_status='' or docr_status='Cancel'") or die(mysqli_error($link));
									echo "<b style='color:red;'>(".mysqli_num_rows($k6).")</b>";
									?>
								</a>
			
							</li><?php }?>
							<?php if($menu47 == "47"){ ?>  <li class="">
								<a href="bill_list2.php">
								    
									<i class="menu-icon fa fa-caret-right"></i>
									To Be Raise Invoice
									<?php $k7=mysqli_query($link,"select * from qot_bill where status='payment pending' ") or die(mysqli_error($link));
									echo "<b style='color:red;'>(".mysqli_num_rows($k7).")</b>";
									?>
								</a>
			
							</li><?php }?>
							
							<?php if($menu405 == "405"){ ?>  <li class="">
								<a href="bill_list31.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Raised Invoice List
									<?php $k8=mysqli_query($link,"select * from qot_bill where status='RUn Paid' ") or die(mysqli_error($link));
									echo "<b style='color:red;'>(".mysqli_num_rows($k8).")</b>";
									?>
								</a>
							</li><?php }?>
							
							<?php if($menu48 == "48"){ ?>  <li class="">
								<a href="bill_list3.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Payment Pending Invoice 
									<?php $k8=mysqli_query($link,"select * from qot_bill where status='Un Paid' ") or die(mysqli_error($link));
									echo "<b style='color:red;'>(".mysqli_num_rows($k8).")</b>";
									?>
								</a>
							</li><?php }?>
							<?php if($menu49 == "49"){ ?>  <li class="">
								<a href="bill_list4.php">
							
									<i class="menu-icon fa fa-caret-right"></i>
									Payment Received 
										<?php $k9=mysqli_query($link,"select * from payment") or die(mysqli_error($link));
									echo "<b style='color:red;'>(".mysqli_num_rows($k9).")</b>";
									?>
								</a>

							</li><?php }?>
							<?php if($menu400 == "400"){ ?>  <li class="">
								<a href="work1.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Mark Not Required 
									<?php	 if(($name=='admin') or ($name=='durgarao') or ($name=='accounts') or ($tsname=='sumanthpotluri')){
									    $xh="select * from request_amnt where req='yes' and docr_status!='Cancel'";
									}else{
									    $xh="select * from request_amnt where req='yes' and docr_status!='Cancel' and user='$tsname'";
									}
									 $kt2=mysqli_query($link,$xh) or die(mysqli_error($link));
									echo "<b style='color:red;'>(".mysqli_num_rows($kt2).")</b>";
									?>
								</a>

							</li><?php }?>
							<?php if($menu401 == "401"){ ?> <li class="">
								<a href="work2.php">
									<i class="menu-icon fa fa-caret-right"></i>
								GST Bills Pending 
								<?php	 if(($name=='admin') or ($name=='durgarao') or ($name=='accounts')or ($tsname=='sumanthpotluri') ){
									    $xh="select * from request_amnt where gsttype='With Gst' and gstatus!='approved'  ";
									}else{
									    $xh="select * from request_amnt where gsttype='With Gst' and user='$tsname' and gstatus!='approved' ";
									}
									 $kt2=mysqli_query($link,$xh) or die(mysqli_error($link));
									echo "<b style='color:red;'>(".mysqli_num_rows($kt2).")</b>";
									?>
								</a>

							</li><?php }?>
							<?php if($menu406 == "406"){ ?> <li class="">
								<a href="apaaexcel.php">
									<i class="menu-icon fa fa-caret-right"></i>
								Amount Approved Excel
								</a>


							</li><?php }?>
								<?php if($menu408 == "408"){ ?> <li class="">
								<a href="apraexcel.php">
									<i class="menu-icon fa fa-caret-right"></i>
								Requested Amount  Excel
								</a>


							</li><?php }?>
							<?php if($menu402 == "402"){ ?>
							<li class="">
								<a href="track.php">
									<i class="menu-icon fa fa-caret-right"></i>
								Tracker
								</a>

							</li>
								<?php }?>
								<?php if($menu403 == "403"){ ?>
							<li class="">
								<a href="qutdetails_ap_excel.php?user=<?php echo $name; ?>">
									<i class="menu-icon fa fa-caret-right"></i>
								Quotation Details
								</a>

							</li>
							<?php }?>
							
							
							<?php if($menu404 == "404"){ ?>
						<li class="">
								<a href="apsupervisor.php">
									<i class="menu-icon fa fa-caret-right"></i>
								Supervisor
								</a>

							</li>
							<?php }?>
						</ul>
					</li>        
   <?php }  ?>
   
   <?php if($menu10 == "10"){ ?> 
 <li class="">
						<a href="#" class="dropdown-toggle">
						     <img src="images/kn.png">
						<!--	<i class="menu-icon fa fa-cog"></i>-->
							<span class="menu-text">
								KN Tracker
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
						   
						<?php if($menu11 == "11"){ ?>	<li class="">
								<a href="knqot_list.php">
									<i class="menu-icon fa fa-caret-right"></i>
									 Quotations
									 	<?php $kk2=mysqli_query($link,"select * from add_knqot ") or die(mysqli_error($link));
									echo "<b style='color:red;'>(".mysqli_num_rows($kk2).")</b>";
									?>
								
								</a>

								
							</li><?php }?>
                            
							
							<?php if($menu12 == "12"){ ?><li class="">
								<a href="roqot_list.php?state=KN">
								    
									<i class="menu-icon fa fa-caret-right"></i>
									RO Required
										<?php $k2=mysqli_query($link,"select * from add_knqot where status='Ro Required'") or die(mysqli_error($link));
									echo "<b style='color:red;'>(".mysqli_num_rows($k2).")</b>";
									?>
								</a>
			
							</li><?php }?>
							
                             <?php if($menu13 == "13"){ ?><li class="">
								<a href="knwtsqot_list.php">
							
									<i class="menu-icon fa fa-caret-right"></i>
									Work To Be Started
									<?php $k3=mysqli_query($link,"select * from add_knqot where status='work to be started'") or die(mysqli_error($link));
									echo "<b style='color:red;'>(".mysqli_num_rows($k3).")</b>";
									?>
								</a>
			
							</li><?php }?>


                          <?php if($menu14 == "14"){ ?> <li class="">
								<a href="knreq_list.php">
								  
									<i class="menu-icon fa fa-caret-right"></i>
									Requested Amount List
										<?php $k4=mysqli_query($link,"select distinct quet_num from knrequest_amnt where confirm='Pending'") or die(mysqli_error($link));
									echo "<b style='color:red;'>(".mysqli_num_rows($k4).")</b>";
									?>
								</a>
			
							</li><?php }?>
							
							<?php if($menu15 == "15"){ ?>  <li class="">
								<a href="knreq_list1.php">
								   
									<i class="menu-icon fa fa-caret-right"></i>
									Amount Approved List
										<?php $k5=mysqli_query($link,"select * from knrequest_amnt where confirm='Yes' and status=''") or die(mysqli_error($link));
									echo "<b style='color:red;'>(".mysqli_num_rows($k5).")</b>";
									?>
								</a>
			
						
							</li><?php }?>
							<?php if($menu116 == "116"){ ?>  <li class="">
								<a href="knbill_list.php">
								    
									<i class="menu-icon fa fa-caret-right"></i>
									Document Required List
									<?php $k6=mysqli_query($link,"select distinct quet_num from knrequest_amnt where status='Amount Transferred' and bill_status='' or docr_status='Cancel'") or die(mysqli_error($link));
									echo "<b style='color:red;'>(".mysqli_num_rows($k6).")</b>";
									?>
								</a>
			
							</li><?php }?>
							<?php if($menu17 == "17"){ ?>  <li class="">
								<a href="knbill_list2.php">
								    
									<i class="menu-icon fa fa-caret-right"></i>
									To Be Raise Invoice
									<?php $k7=mysqli_query($link,"select * from knqot_bill where status='payment pending' ") or die(mysqli_error($link));
									echo "<b style='color:red;'>(".mysqli_num_rows($k7).")</b>";
									?>
								</a>
			
							</li><?php }?>
							
								<?php if($menu18 == "18"){ ?>  <li class="">
								<a href="knbill_list31.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Raised Invoice List
									<?php $k8=mysqli_query($link,"select * from knqot_bill where status='RUn Paid' ") or die(mysqli_error($link));
									echo "<b style='color:red;'>(".mysqli_num_rows($k8).")</b>";
									?>
								</a>
							</li><?php }?>
							
							
							<?php if($menu19 == "19"){ ?>  <li class="">
								<a href="knbill_list3.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Payment Pending Invoice 
									<?php $k8=mysqli_query($link,"select * from knqot_bill where status='Un Paid' ") or die(mysqli_error($link));
									echo "<b style='color:red;'>(".mysqli_num_rows($k8).")</b>";
									?>
								</a>
							</li><?php }?>
							<?php if($menu20 == "20"){ ?>  <li class="">
								<a href="knbill_list4.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Payment Received 
															<?php	 if(($name=='admin') or ($name=='durgarao') or ($name=='accounts') or ($tsname=='sumanthpotluri')or ($tsname=='knbilling') ){
									    $xg="select * from knpayment ";
									}else{
									    $xg="select * from knpayment  ";
									}
									 $kk9=mysqli_query($link,$xg) or die(mysqli_error($link));
									echo "<b style='color:red;'>(".mysqli_num_rows($kk9).")</b>";
									?>
			
									
								</a>

							</li><?php }?>
							<?php if($menu121 == "121"){ ?>  <li class="">
								<a href="knwork1.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Mark Not Required 
										<?php	 if(($name=='admin') or ($name=='durgarao') or ($name=='accounts') or ($tsname=='sumanthpotluri')or ($tsname=='knbilling')){
									    $xh="select * from add_knqot where status='Not Required'  ";
									}else{
									    $xh="select * from add_knqot where status='Not Required' and ses='$tsname'  ";
									}
									 $kk10=mysqli_query($link,$xh) or die(mysqli_error($link));
									echo "<b style='color:red;'>(".mysqli_num_rows($kk10).")</b>";
									?>
								</a>

							</li><?php }?>
							<?php if($menu122 == "122"){ ?> <li class="">
								<a href="knwork2.php">
									<i class="menu-icon fa fa-caret-right"></i>
								GST Bills Pending 
								<?php	 if(($name=='admin') or ($name=='durgarao') or ($name=='accounts') or ($tsname=='sumanthpotluri')or ($tsname=='knbilling')){
									    $xh="select * from knrequest_amnt where gsttype='With Gst'  and gstatus!='approved' ";
									}else{
									    $xh="select * from knrequest_amnt where gsttype='With Gst' and user='$tsname' and gstatus!='approved'  ";
									}
									 $kk11=mysqli_query($link,$xh) or die(mysqli_error($link));
									echo "<b style='color:red;'>(".mysqli_num_rows($kk11).")</b>";
									?>
								</a>

							</li><?php }?>
							
								<?php if($menu126 == "126"){ ?>
						<li class="">
								<a href="knaaexcel.php">
									<i class="menu-icon fa fa-caret-right"></i>
								Amount Approved Excel
								</a>

							</li>
							<?php }?>
							
								<?php if($menu128 == "128"){ ?>
						<li class="">
								<a href="knraexcel.php">
									<i class="menu-icon fa fa-caret-right"></i>
								Requested Amount  Excel
								</a>

							</li>
							<?php }?>
							<?php if($menu123 == "123"){ ?>
							<li class="">
								<a href="kntrack.php">
									<i class="menu-icon fa fa-caret-right"></i>
								Tracker
								</a>

							</li>
							<?php }?>
								<?php if($menu124 == "124"){ ?>
							<li class="">
								<a href="qutdetails_kn_excel.php?user=<?php echo $name; ?>">
									<i class="menu-icon fa fa-caret-right"></i>
								Quotation Details
								</a>

							</li>
							<?php }?>
							
							<?php if($menu125 == "125"){ ?>
						<li class="">
								<a href="knsupervisor.php">
									<i class="menu-icon fa fa-caret-right"></i>
								Supervisor
								</a>

							</li>
							<?php }?>
							
						</ul>
					</li>        
   <?php }  ?>
				<?php if($menu240 == "240"){ ?> 
 	<li class="">
						<a href="#" class="dropdown-toggle">
						    <img src="images/tn.png">
					
							<span class="menu-text">
								OD Tracker
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
						    	<?php if($menu241 == "241"){ ?>
						<li class="">
								<a href="odqot_list.php">
									<i class="menu-icon fa fa-caret-right"></i>
									OD Quotations
									<?php $k=mysqli_query($link,"select * from add_odqot") or die(mysqli_error($link));
									echo "<b style='color:red;'>(".$k1=mysqli_num_rows($k).")</b>";
									?>
								</a>

								
							</li><?php }?>
							<?php if($menu242 == "242"){ ?>
							<li class="">
								<a href="roqot_list.php?state=OD">
								    
									<i class="menu-icon fa fa-caret-right"></i>
									RO Required
										<?php $k2=mysqli_query($link,"select * from add_odqot where status='Ro Required'") or die(mysqli_error($link));
									echo "<b style='color:red;'>(".mysqli_num_rows($k2).")</b>";
									?>
								</a>
			
							</li><?php }?>
							<?php if($menu243 == "243"){ ?>
							<li class="">
								<a href="odwtsqot_list.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Work To Be Started
									<?php $k3=mysqli_query($link,"select * from add_odqot where status='work to be started'") or die(mysqli_error($link));
									echo "<b style='color:red;'>(".mysqli_num_rows($k3).")</b>";
									?>
								</a>
			
							</li>
							<?php }?>
							<?php if($menu244 == "244"){ ?>
								<li class="">
								<a href="odreq_list.php">
								  
									<i class="menu-icon fa fa-caret-right"></i>
									Requested Amount List
										<?php $k4=mysqli_query($link,"select distinct quet_num from odrequest_amnt where confirm='Pending'") or die(mysqli_error($link));
									echo "<b style='color:red;'>(".mysqli_num_rows($k4).")</b>";
									?>
								</a>
			
							</li>
							<?php }?>
							<?php if($menu245 == "245"){ ?>
							
								<li class="">
								<a href="odreq_list1.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Amount Approved List
										<?php $k5=mysqli_query($link,"select * from odrequest_amnt where confirm='Yes' and status=''") or die(mysqli_error($link));
									echo "<b style='color:red;'>(".mysqli_num_rows($k5).")</b>";
									?>
								</a>
			
							</li>
							<?php }?>
							<?php if($menu246 == "246"){ ?>
						
							
							<li class="">
								<a href="odbill_list.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Document Required List
									<?php $k6=mysqli_query($link,"select distinct quet_num from odrequest_amnt where status='Amount Transferred' and bill_status='' or docr_status='Cancel'") or die(mysqli_error($link));
									echo "<b style='color:red;'>(".mysqli_num_rows($k6).")</b>";
									?>
								</a>
			
							</li>
							
                           <?php }?>
							<?php if($menu247 == "247"){ ?>
                           	<li class="">
								<a href="odbill_list2.php">
									<i class="menu-icon fa fa-caret-right"></i>
									To Be Raise Invoice
									<?php $k7=mysqli_query($link,"select * from odqot_bill where status='payment pending' ") or die(mysqli_error($link));
									echo "<b style='color:red;'>(".mysqli_num_rows($k7).")</b>";
									?>
								</a>
			
							</li>
							   <?php }?>
							<?php if($menu248 == "248"){ ?> 
                            	<li class="">
								<a href="odbill_list31.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Raised Invoice List
									<?php $k8=mysqli_query($link,"select * from odqot_bill where status='RUn Paid' ") or die(mysqli_error($link));
									echo "<b style='color:red;'>(".mysqli_num_rows($k8).")</b>";
									?>
								</a>
			
							</li>
                           <?php }?>
							<?php if($menu249 == "249"){ ?>
                           
                            <li class="">
								<a href="odbill_list3.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Payment Pending Invoice 
									<?php $k8=mysqli_query($link,"select * from odqot_bill where status='Un Paid' ") or die(mysqli_error($link));
									echo "<b style='color:red;'>(".mysqli_num_rows($k8).")</b>";
									?>
								</a>
							</li>
							<?php }?>
							<?php if($menu2410 == "2410"){ ?>
							<li class="">
								<a href="odbill_list4.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Payment Received 
										<?php $k9=mysqli_query($link,"select * from odpayment  ") or die(mysqli_error($link));
									echo "<b style='color:red;'>(".mysqli_num_rows($k9).")</b>";
									?>
								</a>

							</li>
							<?php }?>
							<?php if($menu2411 == "2411"){ ?>
								<li class="">
								<a href="odwork1.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Mark Not Required 
									<?php $k10=mysqli_query($link,"select * from odrequest_amnt where req='yes' and docr_status!='Cancel'  ") or die(mysqli_error($link));
									echo "<b style='color:red;'>(".mysqli_num_rows($k10).")</b>";
									?>
								</a>

							</li>
							
							<?php }?>
							<?php if($menu2412 == "2412"){ ?>
								<li class="">
								<a href="odwork2.php">
									<i class="menu-icon fa fa-caret-right"></i>
								GST Bills Pending 
								<?php $kk11=mysqli_query($link,"select * from odrequest_amnt where gsttype='With Gst' and gstatus!='approved'  ") or die(mysqli_error($link));
									echo "<b style='color:red;'>(".mysqli_num_rows($kk11).")</b>";
									?>
								</a>
								
								</a>

							</li>
							<?php }?>
							<?php if($menu2413 == "2413"){ ?>
								<li class="">
							<a href="odaaexcel.php">
								    
									<i class="menu-icon fa fa-caret-right"></i>
								Amount Approved Excel
								</a>

							</li>
							<?php }?>
							<?php if($menu2414 == "2414"){ ?>
								<li class="">
							<a href="odraexcel.php">
								    
									<i class="menu-icon fa fa-caret-right"></i>
							Requested Amount  Excel
								</a>

							</li>
							<?php }?>
							<?php if($menu2415 == "2415"){ ?>
							<li class="">
								<a href="odtrack.php">
									<i class="menu-icon fa fa-caret-right"></i>
								Tracker
								</a>

							</li>
								<?php }?>
							<?php if($menu2416 == "2416"){ ?>
							<li class="">
								<a href="qutdetails_od_excel.php?user=<?php echo $name; ?>">
									<i class="menu-icon fa fa-caret-right"></i>
								Quotation Details
								</a>

							</li>
							<?php }?>
							<?php if($menu2417 == "2417"){ ?>
							<li class="">
								<a href="odsupervisor.php">
									<i class="menu-icon fa fa-caret-right"></i>
								Supervisor
								</a>

							</li>
                           <?php }?>
							
						</ul>
					</li>       
   <?php }  ?> 	

   <?php if($menu5 == "5"){ ?> 
 <li class="">
						<a href="#" class="dropdown-toggle">
						     <img src="images/ts.png">
						<!--	<i class="menu-icon fa fa-cog"></i>-->
							<span class="menu-text">
								TG Tracker
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
						   
						<?php if($menu51 == "51"){ ?>	<li class="">
								<a href="tgqot_list.php">
									<i class="menu-icon fa fa-caret-right"></i>
									 Quotations
									 	<?php $kt2=mysqli_query($link,"select * from add_tgqot ") or die(mysqli_error($link));
									echo "<b style='color:red;'>(".mysqli_num_rows($kt2).")</b>";
									?>
								
								</a>

								
							</li><?php }?>
                            
							
							<?php if($menu52 == "52"){ ?><li class="">
								<a href="roqot_list.php?state=TG">
								    
									<i class="menu-icon fa fa-caret-right"></i>
									RO Required
										<?php $k2=mysqli_query($link,"select * from add_tgqot where status='Ro Required'") or die(mysqli_error($link));
									echo "<b style='color:red;'>(".mysqli_num_rows($k2).")</b>";
									?>
								</a>
			
							</li><?php }?>
							
							
							
							
                             <?php if($menu53 == "53"){ ?><li class="">
								<a href="tgwtsqot_list.php">
							
									<i class="menu-icon fa fa-caret-right"></i>
									Work To Be Started
									<?php $k3=mysqli_query($link,"select * from add_tgqot where status='work to be started'") or die(mysqli_error($link));
									echo "<b style='color:red;'>(".mysqli_num_rows($k3).")</b>";
									?>
								</a>
			
							</li><?php }?>


						   
                          <?php if($menu54 == "54"){ ?> <li class="">
								<a href="tgreq_list.php">
								  
									<i class="menu-icon fa fa-caret-right"></i>
									Requested Amount List
										<?php $k4=mysqli_query($link,"select distinct quet_num from tgrequest_amnt where confirm='Pending'") or die(mysqli_error($link));
									echo "<b style='color:red;'>(".mysqli_num_rows($k4).")</b>";
									?>
								</a>
			
							</li><?php }?>
							
							<?php if($menu55 == "55"){ ?>  <li class="">
								<a href="tgreq_list1.php">
								   
									<i class="menu-icon fa fa-caret-right"></i>
									Amount Approved List
										<?php $k5=mysqli_query($link,"select * from tgrequest_amnt where confirm='Yes' and status=''") or die(mysqli_error($link));
									echo "<b style='color:red;'>(".mysqli_num_rows($k5).")</b>";
									?>
								</a>
			
							</li><?php }?>
								
														<?php if($menu56 == "56"){ ?>  <li class="">
								<a href="tgbill_list.php">
								    
									<i class="menu-icon fa fa-caret-right"></i>
									Document Required List
									<?php $k6=mysqli_query($link,"select distinct quet_num from tgrequest_amnt where status='Amount Transferred' and bill_status='' or docr_status='Cancel'") or die(mysqli_error($link));
									echo "<b style='color:red;'>(".mysqli_num_rows($k6).")</b>";
									?>
								</a>
			
							</li><?php }?>
							<?php if($menu57 == "57"){ ?>  <li class="">
								<a href="tgbill_list2.php">
								    
									<i class="menu-icon fa fa-caret-right"></i>
									To Be Raise Invoice
									<?php $k7=mysqli_query($link,"select * from tgqot_bill where status='payment pending' ") or die(mysqli_error($link));
									echo "<b style='color:red;'>(".mysqli_num_rows($k7).")</b>";
									?>
								</a>
			
							</li><?php }?>
							
								<?php if($menu505 == "505"){ ?>  <li class="">
								<a href="tgbill_list31.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Raised Invoice List
									<?php $k8=mysqli_query($link,"select * from tgqot_bill where status='RUn Paid' ") or die(mysqli_error($link));
									echo "<b style='color:red;'>(".mysqli_num_rows($k8).")</b>";
									?>
								</a>
							</li><?php }?>
							<?php if($menu58 == "58"){ ?>  <li class="">
								<a href="tgbill_list3.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Payment Pending Invoice 
									<?php $k8=mysqli_query($link,"select * from tgqot_bill where status='Un Paid' ") or die(mysqli_error($link));
									echo "<b style='color:red;'>(".mysqli_num_rows($k8).")</b>";
									?>
								</a>
							</li><?php }?>
							<?php if($menu59 == "59"){ ?>  <li class="">
								<a href="tgbill_list4.php">
							
									<i class="menu-icon fa fa-caret-right"></i>
									Payment Received 
										<?php $k9=mysqli_query($link,"select * from tgpayment  ") or die(mysqli_error($link));
									echo "<b style='color:red;'>(".mysqli_num_rows($k9).")</b>";
									?>
								</a>

							</li><?php }?>
							<?php if($menu500 == "500"){ ?>  <li class="">
								<a href="tgwork1.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Mark Not Required 
									<?php	 if(($name=='admin') or ($name=='durgarao') or ($name=='accounts') ){
									    $xh="select * from add_tgqot where status='Not Required'  ";
									}else{
									    $xh="select * from add_tgqot where status='Not Required' and ses='$tsname'  ";
									}
									 $kt2=mysqli_query($link,$xh) or die(mysqli_error($link));
									echo "<b style='color:red;'>(".mysqli_num_rows($kt2).")</b>";
									?>
								</a>

							</li><?php }?>
							<?php if($menu501 == "501"){ ?> <li class="">
								<a href="tgwork2.php">
									<i class="menu-icon fa fa-caret-right"></i>
								GST Bills Pending 
									<?php	 if(($name=='admin') or ($name=='durgarao') or ($name=='accounts') or ($tsname=='sumanthpotluri')or ($tsname=='naiduys') ){
									    $xh="select * from tgrequest_amnt where gsttype='With Gst' and gstatus!='approved'  ";
									}else{
									    $xh="select * from tgrequest_amnt where gsttype='With Gst' and user='$tsname' and gstatus!='approved'  ";
									}
									 $kt2=mysqli_query($link,$xh) or die(mysqli_error($link));
									echo "<b style='color:red;'>(".mysqli_num_rows($kt2).")</b>";
									?>
								</a>

							</li><?php }?>
								<?php if($menu506 == "506"){ ?> <li class="">
								<a href="tsaaexcel.php">
									<i class="menu-icon fa fa-caret-right"></i>
								Amount Approved Excel
								</a>


							</li><?php }?>
							<?php if($menu508 == "508"){ ?> <li class="">
								<a href="tsraexcel.php">
									<i class="menu-icon fa fa-caret-right"></i>
							Requested Amount  Excel
								</a>


							</li><?php }?>
							<?php if($menu502 == "502"){ ?>
							<li class="">
								<a href="tgtrack.php">
									<i class="menu-icon fa fa-caret-right"></i>
								Tracker
								</a>

							</li>
							<?php }?>
							<?php if($menu503 == "503"){ ?>
							<li class="">
								<a href="qutdetails_tg_excel.php?user=<?php echo $name; ?>">
									<i class="menu-icon fa fa-caret-right"></i>
								Quotation Details
								</a>

							</li>
							
							<?php }?>
							
							<?php if($menu504 == "504"){ ?>
						<li class="">
								<a href="tgsupervisor.php">
									<i class="menu-icon fa fa-caret-right"></i>
								Supervisor
								</a>

							</li>
							<?php }?>
							
						</ul>
					</li>        
   <?php }  ?> 


  <?php if($menu6 == "6"){ ?> 
 <li class="">
						<a href="#" class="dropdown-toggle">
						     <img src="images/kl.png">
							<!--<i class="menu-icon fa fa-cog"></i>-->
							<span class="menu-text">
								KL Tracker
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
						   
						<?php if($menu61 == "61"){ ?>	<li class="">
								<a href="klqot_list.php">
									<i class="menu-icon fa fa-caret-right"></i>
									 Quotations
									 	<?php $kk2=mysqli_query($link,"select * from add_klqot ") or die(mysqli_error($link));
									echo "<b style='color:red;'>(".mysqli_num_rows($kk2).")</b>";
									?>
								
								</a>

								
							</li><?php }?>
                            
							
							<?php if($menu62 == "62"){ ?><li class="">
								<a href="roqot_list.php?state=KL">
								    
									<i class="menu-icon fa fa-caret-right"></i>
									RO Required
										<?php $k2=mysqli_query($link,"select * from add_klqot where status='Ro Required'") or die(mysqli_error($link));
									echo "<b style='color:red;'>(".mysqli_num_rows($k2).")</b>";
									?>
								</a>
			
							</li><?php }?>
							
                             <?php if($menu63 == "63"){ ?><li class="">
								<a href="klreq_list.php">
								  
								  <i class="menu-icon fa fa-caret-right"></i>
								  Requested Amount List
									  <?php $k4=mysqli_query($link,"select distinct quet_num from klrequest_amnt where confirm='Pending'") or die(mysqli_error($link));
								  echo "<b style='color:red;'>(".mysqli_num_rows($k4).")</b>";
								  ?>
							  </a>
			
							</li><?php }?>


                          
							
							<?php if($menu65 == "65"){ ?>  <li class="">
								<a href="klreq_list1.php">
								   
								   <i class="menu-icon fa fa-caret-right"></i>
								   Amount Approved List
									   <?php $k5=mysqli_query($link,"select * from klrequest_amnt where confirm='Yes' and status=''") or die(mysqli_error($link));
								   echo "<b style='color:red;'>(".mysqli_num_rows($k5).")</b>";
								   ?>
							   </a>
			
							</li><?php }?>
							
							<?php if($menu66 == "66"){ ?>  <li class="">
								<a href="klbill_list.php">
								    
									<i class="menu-icon fa fa-caret-right"></i>
									Document Required List
									<?php $k6=mysqli_query($link,"select distinct quet_num from klrequest_amnt where status='Amount Transferred' and bill_status='' or docr_status='Cancel'") or die(mysqli_error($link));
									echo "<b style='color:red;'>(".mysqli_num_rows($k6).")</b>";
									?>
								</a>
			
							</li><?php }?>
							<?php if($menu67 == "67"){ ?>  <li class="">
								<a href="klbill_list2.php">
								    
									<i class="menu-icon fa fa-caret-right"></i>
									To Be Raise Invoice
									<?php $k7=mysqli_query($link,"select * from klqot_bill where status='payment pending' ") or die(mysqli_error($link));
									echo "<b style='color:red;'>(".mysqli_num_rows($k7).")</b>";
									?>
								</a>
			
							</li><?php }?>
							
								<?php if($menu605 == "605"){ ?>  <li class="">
								<a href="klbill_list31.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Raised Invoice List
									<?php $k8=mysqli_query($link,"select * from klqot_bill where status='RUn Paid' ") or die(mysqli_error($link));
									echo "<b style='color:red;'>(".mysqli_num_rows($k8).")</b>";
									?>
								</a>
							</li><?php }?>
							
							
							<?php if($menu68 == "68"){ ?>  <li class="">
								<a href="klbill_list3.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Payment Pending Invoice 
									<?php $k8=mysqli_query($link,"select * from klqot_bill where status='Un Paid' ") or die(mysqli_error($link));
									echo "<b style='color:red;'>(".mysqli_num_rows($k8).")</b>";
									?>
								</a>
							</li><?php }?>
							<?php if($menu69 == "69"){ ?>  <li class="">
								<a href="klbill_list4.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Payment Received 
															<?php	 if(($name=='admin') or ($name=='durgarao') or ($name=='accounts') or ($tsname=='sumanthpotluri') ){
									    $xg="select * from klpayment ";
									}else{
									    $xg="select * from klpayment  ";
									}
									 $kk9=mysqli_query($link,$xg) or die(mysqli_error($link));
									echo "<b style='color:red;'>(".mysqli_num_rows($kk9).")</b>";
									?>
			
									
								</a>

							</li><?php }?>
							<?php if($menu600 == "600"){ ?>  <li class="">
								<a href="klwork1.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Mark Not Required 
										<?php	 if(($name=='admin') or ($name=='durgarao') or ($name=='accounts') or ($tsname=='sumanthpotluri')){
									    $xh="select * from add_klqot where status='Not Required'  ";
									}else{
									    $xh="select * from add_klqot where status='Not Required' and ses='$tsname'  ";
									}
									 $kk10=mysqli_query($link,$xh) or die(mysqli_error($link));
									echo "<b style='color:red;'>(".mysqli_num_rows($kk10).")</b>";
									?>
								</a>

							</li><?php }?>
							<?php if($menu601 == "601"){ ?> <li class="">
								<a href="klwork2.php">
									<i class="menu-icon fa fa-caret-right"></i>
								GST Bills Pending 
								<?php	 if(($name=='admin') or ($name=='durgarao') or ($name=='accounts') or ($tsname=='sumanthpotluri')or ($name=='Sulfeekkar')){
									    $xh="select * from klrequest_amnt where gsttype='With Gst'  and gstatus!='approved' ";
									}else{
									    $xh="select * from klrequest_amnt where gsttype='With Gst' and user='$tsname' and gstatus!='approved'  ";
									}
									 $kk11=mysqli_query($link,$xh) or die(mysqli_error($link));
									echo "<b style='color:red;'>(".mysqli_num_rows($kk11).")</b>";
									?>
								</a>

							</li><?php }?>
								
							<?php if($menu606 == "606"){ ?> <li class="">
								<a href="klaaexcel.php">
									<i class="menu-icon fa fa-caret-right"></i>
								Amount Approved Excel
								</a>


							</li><?php }?>
							<?php if($menu608 == "608"){ ?> <li class="">
								<a href="klraexcel.php">
									<i class="menu-icon fa fa-caret-right"></i>
								Requested Amount  Excel
								</a>


							</li><?php }?>
							<?php if($menu602 == "602"){ ?>
							<li class="">
								<a href="kltrack.php">
									<i class="menu-icon fa fa-caret-right"></i>
								Tracker
								</a>

							</li>
							<?php }?>
								<?php if($menu603 == "603"){ ?>
							<li class="">
								<a href="qutdetails_kl_excel.php?user=<?php echo $name; ?>">
									<i class="menu-icon fa fa-caret-right"></i>
								Quotation Details
								</a>

							</li>
							<?php }?>
							
							<?php if($menu604 == "604"){ ?>
						<li class="">
								<a href="klsupervisor.php">
									<i class="menu-icon fa fa-caret-right"></i>
								Supervisor
								</a>

							</li>
							<?php }?>
							
						</ul>
					</li>        
    <?php }  ?> 

  <?php if($menu7 == "7"){ ?> 
 <li class="">
						<a href="#" class="dropdown-toggle">
						     <img src="images/tn.png">
							<!--<i class="menu-icon fa fa-cog"></i>-->
							<span class="menu-text">
							TN Tracker
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
						   
						<?php if($menu71 == "71"){ ?>	<li class="">
								<a href="tnqot_list.php">
									<i class="menu-icon fa fa-caret-right"></i>
									 Quotations
									 	<?php $kk2=mysqli_query($link,"select * from add_tnqot ") or die(mysqli_error($link));
									echo "<b style='color:red;'>(".mysqli_num_rows($kk2).")</b>";
									?>
								
								</a>

								
							</li><?php }?>
                            
							
							<?php if($menu72 == "72"){ ?><li class="">
								<a href="tnroqot_list.php">
									<i class="menu-icon fa fa-caret-right"></i>
									RO Required
									<?php	if(($name=='admin') or ($name=='durgarao') or ($name=='sumanthpotluri') or ($tsname=='venkateswaran')){
									    $x="select * from add_tnqot where status='Ro Required'";
									}else{
									    $x="select * from add_tnqot where status='Ro Required' and  ses='$tsname'";
									}
									 $kk3=mysqli_query($link,$x) or die(mysqli_error($link));
									echo "<b style='color:red;'>(".mysqli_num_rows($kk3).")</b>";
									?>
								</a>
			
							</li><?php }?>
							
                             <?php if($menu73 == "73"){ ?><li class="">
								<a href="tnwtsqot_list.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Work To Be Started
									<?php	 if(($name=='admin') or ($name=='durgarao') or ($name=='klbilling') or ($name=='sumanthpotluri') or ($tsname=='venkateswaran')or ($tsname=='naiduys')){
									    $xa="select * from add_tnqot where status='work to be started'";
									}else{
									    $xa="select * from add_tnqot where status='work to be started' and  ses='$tsname'";
									}
									 $kk4=mysqli_query($link,$xa) or die(mysqli_error($link));
									echo "<b style='color:red;'>(".mysqli_num_rows($kk4).")</b>";
									?>
									
								</a>
			
							</li><?php }?>


                          <?php if($menu74 == "74"){ ?> <li class="">
								<a href="tnreq_list.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Requested Amount List
										<?php			if(($name=='admin') or ($name=='durgarao') or ($name=='accounts') or ($tsname=='sumanthpotluri') or ($tsname=='venkateswaran')){
									    $xb="select distinct quet_num from tnrequest_amnt where confirm='Pending'";
									}else{
									    $xb="select distinct quet_num from tnrequest_amnt where confirm='Pending' and user='$tsname'";
									}
									 $kk4=mysqli_query($link,$xb) or die(mysqli_error($link));
									echo "<b style='color:red;'>(".mysqli_num_rows($kk4).")</b>";
									?>
								</a>
			
							</li><?php }?>
							
							<?php if($menu75 == "75"){ ?>  <li class="">
								<a href="tnreq_list1.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Amount Approved List
									<?php	 if(($name=='admin') or ($name=='durgarao') or ($name=='accounts') or ($name=='tnbilling') or ($tsname=='sumanthpotluri') or ($tsname=='venkateswaran')){
									    $xc="select * from tnrequest_amnt where confirm='Yes' and status=''";
									}else{
									    $xc="select *  from tnrequest_amnt where confirm='Yes' and status='' and user='$tsname'";
									}
									 $kk5=mysqli_query($link,$xc) or die(mysqli_error($link));
									echo "<b style='color:red;'>(".mysqli_num_rows($kk5).")</b>";
									?>
								</a>
			
							</li><?php }?>
						
							
							<?php if($menu76 == "76"){ ?>  <li class="">
								<a href="tnbill_list.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Document Required List
										<?php	 	if(($name=='admin') or ($name=='durgarao') or ($name=='accounts') or ($name=='tnbilling')or ($tsname=='naiduys')or ($tsname=='sumanthpotluri') or ($tsname=='venkateswaran') ){
									    $xd="SELECT distinct quet_num FROM `tnrequest_amnt` where  status='Amount Transferred' and bill_status=''  or docr_status='Cancel'   ";
									}else{
									    $xd="SELECT distinct quet_num FROM `tnrequest_amnt` where  status='Amount Transferred'  and bill_status=''   and user='$tsname' or docr_status='Cancel'";
									}
									 $kk6=mysqli_query($link,$xd) or die(mysqli_error($link));
									echo "<b style='color:red;'>(".mysqli_num_rows($kk6).")</b>";
									?>
								
								</a>
			
							</li><?php }?>
							<?php if($menu77 == "77"){ ?>  <li class="">
								<a href="tnbill_list2.php">
									<i class="menu-icon fa fa-caret-right"></i>
									To Be Raise Invoice
										<?php	  if(($name=='admin') or ($name=='durgarao') or ($name=='accounts') or ($tsname=='naiduys')or ($name=='tnbilling') or ($tsname=='sumanthpotluri') or ($tsname=='venkateswaran')){
									    $xe="SELECT * FROM tnqot_bill where status='payment pending'   ";
									}else{
									    $xe="SELECT * FROM tnqot_bill where status='payment pending' and user='$tsadmin'  ";
									}
									 $kk8=mysqli_query($link,$xe) or die(mysqli_error($link));
									echo "<b style='color:red;'>(".mysqli_num_rows($kk8).")</b>";
									?>
								</a>
			
							</li><?php }?>
							
								<?php if($menu705 == "705"){ ?>  <li class="">
								<a href="tnbill_list31.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Raised Invoice List 
									<?php	 if(($name=='admin') or ($name=='durgarao') or ($name=='accounts') or ($name=='tnbilling') or ($tsname=='sumanthpotluri')){
									    $xf="select * from tnqot_bill where status='RUn Paid' ";
									}else{
									    $xf="select * from tnqot_bill where status='RUn Paid' and user='$tsname' ";
									}
									 $kt2=mysqli_query($link,$xf) or die(mysqli_error($link));
									echo "<b style='color:red;'>(".mysqli_num_rows($kt2).")</b>";
									?>
								
								</a>
							</li><?php }?>
							
							
							<?php if($menu78 == "78"){ ?>  <li class="">
								<a href="tnbill_list3.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Payment Pending Invoice 
										<?php	 if(($name=='admin') or ($name=='durgarao') or ($name=='accounts') or ($name=='tnbilling') or ($tsname=='sumanthpotluri')){
									    $xf="select * from tnqot_bill where status='Un Paid' ";
									}else{
									    $xf="select * from tnqot_bill where status='Un Paid' and user='$tsname' ";
									}
									 $kk9=mysqli_query($link,$xf) or die(mysqli_error($link));
									echo "<b style='color:red;'>(".mysqli_num_rows($kk9).")</b>";
									?>
								</a>
							</li><?php }?>
							<?php if($menu79 == "79"){ ?>  <li class="">
								<a href="tnbill_list4.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Payment Received 
															<?php	 if(($name=='admin') or ($name=='durgarao') or ($name=='accounts') or ($tsname=='sumanthpotluri')){
									    $xg="select * from tnpayment ";
									}else{
									    $xg="select * from tnpayment  ";
									}
									 $kk9=mysqli_query($link,$xg) or die(mysqli_error($link));
									echo "<b style='color:red;'>(".mysqli_num_rows($kk9).")</b>";
									?>
			
									
								</a>

							</li><?php }?>
							<?php if($menu700 == "700"){ ?>  <li class="">
								<a href="tnwork1.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Mark Not Required 
										<?php	 if(($name=='admin') or ($name=='durgarao') or ($name=='accounts') or ($tsname=='sumanthpotluri')){
									    $xh="select * from add_tnqot where status='Not Required'  ";
									}else{
									    $xh="select * from add_tnqot where status='Not Required' and ses='$tsname'  ";
									}
									 $kk10=mysqli_query($link,$xh) or die(mysqli_error($link));
									echo "<b style='color:red;'>(".mysqli_num_rows($kk10).")</b>";
									?>
								</a>

							</li><?php }?>
							<?php if($menu701 == "701"){ ?> <li class="">
								<a href="tnwork2.php">
									<i class="menu-icon fa fa-caret-right"></i>
								GST Bills Pending 
								<?php	 if(($name=='admin') or ($name=='durgarao') or ($name=='accounts') or ($tsname=='sumanthpotluri') or ($tsname=='venkateswaran') ){
									    $xh="select * from tnrequest_amnt where gsttype='With Gst'  and gstatus!='approved' ";
									}else{
									    $xh="select * from tnrequest_amnt where gsttype='With Gst' and user='$tsname' and gstatus!='approved'  ";
									}
									 $kk11=mysqli_query($link,$xh) or die(mysqli_error($link));
									echo "<b style='color:red;'>(".mysqli_num_rows($kk11).")</b>";
									?>
								</a>

							</li><?php }?>
							<?php if($menu706 == "706"){ ?> <li class="">
								<a href="tnaaexcel.php">
									<i class="menu-icon fa fa-caret-right"></i>
								Amount Approved Excel
								</a>


							</li><?php }?>
								<?php if($menu708 == "708"){ ?> <li class="">
								<a href="tnraexcel.php">
									<i class="menu-icon fa fa-caret-right"></i>
								Requested Amount  Excel
								</a>


							</li><?php }?>
							
							<?php if($menu702 == "702"){ ?>
							<li class="">
								<a href="tntrack.php">
									<i class="menu-icon fa fa-caret-right"></i>
								Tracker
								</a>

							</li>
							<?php }?>
								<?php if($menu703 == "703"){ ?>
							<li class="">
								<a href="qutdetails_tn_excel.php?user=<?php echo $name; ?>">
									<i class="menu-icon fa fa-caret-right"></i>
								Quotation Details
								</a>

							</li>
							<?php }?>
							
							<?php if($menu704 == "704"){ ?>
						<li class="">
								<a href="tnsupervisor.php">
									<i class="menu-icon fa fa-caret-right"></i>
								Supervisor
								</a>

							</li>
							<?php }?>
							
						</ul>
					</li>        
  <?php }  ?> 



  


<?php if($menu1111 =="1111"){ ?> 
<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-inr"></i>
							<span class="menu-text">
								Expesnses
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
						    	<?php if($menu110 == "110"){ ?>
						<li class="">
								<a href="finalemp1.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Add Expenses
								</a>
		
							</li>
								<?php }?>
							<?php if($menu111 == "111"){ ?>
							<li class="">
								<a href="date_excel.php">
									<i class="menu-icon fa fa-caret-right"></i>
									AP Expenses List
										<?php	if(($name=='admin') or ($name=='durgarao') or ($name=='accounts') or ($name=='9502110504')or ($tsname=='naiduys')){
									    $xa="select * from expenses where state='AP' ";
									}else{
									    $xa="select * from expenses where  state='AP' and user='$tsname'";
									}
									 $kt2=mysqli_query($link,$xa) or die(mysqli_error($link));
									echo "<b style='color:red;'>(".mysqli_num_rows($kt2).")</b>";
									?>
									</a>
			
							</li>
								<?php }?>
									<?php if($menu112 == "112"){ ?>
								<li class="">
								<a href="timetracker.php">
									<i class="menu-icon fa fa-caret-right"></i>
									TS Expenses List
										<?php	if(($name=='admin') or ($name=='durgarao') or ($name=='accounts') or ($tsname=='naiduys')){
									    $xa="select * from expenses where state='TG' ";
									}else{
									    $xa="select * from expenses where state='TG' and  user='$tsname'";
									}
									 $kt2=mysqli_query($link,$xa) or die(mysqli_error($link));
									echo "<b style='color:red;'>(".mysqli_num_rows($kt2).")</b>";
									?>
									</a>
			
							</li>
								<?php }?>
							<?php if($menu114 == "114"){ ?>
							<li class="">
								<a href="https://jtechnoassociates.in/jtechnoapp/attdance.php">
									<i class="menu-icon fa fa-caret-right"></i>
									KL Expenses List
										<?php	if(($name=='admin') or ($name=='durgarao') or ($name=='accounts') or ($name=='sumanthpotluri')or ($name=='naiduys') ){
									    $xa="select * from expenses where state='KL' ";
									}else{
									    $xa="select * from expenses where state='KL' and  user='$tsname'";
									}
									 $kt2=mysqli_query($link,$xa) or die(mysqli_error($link));
									echo "<b style='color:red;'>(".mysqli_num_rows($kt2).")</b>";
									?>
									</a>
			
							</li>
							<?php }?>
							<?php if($menu113 == "113"){ ?>
					<li class="">
								<a href="tnexpenseslist.php">
									<i class="menu-icon fa fa-caret-right"></i>
									TN Expenses List
										<?php	if(($name=='admin') or ($name=='durgarao') or ($name=='accounts') or ($name=='sumanthpotluri') or ($name=='naiduys')){
									    $xa="select * from expenses where state='TN' ";
									}else{
									    $xa="select * from expenses where state='TN' and  user='$tsname'";
									}
									 $kt2=mysqli_query($link,$xa) or die(mysqli_error($link));
									echo "<b style='color:red;'>(".mysqli_num_rows($kt2).")</b>";
									?>
									</a>
			
							</li>
							<?php }?>
								<?php if($menu115 == "115"){ ?>
								<li class="">
								<a href="knexpenseslist.php">
									<i class="menu-icon fa fa-caret-right"></i>
									KN Expenses List
										<?php	if(($name=='admin') or ($name=='durgarao') or ($name=='accounts') or ($name=='sumanthpotluri') or ($name=='naiduys')){
									    $xa="select * from expenses where state='KN' ";
									}else{
									    $xa="select * from expenses where state='KN' and  user='$tsname'";
									}
									 $kt2=mysqli_query($link,$xa) or die(mysqli_error($link));
									echo "<b style='color:red;'>(".mysqli_num_rows($kt2).")</b>";
									?>
									</a>
			
							</li>
                         <?php }  ?> 
						</ul>
					</li>
<?php }  ?> 
				<?php if($menu16 == "16"){ ?>
				<li class="">
						<a href="usermanagement.php" >
							<i class="menu-icon fa fa-user"></i>
							<span class="menu-text">
								User Management
							</span>

							
						</a>

						

						
					</li>
				<?php }?>
                         <?php if($menu9 == "9"){ ?> 
                         <li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-file-text-o"></i>
							<span class="menu-text">
							Reports
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
						   
						<?php if($menu999 == "999"){ ?><li class="">
									<a href="timetracker.php">
									<i class="menu-icon fa fa-caret-right"></i>
								Working Hours 
									
								</a>

								
							</li><?php }?>
                            
							
						</ul>
					</li> 
					<?php }?>
					
						
					
				</ul>


<?php	
}
?>