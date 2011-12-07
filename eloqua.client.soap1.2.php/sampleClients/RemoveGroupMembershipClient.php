<?php

include ('../EloquaSOAPClient.php');
echo '<link rel="stylesheet" href="../bootstrap.css" type="text/css">';
echo '<link rel="stylesheet" href="../style.css" type="text/css">';
echo '<div class="container">';
echo  '<div align="Center">
<table class="bordered-table">
<tr>

<td><h3>Service Name : </h3></td> <td><h3> RemoveGroupMembership </h3></td>
</tr>
<tr>
<td><h3>Service Description : </h3></td><td></td>
</tr>

<tr>
<td><h3>PHP Client Code Snippet : <h3></td><td> 

<b><br>$client = new EloquaSoapClient($wsdl, $userName, $password,$endPointURL); </br>
<br>$param = new RemoveGroupMember($dynamicEntity,$dynamicAsset);</br>
<br>$response = $client->RemoveGroupMember($param);</br>
</b>
</td>
</tr>
</table>
</div>';
session_start();
if(isSet($_SESSION['userName']) && isset($_SESSION['password']) && isset($_SESSION['endPointURL']))
{
if(isSet($_GET['entityTypeName']) && isSet($_GET['entityType']) && isSet($_GET['entity_id']) && isSet($_GET['assetTypeName']) && isSet($_GET['assetType']) && isSet($_GET['asset_id']) )
{
try
{
	chdir('../');
	$wsdl = getcwd().'/wsdl/EloquaServiceV1.2.wsdl';
	# Fetching Client Credentials from Request
 	$userName= $_SESSION['userName'];
	$password = $_SESSION['password'];
	$endPointURL = $_SESSION['endPointURL'];
	# Instantiate a new instance of the Soap client
	$client = new EloquaSoapClient($wsdl, $userName, $password,$endPointURL);

	# Invoke SOAP Request : ListEntityTypes()
	$entityTypeName = $_GET["entityTypeName"];
	$entityType = $_GET["entityType"];
	$id = $_GET["entity_id"];
	$entityType = new EntityType(0, $entityTypeName, $entityType);
	$param = new Retrieve($entityType,array($id),array());

	# Invoke SOAP Request : Create ()
	$response = $client->Retrieve($param);
	$retreiveResult = $response->RetrieveResult;
	reset($retreiveResult);
	$dynamicEntity = current($retreiveResult);
		
	# Instantiate Request Object
	$assetTypeName = $_GET["assetTypeName"];
	$assetType = $_GET["assetType"];
	$asset_id = $_GET["asset_id"];
	$assetType = new AssetType(0, $assetTypeName, $assetType);
	$id = $_GET["asset_id"];
	$param = new RetrieveAsset($assetType,array($id),array());

	# Invoke SOAP Request : Create ()
	$response = $client->RetrieveAsset($param);
	$retreiveResult = $response->RetrieveAssetResult;
	reset($retreiveResult);
	$dynamicAsset = current($retreiveResult);
	
	$param = new RemoveGroupMember($dynamicEntity,$dynamicAsset);
	$response = $client->RemoveGroupMember($param);
	$removeResultID = $response->RemoveGroupMemberResult->Success;
	
	echo '<table border = 1>';
	echo '<tr><td>Group Membership Result : </td><td>'.$removeResultID.'</td></tr>';
	echo '</table>';
	echo '<br>';
	echo '<form action="RemoveGroupMembershipClient.php" method="GET"><div><button class="btn success"  type="submit" value="e">Back</button></div></form>';
	echo '<br>';
	
	
}
catch (Exception $e)
{
$response = 'Something went wrong...'.$e->getMessage();
print $response;
}
}
else
{
	echo '<form action="RemoveGroupMembershipClient.php">';
	echo '<table class="bordered-table">';
	echo '<tr>
	<tr><td>Entity Type : </td> <td><input type ="Text" name="entityType"></input>e.g. Base</td></tr>
	<td>Entity Type Name : </td> <td><input type ="Text" name="entityTypeName"></input>e.g. Contact</td></tr>
	<tr><td>Entity ID : </td> <td><input type ="Text" name="entity_id"></input>Hint: Fetch Contact ID by using Query Service</td></tr>
	<tr><td>Asset Type : </td> <td><input type ="Text" name="assetType"></input>e.g. ContactGroup</td></tr>
	<tr><td>Asset Type Name : </td> <td><input type ="Text" name="assetTypeName"></input>Hint: Fetch Asset Type by invoking Describe AssetTypes Service</td></tr>
	<tr><td>Asset ID : </td> <td><input type ="Text" name="asset_id"></input>Hint: Fetch Asset ID by invoking RetreiveAsset Service</td></tr>
	</table>';
	echo '<input type="Submit" Value="Remove Group Membership">';
	echo '</form>';
	
	
	echo '<form action="../index.php" method="GET"><div><button class="btn success"  type="submit">Back</button></div></form>';
}
}
else
{
echo 'Login Credentials not available. Please Press the Back Button to set login Credentials.'; 
}
?>