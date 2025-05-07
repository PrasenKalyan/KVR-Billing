<?php //include('config.php');
session_start();
include('dbconnection/connection.php');
if($_SESSION['user'])
{
$name=$_SESSION['user'];
//include('org1.php');


include'dbfiles/org.php';
//include'dbfiles/iqry_emp.php';
?>
<!DOCTYPE html>
<html lang="en">
    <?php include'template/headerfile.php'; ?>
	 <link rel="stylesheet" href="assets/css/bootstrap-datepicker3.min.css" />
    <style>
        strong{
            color:red;
        }
    </style>
	<script>
   
        function ConfirmDialog() {
  var x=confirm("Are you sure to delete record?")
  if (x) {
    return true;
  } else {
    return false;
  }
    }
    </script>
    <body class="no-skin">
        <?php include'template/logo.php'; ?>

        <div class="main-container ace-save-state" id="main-container">
            <script type="text/javascript">
                try {
                    ace.settings.loadState('main-container')
                } catch (e) {
                }
            </script>

            <div id="sidebar" class="sidebar                  responsive                    ace-save-state">
                <script type="text/javascript">
                    try {
                        ace.settings.loadState('sidebar')} catch (e) {
                    }
                </script>

                <!-- /.sidebar-shortcuts -->
                <?php include'template/sidemenu.php' ?>
                <!-- /.nav-list -->

                <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
                    <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
                </div>
            </div>

            <div class="main-content">
                <div class="main-content-inner">
                    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                        <ul class="breadcrumb">
                            <li>
                                <i class="ace-icon fa fa-home home-icon"></i>
                                <a href="#">Home</a>
                            </li>
								<li>
                                <i class="ace-icon fa fa-user"></i>
                                <a href="#">User Management</a>
                            </li>
                           
                            <!--<li class="active">Blank Page</li>-->
                        </ul><!-- /.breadcrumb -->

                        <!-- /.nav-search -->
                    </div>

                    <div class="page-content">
                        <!-- /.ace-settings-container -->
                        <div class="page-header">
                            <h1 align="center">
                               Employee Details

                            </h1>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                               <div class="box box-info">
								<div class="box-header with-border">
								  <h3 class="box-title">Employee Details</h3>
								</div>
                               
                                <form class="form-horizontal" enctype="multipart/form-data" method="post" action="user_insert.php">
              <div class="box-body">
			  	 <!-- /Employee Photo-->
                <div class="form-group">			
                  <label for="lblempfile" class="col-sm-2 control-label">Employee Name:</label>
		
				  <?php 
				  $id=$_REQUEST['id'];
				  
				  
				  ?>
				  
                  <div class="col-sm-4">
				  <input type="hidden" name="user" id="user" value="<?php echo $name; ?>" />
                    <select class="form-control" name="empname" id="empname">
					<option value="">Select Emp Name</option>
					<?php 
											$r=mysqli_query($link,"select empid,emp_name from employee union select employeeid as empid,emp_name from emp") or die(mysqli_error($link));
											while($r1=mysqli_fetch_array($r)){?>
												<?php $eid=$r1['empid'];?>
												<option value="<?php echo $eid ?>" <?php if($eid==$id){echo 'selected';} ?>><?php echo $r1['emp_name']; ?></option>
										<?php	}
											?>
					</select>
                  </div>
				  
                </div>	
<?php
$t=mysqli_query($link,"select * from hr_user where emp_id='$id'") or die(mysqli_error($link));
while($row1=mysqli_fetch_array($t)){
$menu= $row1['menus'];
if($menu == "2"){$menu2="2";}
	if($menu == "21"){$menu21="21";}
	if($menu == "22"){$menu22="22";}
	if($menu == "23"){$menu23="23";}
	if($menu == "24"){$menu24="24";}
	if($menu == "25"){$menu25="25";}
	if($menu == "26"){$menu26="26";}
	if($menu == "99"){$menu99="99";}
	if($menu == "100"){$menu100="100";}
	if($menu == "101"){$menu101="101";}
	if($menu == "102"){$menu102="102";}
	if($menu == "103"){$menu103="103";}
	
	
	
	if($menu == "3"){$menu3="3";}
	if($menu == "31"){$menu31="31";}
	//if($menu == "32"){$menu32="32";}
	//if($menu == "33"){$menu33="33";}
	//if($menu == "34"){$menu34="34";}
	
	
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
	if($menu == "504"){$menu504="504";}
	if($menu == "505"){$menu505="505";}
	if($menu == "506"){$menu506="506";}
    if($menu == "508"){$menu508="508";}
	
	if($menu == "4"){$menu4="4";}
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
	if($menu == "404"){$menu404="404";}
	if($menu == "405"){$menu405="405";}
	if($menu == "406"){$menu406="406";}
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
	if($menu == "604"){$menu604="604";}
	if($menu == "605"){$menu605="605";}
	if($menu == "606"){$menu606="606";}
	if($menu == "608"){$menu608="608";}
	
	if($menu == "7"){$menu7="7";}
	if($menu == "71"){$menu71="71";}
	if($menu == "72"){$menu72="72";}
	if($menu == "73"){$menu73="73";}
	if($menu == "74"){$menu74="74";}
	if($menu == "75"){$menu75="75";}
	if($menu == "76"){$menu76="76";}
	if($menu == "77"){$menu77="77";}
	if($menu == "78"){$menu78="78";}
	if($menu == "79"){$menu79="79";}
	if($menu == "700"){$menu700="700";}
	if($menu == "701"){$menu701="701";}
	if($menu == "702"){$menu702="702";}
	if($menu == "703"){$menu703="703";}
	if($menu == "704"){$menu704="704";}
	if($menu == "705"){$menu705="705";}
	if($menu == "706"){$menu706="706";}
	if($menu == "708"){$menu708="708";}
	
	
	if($menu == "91"){$menu91="91";}
	if($menu == "92"){$menu92="92";}
	if($menu == "93"){$menu93="93";}
	if($menu == "94"){$menu94="94";}
	if($menu == "95"){$menu95="95";}
	if($menu == "96"){$menu96="96";}
	if($menu == "97"){$menu97="97";}
	if($menu == "98"){$menu98="98";}
	if($menu == "16"){$menu16="16";}
	
	
	//if($menu == "8"){$menu8="8";}
	if($menu == "81"){$menu81="81";}
	if($menu == "82"){$menu82="82";}
	if($menu == "83"){$menu83="83";}
	if($menu == "84"){$menu84="84";}
	if($menu == "85"){$menu85="85";}
	
	if($menu == "10"){$menu10="10";}
	if($menu == "11"){$menu11="11";}
	if($menu == "12"){$menu12="12";}
	if($menu == "13"){$menu13="13";}
	if($menu == "14"){$menu14="14";}
	if($menu == "15"){$menu15="15";}
	if($menu == "116"){$menu116="116";}
	if($menu == "17"){$menu17="17";}
	if($menu == "18"){$menu18="18";}
	if($menu == "19"){$menu19="19";}
	if($menu == "20"){$menu20="20";}
	if($menu == "121"){$menu121="121";}
	if($menu == "122"){$menu122="122";}
	if($menu == "123"){$menu123="123";}
	if($menu == "124"){$menu124="124";}
	if($menu == "125"){$menu125="125";}
	if($menu == "126"){$menu126="126";}
	if($menu == "128"){$menu128="128";}
	if($menu == "9"){$menu9="9";}
	if($menu == "999"){$menu999="999";}
	
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
	if($menu == "2417"){$menu2417="2417";}
	if($menu == "2418"){$menu2418="2418";}
}
 ?>

				<div class="form-group">			
                  <div class="col-sm-3">
				  <input type="checkbox" name="menu[]" value="2"  <?php if($menu2=='2'){echo "checked='checked'";} ?>/><b>Settings</b><br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="21" <?php if($menu21=='21'){echo "checked='checked'";} ?> />Update Organization<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="22" <?php if($menu22=='22'){echo "checked='checked'";} ?> />Add Employee<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="23" <?php if($menu23=='23'){echo "checked='checked'";} ?> />Add Material<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="91" <?php if($menu91=='91'){echo "checked='checked'";} ?>/>Add Supervisor Details<br/>
				   &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="92" <?php if($menu92=='92'){echo "checked='checked'";} ?>/>Add Company  Details<br/>
				   &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="93" <?php if($menu93=='93'){echo "checked='checked'";} ?>/>Add AFM Details<br/>
				   &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="94" <?php if($menu94=='94'){echo "checked='checked'";} ?><?php if($menu23=='23'){echo "checked='checked'";} ?>/>Add Co-Ordinatior Details<br/>
				   &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="95" <?php if($menu95=='95'){echo "checked='checked'";} ?>/>Add Account Details<br/>
				   &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="97" <?php if($menu97=='97'){echo "checked='checked'";} ?>/>Add Item Details<br/>
				    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="96" <?php if($menu96=='96'){echo "checked='checked'";} ?>/>Add Store List<br/>
				     &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="99" <?php if($menu99=='99'){echo "checked='checked'";} ?>/>Add Upload Store List<br/>
				    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="98" <?php if($menu98=='98'){echo "checked='checked'";} ?>/>Add KL Items List<br/>
				    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="100" <?php if($menu100=='100'){echo "checked='checked'";} ?>/>Add TN Items List<br/>
				    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="101" <?php if($menu101=='101'){echo "checked='checked'";} ?>/>Add Upload TN Items List<br/>
				    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="102" <?php if($menu102=='102'){echo "checked='checked'";} ?>/>Add Change User Names<br/>
				    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="103" <?php if($menu9103=='103'){echo "checked='checked'";} ?>/>Add Change Status<br/>
				  </div>
	<div class="col-sm-3">
				  <input type="checkbox" name="menu[]" value="3" <?php if($menu3=='3'){echo "checked='checked'";} ?>/><b>Upload Formats</b><br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="24" <?php if($menu24=='24'){echo "checked='checked'";} ?>/>Upload Products Format<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="25" <?php if($menu25=='25'){echo "checked='checked'";} ?> />Upload Add Billing Format <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="26" <?php if($menu26=='26'){echo "checked='checked'";} ?> />Upload Employee Salary Format<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="31" <?php if($menu31=='31'){echo "checked='checked'";} ?> />Upload Employee Salary<br/>
				 			
				 </div>
				 
			<!--	 <div class="col-sm-3">
				  <input type="checkbox" name="menu[]" value="8" <?php if($menu8=='8'){echo "checked='checked'";} ?>/><b>Employee</b><br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="81" <?php if($menu81=='81'){echo "checked='checked'";} ?>/>Add Tools<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="82" <?php if($menu82=='82'){echo "checked='checked'";} ?> />Add Tool Purchase <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="83" <?php if($menu83=='83'){echo "checked='checked'";} ?> />Add Accessories<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="84" <?php if($menu84=='84'){echo "checked='checked'";} ?> />Add Employee<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="85" <?php if($menu85=='85'){echo "checked='checked'";} ?> />Assign users<br/>
				 			
				 </div>
			
                  <div class="col-sm-3">
				  <input type="checkbox" name="menu[]" value="4" <?php if($menu4=='4'){echo "checked='checked'";} ?> /><b>Ap Tracker</b><br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="41" <?php if($menu41=='41'){echo "checked='checked'";} ?>/>Quotations<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="42" <?php if($menu42=='42'){echo "checked='checked'";} ?>/>RO Required <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="43" <?php if($menu43=='43'){echo "checked='checked'";} ?>/>Work To Be Started<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="44" <?php if($menu44=='44'){echo "checked='checked'";} ?>/>Requested Amount List<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="45" <?php if($menu45=='45'){echo "checked='checked'";} ?>/>Amount Approved List<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="46" <?php if($menu46=='46'){echo "checked='checked'";} ?>/>Document Required List <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="47" <?php if($menu47=='47'){echo "checked='checked'";} ?>/>To Be Raise Invoice<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="405" <?php if($menu405=='405'){echo "checked='checked'";} ?>/>Raised Invoice List <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="48" <?php if($menu48=='48'){echo "checked='checked'";} ?>/>Payment Pending Invoice<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="49" <?php if($menu49=='49'){echo "checked='checked'";} ?>/>Payment Received<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="400" <?php if($menu400=='400'){echo "checked='checked'";} ?>/>Mark Not Required<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="401" <?php if($menu401=='401'){echo "checked='checked'";} ?>/>GST Bills Pending <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="406" <?php if($menu406=='406'){echo "checked='checked'";} ?>/>Amount Approved Excel <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="408" <?php if($menu408=='408'){echo "checked='checked'";} ?>/> Requested Amount  Excel <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="402" <?php if($menu402=='402'){echo "checked='checked'";} ?>/>Tracker <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="403" <?php if($menu403=='403'){echo "checked='checked'";} ?>/>Quotation Details <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="404" <?php if($menu404=='404'){echo "checked='checked'";} ?>/>Supervisor <br/>
				  </div>
				  
				  
				  <div class="col-sm-3">
				  <input type="checkbox" name="menu[]" value="5" <?php if($menu5=='5'){echo "checked='checked'";} ?>/><b>TG Tracker</b><br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="51" <?php if($menu51=='51'){echo "checked='checked'";} ?>/>Quotations<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="52" <?php if($menu52=='52'){echo "checked='checked'";} ?>/>RO Required <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="53" <?php if($menu53=='53'){echo "checked='checked'";} ?>/>Work To Be Started<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="54" <?php if($menu54=='54'){echo "checked='checked'";} ?>/>Requested Amount List<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="55" <?php if($menu55=='55'){echo "checked='checked'";} ?>/>Amount Approved List<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="56" <?php if($menu56=='56'){echo "checked='checked'";} ?>/>Document Required List <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="57" <?php if($menu57=='57'){echo "checked='checked'";} ?>/>To Be Raise Invoice<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="505" <?php if($menu505=='505'){echo "checked='checked'";} ?>/>Raised Invoice List <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="58" <?php if($menu58=='58'){echo "checked='checked'";} ?>/>Payment Pending Invoice<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="59" <?php if($menu59=='59'){echo "checked='checked'";} ?>/>Payment Received<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="500" <?php if($menu500=='500'){echo "checked='checked'";} ?>/>Mark Not Required<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="501" <?php if($menu501=='501'){echo "checked='checked'";} ?>/>GST Bills Pending <br/>
				   	&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="506" <?php if($menu506=='506'){echo "checked='checked'";} ?>/>Amount Approved Excel <br/>
				   	&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="508" <?php if($menu508=='508'){echo "checked='checked'";} ?>/>Requested Amount  Excel <br/>
				 &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="502" <?php if($menu502=='502'){echo "checked='checked'";} ?>/>Tracker <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="503" <?php if($menu503=='503'){echo "checked='checked'";} ?>/>Quotation Details <br/>
				 &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="504" <?php if($menu504=='504'){echo "checked='checked'";} ?>/>Supervisor <br/>
				 </div>
				 
				  <div class="col-sm-3">
				  <input type="checkbox" name="menu[]" value="6" <?php if($menu6=='6'){echo "checked='checked'";} ?>/><b>KL Tracker</b><br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="61" <?php if($menu61=='61'){echo "checked='checked'";} ?>/>Quotations<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="62" <?php if($menu62=='62'){echo "checked='checked'";} ?>/>RO Required <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="63" <?php if($menu63=='63'){echo "checked='checked'";} ?>/>Work To Be Started<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="64" <?php if($menu64=='64'){echo "checked='checked'";} ?>/>Requested Amount List<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="65" <?php if($menu65=='65'){echo "checked='checked'";} ?>/>Amount Approved List<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="66" <?php if($menu66=='66'){echo "checked='checked'";} ?>/>Document Required List <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="67" <?php if($menu67=='67'){echo "checked='checked'";} ?>/>To Be Raise Invoice<br/>
				   &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="605" <?php if($menu605=='605'){echo "checked='checked'";} ?>/>Raised Invoice List <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="68" <?php if($menu68=='68'){echo "checked='checked'";} ?>/>Payment Pending Invoice<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="69" <?php if($menu69=='69'){echo "checked='checked'";} ?>/>Payment Received<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="600" <?php if($menu600=='600'){echo "checked='checked'";} ?>/>Mark Not Required<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="601" <?php if($menu601=='601'){echo "checked='checked'";} ?>/>GST Bills Pending <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="606" <?php if($menu606=='606'){echo "checked='checked'";} ?>/>Amount Approved Excel <br/>
				 &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="608" <?php if($menu608=='608'){echo "checked='checked'";} ?>/>Requested Amount  Excel <br/>
				&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="602" <?php if($menu602=='602'){echo "checked='checked'";} ?>/>Tracker <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="603" <?php if($menu603=='603'){echo "checked='checked'";} ?>/>Quotation Details <br/>
				&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="604" <?php if($menu604=='604'){echo "checked='checked'";} ?>/>Supervisor <br/>
				 </div>
				 
				 <div class="col-sm-3">
				  <input type="checkbox" name="menu[]" value="240" <?php if($menu240=='240'){echo "checked='checked'";} ?>/><b>OD Tracker</b><br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="241" <?php if($menu241=='241'){echo "checked='checked'";} ?>/>Quotations<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="242" <?php if($menu242=='242'){echo "checked='checked'";} ?>/>RO Required <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="243" <?php if($menu243=='243'){echo "checked='checked'";} ?>/>Work To Be Started<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="244" <?php if($menu244=='244'){echo "checked='checked'";} ?>/>Requested Amount List<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="245" <?php if($menu245=='245'){echo "checked='checked'";} ?>/>Amount Approved List<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="246" <?php if($menu246=='246'){echo "checked='checked'";} ?>/>Document Required List <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="247" <?php if($menu247=='247'){echo "checked='checked'";} ?>/>To Be Raise Invoice<br/>
				   &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="248" <?php if($menu248=='248'){echo "checked='checked'";} ?>/>Raised Invoice List <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="249" <?php if($menu249=='249'){echo "checked='checked'";} ?>/>Payment Pending Invoice<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="2410" <?php if($menu2410=='2410'){echo "checked='checked'";} ?>/>Payment Received<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="2411" <?php if($menu2411=='2411'){echo "checked='checked'";} ?>/>Mark Not Required<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="2412" <?php if($menu2412=='2412'){echo "checked='checked'";} ?>/>GST Bills Pending <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="2413" <?php if($menu2413=='2413'){echo "checked='checked'";} ?>/>Amount Approved Excel <br/>
				 &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="2414" <?php if($menu2414=='2414'){echo "checked='checked'";} ?>/>Requested Amount  Excel <br/>
				&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="2415" <?php if($menu2415=='2415'){echo "checked='checked'";} ?>/>Tracker <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="2416" <?php if($menu2416=='2416'){echo "checked='checked'";} ?>/>Quotation Details <br/>
				&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="2417" <?php if($menu2417=='2417'){echo "checked='checked'";} ?>/>Supervisor <br/>
				 </div>
				 
				 
				  <div class="col-sm-3">
				  <input type="checkbox" name="menu[]" value="7" <?php if($menu7=='7'){echo "checked='checked'";} ?>/><b>TN Tracker</b><br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="71" <?php if($menu71=='71'){echo "checked='checked'";} ?>/>Quotations<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="72" <?php if($menu72=='72'){echo "checked='checked'";} ?>/>RO Required <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="73" <?php if($menu73=='73'){echo "checked='checked'";} ?>/>Work To Be Started<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="74" <?php if($menu74=='74'){echo "checked='checked'";} ?>/>Requested Amount List<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="75" <?php if($menu75=='75'){echo "checked='checked'";} ?>/>Amount Approved List<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="76" <?php if($menu76=='76'){echo "checked='checked'";} ?>/>Document Required List <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="77" <?php if($menu77=='77'){echo "checked='checked'";} ?>/>To Be Raise Invoice<br/>
				   &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="705" <?php if($menu705=='705'){echo "checked='checked'";} ?>/>Raised Invoice List <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="78" <?php if($menu78=='78'){echo "checked='checked'";} ?>/>Payment Pending Invoice<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="79" <?php if($menu79=='79'){echo "checked='checked'";} ?>/>Payment Received<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="700" <?php if($menu700=='700'){echo "checked='checked'";} ?>/>Mark Not Required<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="701" <?php if($menu701=='701'){echo "checked='checked'";} ?>/>GST Bills Pending <br/>
				   	&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="706" <?php if($menu706=='706'){echo "checked='checked'";} ?>/>Amount Approved Excel <br/>
				   		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="708" <?php if($menu708=='708'){echo "checked='checked'";} ?>/>Requested Amount  Excel <br/>
				&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="702" <?php if($menu702=='702'){echo "checked='checked'";} ?>/>Tracker <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="703" <?php if($menu703=='703'){echo "checked='checked'";} ?>/>Quotation Details <br/>
				&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="704" <?php if($menu704=='704'){echo "checked='checked'";} ?>/>Supervisor <br/>
				 </div>-->
				 
				 	  <div class="col-sm-3">
				  <input type="checkbox" name="menu[]" value="10" <?php if($menu10=='10'){echo "checked='checked'";} ?>/><b>KN Tracker</b><br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="11" <?php if($menu11=='11'){echo "checked='checked'";} ?>/>Quotations<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="12" <?php if($menu12=='12'){echo "checked='checked'";} ?>/>RO Required <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="13" <?php if($menu13=='13'){echo "checked='checked'";} ?>/>Work To Be Started<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="14" <?php if($menu14=='14'){echo "checked='checked'";} ?>/>Requested Amount List<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="15" <?php if($menu15=='15'){echo "checked='checked'";} ?>/>Amount Approved List<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="116" <?php if($menu116=='116'){echo "checked='checked'";} ?>/>Document Required List <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="17" <?php if($menu17=='17'){echo "checked='checked'";} ?>/>To Be Raise Invoice<br/>
				   &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="18" <?php if($menu18=='18'){echo "checked='checked'";} ?>/>Raised Invoice List <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="19" <?php if($menu19=='19'){echo "checked='checked'";} ?>/>Payment Pending Invoice<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="20" <?php if($menu20=='20'){echo "checked='checked'";} ?>/>Payment Received<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="121" <?php if($menu121=='121'){echo "checked='checked'";} ?>/>Mark Not Required<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="122" <?php if($menu122=='122'){echo "checked='checked'";} ?>/>GST Bills Pending <br/>
				  	&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="126" <?php if($menu126=='126'){echo "checked='checked'";} ?>/>Amount Approved Excel <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="128" <?php if($menu128=='128'){echo "checked='checked'";} ?>/>Requested Amount  Excel <br/>
				&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="123" <?php if($menu123=='123'){echo "checked='checked'";} ?>/>Tracker <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="124" <?php if($menu124=='124'){echo "checked='checked'";} ?>/>Quotation Details <br/>
				&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="125" <?php if($menu125=='125'){echo "checked='checked'";} ?>/>Supervisor <br/>
				 </div>
			
			<!--	<div class="col-sm-3">
				  <input type="checkbox" name="menu[]" value="16" <?php if($menu16=='16'){echo "checked='checked'";} ?>/><b>User Management</b>
				  
				  				  
				  </div>
			<div class="col-sm-3">
				  <input type="checkbox" name="menu[]" value="9" <?php if($menu9=='9'){echo "checked='checked'";} ?>/><b>Reports</b><br/>
				  
				  	&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="999" <?php if($menu999=='999'){echo "checked='checked'";} ?>/>Working Hours<br/>			  
				  </div>
				  <div class="col-sm-3">
				  <input type="checkbox" name="menu[]" value="1111" <?php if($menu1111=='1111'){echo "checked='checked'";} ?> /><b>Expenses </b><br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="110" <?php if($menu110=='110'){echo "checked='checked'";} ?>/>Add Expenses<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="111" <?php if($menu111=='111'){echo "checked='checked'";} ?>/>AP Expenses List <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="112" <?php if($menu112=='112'){echo "checked='checked'";} ?>/>TS Expenses List<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="113" <?php if($menu113=='113'){echo "checked='checked'";} ?>/>TN Expenses List<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="114" <?php if($menu114=='114'){echo "checked='checked'";} ?>/>KL Expenses List<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="115" <?php if($menu115=='115'){echo "checked='checked'";} ?>/>KN Expenses List <br/>
				   </div>
                </div>	-->
				  
				  
				
				 <!-- /Employee Name< -->
				
					 <!-- /Admission No -->
				
				
					 <!-- /Roll.No -->
						
					
				
				
				
			 		  
			  <div class="form-group">
                                        <div class="col-md-offset-4 col-md-8">
                                            <button class="btn btn-info" type="submit" name="submit" id="submit">
                                                <i class="ace-icon fa fa-save bigger-110"></i>
                                                Save
                                            </button>

                                            &nbsp; &nbsp; &nbsp;
                                            <button class="btn" type="reset">
                                                <i class="ace-icon fa fa-undo bigger-110"></i>
                                                Reset
                                            </button>
											&nbsp; &nbsp; &nbsp;
                                           <a href="usermanagement.php"><button class="btn btn-danger" type="button" name="button" id="Close">
                                                <i class="ace-icon fa fa-close bigger-110"></i>
                                                Close
                                            </button></a>
                                        </div>
                                    </div>
									<br/>
              <!-- /.box-body -->
              
              <!-- /.box-footer -->
            </form>
								</div>
                            </div>
                        </div>
                        <!-- PAGE CONTENT BEGINS -->

                        <!-- PAGE CONTENT ENDS -->
                    </div><!-- /.col -->
					
					
					<div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                <div class="row">
                                    <div class="col-xs-12">
                                       

                                        
                                        <div class="table-header">
                                         Employees  List
                                        </div>

                                        <!-- div.table-responsive -->

                                        <!-- div.dataTables_borderWrap -->
                                        <div>
                                            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th class="center">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</th>
                                                        <th>S No</th>
                                                                                             
                                                        <th>User Name</th>
                                                                                                    
                                                      
                                                       <th ></th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php
                                                    $q="select * from admin_login where user!='admin'";
                                                    $rs= mysqli_query($link, $q) or die(mysqli_error());
                                                    $i=1;
                                                    while($rs1= mysqli_fetch_array($rs)){
                                                    
                                                    ?>
                                                    <tr>
                                                        
<td class="center">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</td>
                                                        <td><?php echo $i; ?></td>
                                                       
                                                      
                                                       
                                                        <td class="hidden-480"><?php echo $rs1['user']; ?></td>
                                                        
                                                        
                                                       <td class="hidden-480"><a href="edituser.php?id=<?php echo $rs1['empname']; ?>"><i class="ace-icon fa fa-pencil bigger-130"></i></a>&nbsp;&nbsp;
                                                         <a onClick="return confirm('Are you sure you want to delete this item?');" href="dbfiles/deleteuser.php?id=<?php echo $rs1['empname']; ?>"><img src="images/Icon_Delete.png"></a></td>
                                                       
                                                       
                                                       
                                                    </tr>
                                                    <?php $i++; }?>
                                                    
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- PAGE CONTENT ENDS -->
                            </div><!-- /.col -->
                        </div>
					
					
					
					
					
					
					
					
					
					
                </div><!-- /.row -->
            </div><!-- /.page-content -->
        </div>
    </div><!-- /.main-content -->

    <?php include('template/footer.php'); ?>

    <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
        <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
    </a>
</div><!-- /.main-container -->

<!-- basic scripts -->

<!--[if !IE]> -->
<script src="assets/js/jquery-2.1.4.min.js"></script>

<!-- <![endif]-->

<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
<script type="text/javascript">
                    if ('ontouchstart' in document.documentElement)
                        document.write("<script src='assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
</script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery-ui.custom.min.js"></script>

<script src="assets/js/bootstrap-datepicker.min.js"></script>
<script src="assets/js/bootstrap-timepicker.min.js"></script>



<!-- ace scripts -->
<script src="assets/js/ace-elements.min.js"></script>
<script src="assets/js/ace.min.js"></script>
<script>
                    $(document).ready(function () {

                        $("#success-alert").hide();
                        $("#success-alert").fadeTo(1000, 500).slideUp(500, function () {
                            $("#success-alert").alert('close');
                            window.location.href=window.location.href;
                        });
                        //$( '#validation-form' ).reset();


                        $('.date-picker').datepicker({
                            autoclose: true,
                            todayHighlight: true
                        })
                                //show datepicker when clicking on the icon
                                .next().on(ace.click_event, function () {
                            $(this).prev().focus();
                        });

                       

                        //to translate the daterange picker, please copy the "examples/daterange-fr.js" contents here before initialization
                       


                       



                      


                    });


</script>		<!-- inline scripts related to this page -->
</body>
</html>
<?php 

}else
{
session_destroy();

session_unset();

header('Location:index.php?authentication failed');

}

?>