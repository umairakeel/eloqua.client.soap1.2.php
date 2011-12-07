<html>
<Title>Eloqua Sample PHP Client</Title>
<link rel="stylesheet" href="bootstrap.css" type="text/css">
<link rel="stylesheet" href="style.css" type="text/css">
<?php
	session_start(); // start up your PHP session! 
	if(isSet($_GET['userName']) && isSet($_GET['password']) && isSet($_GET['endPointURL']))
	{
    $_SESSION['userName'] = $_GET['userName'];
	$_SESSION['password'] = $_GET['password'];
	$_SESSION['endPointURL'] = $_GET['endPointURL'];
	}
	if(isSet($_GET['clear']))
	{
	unset($_GET);
	unset($_SESSION);
	}
?>
<body>
<div align="Center">
<h3>Eloqua API PHP Client Demonstration</h3>
<h4>(This is a Demo application containing Eloqua API PHP Client Usage Samples)<h4>
</div>
<p></p>
<div>
<table class="bordered-table">
<h3>Connection Details</h3>
<?php 
	if(!isset($_SESSION['userName']) && !isset($_SESSION['password']) && !isset($_SESSION['endPointURL'])) 
	{
	echo 'Please fill out the connection details and press connect button.';
	}
?>
<form action='#'>
<table border = "1">
<tr>
<td><h5>User Name : </h5></td>
<td>
<?php 
	if(isset($_SESSION['userName']))
	{
	echo $_SESSION['userName'];
	echo '</td>';
	}
	else
	{
	echo '<input type="Text" name ="userName" id="userName" Value="" ></input> ';
	echo ' Company Name \ User Name';
	}
?>
</td>

</tr>
<tr>
<td><h5>Password : </h5></td>
<td>
<?php 
	if(isset($_SESSION['userName']))
	{
	echo '######';
	}
	else
	{
	echo '<input type="Password" name ="password" id="password" Value="" ></input> ';
	echo ' Password';
	}
?>

</td>
</tr>
<tr>
<td><h5>Services URL : </h5></td>
<td>
<?php 
	if(isset($_SESSION['endPointURL']))
	{
	echo $_SESSION['endPointURL'];
	}
	else
	{
	echo '<input type="Text" name ="endPointURL" id="endPointURL" Value="" ></input> ';
	echo ' https://secure.eloqua.com/API/1.2/Service.svc?wsdl';
	}
?>
</td>
</tr>
</table>
<?php
	if(!isset($_SESSION['userName']) && !isset($_SESSION['password']) && !isset($_SESSION['endPointURL'])) 
	{
	echo '<div><button class="btn success"  type="submit" value="">Connect</button></div>';
	echo '<br>';	
	}
	else
	{
	echo '<input type="hidden" name="clear" value="clear" /input>';
	echo '<div><button class="btn danger"  type="submit" value="Go to Example Page">Clear</button></div>';
	} 
?> 

</form>
</div>
<br>

<h3>Eloqua Services</h3>
<br>

<table border = "1">
<tr>
<td>
<h5>
Entity Meta Data Services
</h5>
</td>
<td>
   <ul class="pills">
   <li><a href="sampleClients/ListEntityTypesClient.php">List Entity Types</a></li>
   <li><a href="#">Describe Entity Type</a></li>
   <li><a href="#">Describe Entity</a></li>
   </ul>
</td>
</tr>
<tr>
<td>
<h5>
Asset Meta Data Services
</h5>
</td>
<td>
   <ul class="pills">
   <li><a href="sampleClients/ListAssetTypesClient.php">List Asset Types</a></li>
   <li><a href="#">Describe Asset Type</a></li>
   <li><a href="#">Describe Asset</a></li>
   </ul>
</td>
</tr>
<tr>
<td>
<h5>
Entity Operational Services
</h5>
</td>
<td>
   <ul class="pills">
   <li><a href="sampleClients/CreateEntityClient.php">Create Entity</a></li>
   <li><a href="#">Retreive Entity</a></li>
   <li><a href="#">Update Entity</a></li>
   <li><a href="#">Delete Entity</a></li>
   <li><a href="sampleClients/QueryEntityClient.php">Query Entity</a></li>
   </ul>
</td>
</tr>
<tr>
<td>
<h5>
Asset Operational Services
</h5>
</td>
<td>
   <ul class="pills">
   <li><a href="sampleClients/CreateAssetClient.php">Create Asset</a></li>
   <li><a href="#">Retreive Asset</a></li>
   <li><a href="#">Update Asset</a></li>
   <li><a href="#">Delete Asset</a></li>
   </ul>
</td>
</tr>

<td>
<h5>
Activity Services
</h5>
</td>
<td>
   <ul class="pills">
   <li><a href="sampleClients/ListActivityTypesClient.php">List Activity Types</a></li>
   <li><a href="#">Describe Activity Type</a></li>
   <li><a href="#">Describe Activity</a></li>
   <li><a href="#">Get Activities</a></li>
   <li><a href="#">Get Activities for Recepiants</a></li>
   </ul>
</td>
</tr>
<tr>

<tr>
<td>
<h5>
Group Membership Services
</h5>
</td>
<td>
   <ul class="pills">
   <li><a href="sampleClients/ListGroupMembershipClient.php">List Group Memberships</a></li>
   <li><a href="sampleClients/AddGroupMembershipClient.php">Add Group Membership</a></li>
   <li><a href="sampleClients/RemoveGroupMembershipClient.php">Remove Group Membership</a></li>
   </ul>
</td>
</tr>
<tr>
</table>
</body>
</html>
