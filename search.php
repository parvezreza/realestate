<?php 
	require_once('include/searchEngine.php');
	require_once('include/header.php'); 
?>

<style type="text/css">
	.caption{
		font-family:Arial, Helvetica, sans-serif;
		font-size:18px;
		font-weight:300;
		}
	.caption a{
		text-decoration:underline;
		color:#0033CC;
		}
	.pagelink{
		font:12px Arial, Helvetica, sans-serif;
		color:#339933;
		}	
	.description{
		font:13px Arial, Helvetica, sans-serif;
		text-align:justify;
		}
	.next{
		padding:0 4px 0 4px;
		border: 1px solid #666;
		
		}
	.next a{
		text-decoration:none;
		color:#0033CC;
		}
		
	.prev{
		padding:0 4px 0 4px;
		border: 1px solid #666;
		}
	.prev a{
		text-decoration:none;
		color:#0033CC;
		}
	.pageNo{
		border: 1px solid #666;
		padding:0 4px 0 4px;
		margin:0 3px 0 3px;
		text-decoration:none;
		color:#0033CC;
		}
	.pageActive{
		background:#CCC;
		padding:0 4px;
		}
	.pagination{
		text-align:center;
	}
	
	.search{
		height:40px;
		font-family:Gabriola;
		font-size:24px;
		color:#2548D8;
		margin:0 0 0 25px;
	}
	
</style>

<div class="menu_bar_bg">
<div id="centeredmenu">

   <ul>
     <li><a href="index.php">Home</a></li>
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
        <!-- <ul>
            <li><a href="#">Photo Gallery</a></li>
            <li><a href="#">Video Gallery</a></li>
         </ul>-->
      </li>   
      <div id="bar_line"><img src="images/BAR.png" /></div><li><a href="contact_us.php">Contact Us</a></li><div id="bar_line"><img src="images/BAR.png" /></div>
      
   </ul>

<div class="search_box">
	<form action="search.php" method="get" id="SearchForm">
		<input type="text" id="search" name="search" value="Search" size="20" />
    </form>
</div>
<div class="search_border">
<div class="search"><a href="#">Search</a></div></div>
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

<div class="" style="width:745px; float:left; margin:30px 0 30px 5px; border-left:1px solid #566f4f">
<div class="middle_content_search">
	<div class="search">Search</div>
    <div style="margin:0 0 0 25px"><img src="images/icon1.png" /></div>
<div style="margin:0 0 0 25px">
	
	<?php
        $dir = '';
		switch($_SERVER['SERVER_NAME'])
		{
			case 'localhost':
				$dir=$_SERVER['DOCUMENT_ROOT'].'/noboudoy';
				break;
			
			case 'www.noboudoy.com':
				$dir=$_SERVER['DOCUMENT_ROOT'];
				break;
		}
		 
        $searchStr=trim($_GET['search']);
        if($_REQUEST && !empty($searchStr))
        {
            $string=$_GET[search];	
            $Engine=new WgEngine($string,$dir);
            $Engine->foundItem('caption','pagelink','description');
	?>
    		<div class="pagination">
    <?php
			if(count($Engine->pages) > 1){
            	$Engine->pagination('next','prev','pageNo','pageActive');
			}
	?>
    		</div>
    <?php
        }
    ?>
</div>

 </div></div><!--Middle_content DIV End-->
<?php require_once('include/footer.php'); ?>