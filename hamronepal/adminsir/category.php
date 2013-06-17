<?php
include("include/db_connection.php");
if($_POST['submit']=="Add")
{
	$name=$_POST['name'];
	$image=$_POST['image'];
	$status=$_POST['status'];
	move_uploaded_file($_FILES["image"]["tmp_name"],"images/".$_FILES["image"]["name"]);
	$sql="insert into tbl_category (id,name,image,status) values('','$name','".$_FILES["image"]["name"]."','$status')";
	$result=mysql_query($sql);
	
}
?>




<link href="css/style.css" rel="stylesheet" type="text/css">

<title>Admin Panel</title>
<center>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr valign="top">
      <td><?
	  include("include/header.php");
	  ?>
      </td>
    </tr>
    <tr valign="top">
      <td align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="185" align="left" valign="top" style="margin:0px;padding:0px;background-color:#F9F9F9"><? include("include/leftmenu.php"); ?></td>
            <td class="mainTd">
			<!--content start -->
            <?php //if((!isset($_GET['action']))){   ?>
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="25"><h2>List of Gallery </h2></td>
                <td align="right"><a href="category.php?action=add" class="topLink">add </a></td>
              </tr>
            </table>
             
              <table width="100%" border="0" cellpadding="0" cellspacing="0" class="dataTable">
                
                <tr align="center">
                  <th width="30%" align="center" nowrap="nowrap" class="th">S.No.</th>
                  <th width="50%" align="center" class="th" > CategoryName </th>
                  <th width="20%" align="center" class="th">Option</th>
                </tr>
      
	 
                <tr valign="top" >
                  <td align="left"></td>
                  <td align="left"></td>
				  
				 
              
                  <td align="left" valign="middle"><a href="category.php?action=edit&Cid=<?php echo $row['categoryid'];?>"><img src="images/edit_icon.gif" alt="Edit" border="0" id="linkimg"  title="Edit" /></a>&nbsp; <a href="category.php?action=delete&Cid=<?php echo $row['categoryid'];?>" onclick="return confirm('Are you sure to delete?')"><img src="images/del_icon.gif" alt="Delete" border="0" id="linkimg" title="Delete" /></a></td>
                </tr>
				<?php //}?>
              
     </table>
   
    
              <table width="100%" border="0" cellpadding="0" cellspacing="0" class="footerTable">
                <tr align="left" valign="top">
                  <td colspan="8" align="center" valign="middle" class="footerTd"></td>
                </tr>
              </table> 
       <? //} ?>        
                        
<?php //if(isset($_GET['action']) && ($_GET['action'])=="add") {?>
<p>Add gallery</p>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<form name="category" method="post" action="#" enctype="multipart/form-data">
<input type="hidden" name="action" value="add">
  <tr class="fadeTd">
    <td width="19%" align="right">Name:</td>
    <td width="81%"><input name="name" id="name" type="text" /></td>
  </tr>
  <tr class="fadeTd">
    <td align="right">Logo</td>
    <td><input name="logo" id="logo" type="file" /></td>
  </tr>
  
  <tr>
    <td align="right">Status:</td>
    <td>
      <select name="status" id="status">
      <option value="available" > Available</option>
       <option value="unavailable" >UnAvailable</option>
      </select>    </td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td >&nbsp;</td>
    <td><input type="submit" name="submit" id="submit" value="Add" /> 
        <input type=button value=Cancel onclick="javascript:document.location='category.php'" ></td>
  </tr>
  </form>
</table>
<?php // } ?>

                 <!--content end -->
            </p>
</td>
          </tr>
        </table></td>
    </tr>
    <tr align="left">
      <td align="center"><? include("include/footer.php"); ?>
      </td>
    </tr>
  </table>
</center>
