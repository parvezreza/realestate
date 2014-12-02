<?php
	session_start(); 
	require_once('include/header.php');
	require_once('admin/include/DBConnect.php');
	$hDB = new DBConnect(); 
?>
<script type="text/javascript" src="js/jquery-1.4.3.min.js"></script>
<script type="application/javascript" src="js/TextBoxDisableEnable.js"></script>
<script type="text/javascript" src="js/jquery.formcheck_OLD.js"></script>

<script type="text/javascript">
	$(function(){
		jQuery ("input#btnSubmit").click( function() {
			jQuery('#DataForm').formCheck({ errorClass : 'input-notation-error', submit : true });
		});
	});
</script>

<div class="menu_bar_bg">
<div id="centeredmenu">

   <ul>
     <li  class="active"><a href="index.php" class="active"><div id="home"><img src="images/home-logo.png" border="none" /></div>Home</a></li>
      <div id="bar_line"><img src="images/BAR.png" /></div><li><a href="#">About Us</a>
         <ul>
            <li><a href="company_profile.php">Company Profile</a></li>
            <li><a href="message_chairman.php">Message of the Chairman</a></li>
            <li><a href="message_md.php">Message of the MD</a></li>
            <li><a href="objectives.php">Objectives</a></li>
         </ul>
      </li>
      <div id="bar_line"><img src="images/BAR.png" /></div><li><a href="#">Projects</a>
         <ul>
            <li><a href="land_project.php">Land Projects</a></li>
            <li><a href="apartment_project.php">Apartment Projects</a></li>
         </ul>
      </li>
      <div id="bar_line"><img src="images/BAR.png" /></div><li><a href="career.php">Career</a></li>
       <div id="bar_line"><img src="images/BAR.png" /></div><li><a href="gallery.php">Gallery</a>
         <!--<ul>
            <li><a href="#">Photo Gallery</a></li>
            <li><a href="#">Video Gallery</a></li>
         </ul>-->
      </li>   
      <div id="bar_line"><img src="images/BAR.png" /></div><li><a href="contact_us.php">Contact Us</a></li><div id="bar_line"><img src="images/BAR.png" /></div>
      
   </ul>

<div class="search_box"><input type="text" name="Search" value="Search" size="20" /></div>
<div class="search_border">
<div class="search"><a href="search.php">Search</a></div></div>
<div class="bar_line"><img src="images/line_bar.png" /></div>
<div class="sign_in"><a href="customer_login.php">Sign in</a></div></div></div><!--menu_bar_bg-->
<div class="left_nav">
<div class="sidebarmenu">    
                <a class="menuitem" href="index.php"><span>&nbsp; Home</span></a>
                <a class="menuitem submenuheader" href=""><span>About Us</span></a>
                <div class="submenu">
                    <ul>
                    	<li><a href="company_profile.php">Company Profile</a></li>
            			<li><a href="message_chairman.php">Message of the Chairman</a></li>
           				<li><a href="message_md.php">Message of the MD</a></li>
            			<li><a href="objectives.php">Objectives</a></li>
                    </ul>
                </div>
                    <a class="menuitem submenuheader" href=""><span>Land Projects</span></a>
<div class="submenu">
                 <ul>
                    <li><a href="land_project.php?project=handed over">Handed over Projects</a></li>
                    <li><a href="land_project.php?project=ongoing">Ongoing Projects</a></li>
                    <li><a href="land_project.php?project=upcoming">Upcoming Projects</a></li>
                    </ul>
                </div>
                    <a class="menuitem submenuheader" href=""><span>Apartment Projects</span></a>
<div class="submenu">
                 <ul>
                    <li><a href="apartment_project.php?project=handed over">Handed over Projects</a></li>
                    <li><a href="apartment_project.php?project=ongoing">Ongoing Projects</a></li>
                    <li><a href="apartment_project.php?project=upcoming">Upcoming Projects</a></li>
                    </ul>
                </div>
                <a class="menuitem" href="new_registration.php"><span>&nbsp; Online Registration</span></a>
                <a class="menuitem" href="e-brochure.php"><span>&nbsp; E-Brochure</span></a>
                <a class="menuitem" href="http://noboudoy.com/webmail" target="_blank"><span>&nbsp; Web Mail</span></a>                  
            </div>

    </div> <!--Left_nav DIV End-->

<!--<div class="nav_bar_home"></div>-->
<!--<div style=" width:300px;margin:200px; float:left"><h1>Under Construction</h1></div>-->
<div style="width:750px; margin:30px 0 30px 5px; float:left;border-left:1px solid #566f4f;">
<div id="new_registation_tab">Registration Form</div>
<?php 
	if($_POST)
	{
		$name = trim($_POST['name']);
		$fname = trim($_POST['f_name']);
		$mname = trim($_POST['m_name']);
		$profession = trim($_POST['profession']);
		$add_permanent = trim($_POST['permanent']);
		$add_present = trim($_POST['present']);
		$birth = trim($_POST['birth']);
		$nationality = trim($_POST['nationality']);
		$national_id = trim($_POST['national_id']);
		$tel_office = trim($_POST['telephone']);
		$tel_res = trim($_POST['res']);
		$mobile = trim($_POST['mobile']);
		$email = trim($_POST['email']);
		$nominee = trim($_POST['nomi_name']);
		$relation = trim($_POST['relation']);
		$nomi_address = trim($_POST['nomi_address']);
		$date = date("Y-m-d");
		
		$hDB->Query("INSERT INTO tbl_signup_client VALUES('','$name','$fname','$mname','$profession','$add_permanent','$add_present','$tel_office','$tel_res','$mobile','$email','$birth','$nationality','$national_id','$nominee','$relation','$nomi_address','$date')");
?>
	<div style="float:left; margin:30px 0 0 20px">
<?php
		print "Dear, <strong>".$name."</strong>, <br>Your information is submitted. You will get confirmation shortly via email!<br><br>Thank you for Registration.";
?>
	</div>
<?php
	}
	else
	{
?>
<script>
function readURL(input) 
{
    if (input.files && input.files[0]) 
	{
        var reader = new FileReader();

        reader.onload = function (e) 
		{
            $('#img_prev')
            .attr('src', e.target.result)
			.width(145)
            .height(150);
		};
        reader.readAsDataURL(input.files[0]);
		
   }
}


function writeURL(input) 
{
    if (input.files && input.files[0]) 
	{
        var reader = new FileReader();

        reader.onload = function (e) 
		{
            $('#img_prev1')
            .attr('src', e.target.result)
			.width(145)
            .height(150);
		};
        reader.readAsDataURL(input.files[0]);
		
   }
}
</script>
<style type="text/css">
#img_prev{
	float:left;
	margin:-178px 0px 0px 0px;
}
#img_prev1{
	float:left;
	margin:-178px 0px 0px 0px;
}
.file{
	float:left;
	margin:154px 0px 0px -2px;
}
</style>
<!--[if IE]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
	<form action="new_registation.php" method="post" id="DataForm">
        <div class="applicant_photo">
            
            <div class="file">
            <input type="file" name="browse" onchange="readURL(this)" /></div>
            <img id="img_prev" src="#" />
        </div>
        <div class="nominee_photo">
            <div class="file">
            
            <input type="file" name="browse"onchange="writeURL(this)" /></div>
            <img id="img_prev1" src="#" />
        </div>
   
    
      <div class="new">
      <br />
      		<div class="Ctitle">Applicant Information</div>
                <p>Name of Applicant (In Block Letter) *</p><input name="name" type="text"  fv="required 5" /><span><span></span></span>
                <p>S/O, D/O, W/O *</p><input name="f_name" type="text"  fv="required 5" /><span></span>
                <p>Mother's Name *</p><input name="m_name" type="text"  fv="required 5" /><span></span>
                <p>Occupation/Profession</p><input name="profession" type="text"  /><span></span>
                <p>Permanent Address *</p><textarea name="permanent"  fv="required 5" ></textarea> &nbsp; &nbsp; &nbsp; <span></span>
                <p>Present/Mailing Address *</p><textarea name="present"  fv="required 5" ></textarea> &nbsp; &nbsp; &nbsp; <span></span>
                <p>Date of Birth (dd-mm-yyyy)</p><input  name="birth" type="text" fv="required" /><span></span>
                <p>Nationality *</p><input  name="nationality" type="text"   fv="required 5" /><span></span>
                <p>National ID No/ Passport No</p><input  name="national_id" type="text" /><span></span>
               <br /><br />
                
                <div class="Ctitle">Contact Details </div>
                <p>Telephone: Office</p><input  name="telephone" type="text"   /><span></span>
                <p>Telephone: Residence</p><input  name="res" type="text"  /><span></span>
                <p>Mobile *</p><input  name="mobile" type="text"  fv="required 11" /><span></span>
                <p>E-mail</p><input  name="email" type="text"   fv="email 8" /><span></span>
   	 </div>

    <div class="new">
         <br />
         <div class="Ctitle">Details of Nominee</div>
                <p>Nominee Name (In Block Letter) *</p><input  name="nomi_name" type="text"   fv="required 5" /><span></span>
                <p>Relation with Applicant *</p><input  name="relation" type="text"   fv="required 3" /><span></span>
                <p>Permanent Address</p><textarea  name="nomi_address" fv="required 5"  /></textarea><span></span>
                <p>Present/Mailing Address</p><textarea  name="nomi_address" fv="required 5"  /></textarea><span></span>
               	<br /><br />
                
                <div class="Ctitle">Reference</div>
                <p>Name *</p><input  name="nomi_name" type="text"   fv="required 5" /><span></span>
                <p>Address</p><textarea  name="nomi_address" fv="required 5"  /></textarea><span></span>
                <br /><br />
                
                <div class="Ctitle">Application for Plot</div>
                <p>Project Name *</p><input  name="nomi_name" type="text"   fv="required 5" /><span></span>
                <p>Area in Katha *</p><input  name="relation" type="text"   fv="required 3" /><span></span>
                <br /><br />
                
                <div class="Ctitle">Mode of Payment</div>
                <p>Mode of Payment *</p>
                <form name="fRadio">
  				<p><input name="dOption" value="N" checked="checked" onClick="chMd()" type="radio"> At A time <br />
				<input name="dOption" value="T" onClick="chMd()" type="radio"> Installment<br />
				<input name="sTextBox" size="10"  disabled="disabled"  type="text"></p>
  				</form>
                <!--<p>Mode of Payment *</p>
                <p><input name="at_a_time" type="radio" value="At a Time" fv="required 3" />At a Time<p>
                <p><input name="at_a_time" type="radio" value="Installment" fv="required 3" />Installment</p>
                <input type="text" name="installment_value" fv="required 3" /><span></span>--> 
                <br /><br />
                       
    </div>
    <script>
    function signatureURL(input) 
{
    if (input.files && input.files[0]) 
	{
        var reader = new FileReader();

        reader.onload = function (e) 
		{
            $('#signature_img')
            .attr('src', e.target.result)
			.width(220)
            .height(50);
		};
        reader.readAsDataURL(input.files[0]);
		
   }
}
</script>
<style type="text/css">
.browse_button{
	float:left;
	margin:0px 0px 0px 0px;
}
#signature_img{
	float:left;
	margin:-108px 0px 0px -1px;
}
</style>
    <div class="declaration">
    						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   					  <u>DECLARATION</u>
                      <p style="margin-top:5px">
                            I do hereby declare that the information and particulares as furnished in the application are true to the best of my                            knowledge. I also declared I do not supress any information or furnish any wrong information. I have studied the prospectus                            including layout plan of Company's project, the rules and procedures of plot allotment and understood that the plot  would be                            transferred in my name by registered deed after receipt of the value/cost in full. I would be obliged to accept the decision                            of the company in respect of plot allotment. In the event of allotment of any plot in favour of me I would get the transfer                            deed registered at my own cost. I agree to be a member of the Plot Owner's Co-operative Society and shall abide by rules and                            regulations framed by the said Society.
                      </p><br />
   </div>
   							<p style="float:left"><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input class="submit" type="button" id="btnSubmit" value="Submit"  /></p>
                            
                	        <div class="signature_border"></div>
                      		<div class="signature_upload"><img src="images/signature-line.png" /><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Signature of                     		The Applicant's
                            <div class="browse_button">
                      		<input type="file" onchange="signatureURL(this)"   style="margin-top:5px" /></div>
                            <img id="signature_img" src="#">
                      		</div> 
                              
   </form> 	
<?php
	}
?>
 </div>
 </div><!--Middle_content DIV End-->
<?php  require_once('include/footer.php'); ?>