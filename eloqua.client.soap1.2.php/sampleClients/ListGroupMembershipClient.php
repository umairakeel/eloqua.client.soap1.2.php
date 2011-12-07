<?php

include ('../EloquaSOAPClient.php');
echo '<link rel="stylesheet" href="../bootstrap.css" type="text/css">';
echo '<link rel="stylesheet" href="../style.css" type="text/css">';
echo '<div class="container">';
echo  '<div align="Center">
<table class="bordered-table">
<tr>

<td><h3>Service Name : </h3></td> <td><h3> ListGroupMembership </h3></td>
</tr>
<tr>
<td><h3>Service Description : </h3></td><td></td>
</tr>

<tr>
<td><h3>PHP Client Code Snippet : <h3></td><td> 
<b><br>$client = new EloquaSoapClient($wsdl, $userName, $password,$endPointURL); </br>
<br>$param = new ListGroupMembership($dynamicEntity)</br>
<br>$grpMemberResponse = $client->ListGroupMembership($param);</br>
</b>
</td>
</tr>
</table>
</div>';

session_start();
if(isSet($_SESSION['userName']) && isset($_SESSION['password']) && isset($_SESSION['endPointURL']))
{
	if(isSet($_GET['email']))
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
	$client_email_Address = $_GET["email"];	
	$entityType = new EntityType(0, 'Contact', 'Base');
	$param = new Query($entityType,'C_EmailAddress='.$client_email_Address,null,1,10);
	# Invoke SOAP Request : Query ()
	$response = $client->Query($param);
	$queryResult = $response->QueryResult;
	if(isSet($queryResult->Entities->DynamicEntity))
	{
    $dynamicEntity = $queryResult->Entities->DynamicEntity;
	$param = new ListGroupMembership($dynamicEntity);
	$grpMemberResponse = $client->ListGroupMembership($param);
	$listGrpMembershipResult = $grpMemberResponse->ListGroupMembershipResult;
	$dynamicAssetArr = $listGrpMembershipResult->DynamicAsset;
	echo '<table class="bordered-table">';
	echo '<tr><td>ID</td><td>Name</td><td>Type</td><td>Field Values</td></tr>';
	if(is_array($dynamicAssetArr))
	foreach ($dynamicAssetArr as $key => $dynamicAsset)
	{
		$assetType = $dynamicAsset->AssetType;
		$fieldValueCollection = $dynamicAsset->FieldValueCollection;
		echo '<td>'.$assetType->ID.'</td><td>'.$assetType->Name.'</td><td>'.$assetType->Type.'</td>';
		echo '<td>';
	foreach ($fieldValueCollection as $fvcKey => $fv)
	{
		echo print_r($fv);
	}
	echo '</td></tr>';
	}
	else
	{
		print_r($dynamicAssetArr);
	}
	echo'</table>';	
	}
	else
	{
		echo 'Unable to fetch entity';
	}
	echo '<br>';
	echo '<br>';
	echo '<form action="ListGroupMembershipClient.php" method="GET"><div><button class="btn success"  type="submit" value="e">Back</button></div></form>';
	}
	catch (Exception $e)
	{
	echo '<table><tr><td>Error Occured</td><td>Error Message : '.$e->getMessage().'</td></tr></table>';
	echo '<form action="../index.php" method="GET"><div><button class="btn danger"  type="submit" value="Go to Example Page">Back</button></div></form>';
	}
	
	echo '</div>';
	echo '</div>';

	}
	else
	{	
	echo '<form action="ListGroupMembershipClient.php">';
	echo '<table class="bordered-table">';
	echo '<tr><td>Email Address : </td>
	<td><input type ="Text" name="email"></input></td>
	<td><input type="Submit" Value="Query"></td>
	</form>
	</tr>';
	echo '</table>';
	echo '<form action="../index.php" method="GET"><div><button class="btn success"  type="submit">Back</button></div></form>';
	}
	}
	else
	{
	echo '<h2>Login Credentials not available. Please Press the Back Button to set login Credentials.<h2>'; 
	echo '<form action="../index.php" method="GET"><div><button class="btn danger"  type="submit" value="Go to Example Page">Back</button></div></form>';
	}
	echo '</div>';
?>