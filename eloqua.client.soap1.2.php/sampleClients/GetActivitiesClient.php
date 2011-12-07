<?php

include ('../EloquaSOAPClient.php');
echo '<link rel="stylesheet" href="../bootstrap.css" type="text/css">';
echo '<link rel="stylesheet" href="../style.css" type="text/css">';

# Sample Client
print "SOAP API Sample - AddGroupMembership()<p>";
echo '<div class="container">';
session_start();
if(isSet($_SESSION['userName']) && isset($_SESSION['password']) && isset($_SESSION['endPointURL']))
{
if(isSet($_GET['emailAddress']) && isSet($_GET['activity']))
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
	$client_email_Address = $_GET["email"];	
	$entityType = new EntityType(0, 'Contact', 'Base');
	$param = new Query($entityType,'C_EmailAddress='.$client_email_Address,null,1,10);
	# Invoke SOAP Request : Query ()
	$response = $client->Query($param);
	$queryResult = $response->QueryResult;
	if(isSet($queryResult->Entities->DynamicEntity))
	{
	
	}

	
	
	# Instantiate Request Object
	$assetTypeName = $_GET["assetTypeName"];
	$assetType = $_GET["assetType"];
	$asset_id = $_GET["asset_id"];
	$assetType = new AssetType(0, '06540', 'ContactGroup');
	$id = $_GET["asset_id"];
	$param = new RetrieveAsset($assetType,array($id),array());

	# Invoke SOAP Request : Create ()
	$response = $client->RetrieveAsset($param);
	$retreiveResult = $response->RetrieveAssetResult;
	reset($retreiveResult);
	$dynamicAsset = current($retreiveResult);
	
	$param = new AddGroupMember($dynamicEntity,$dynamicAsset);
	$response = $client->AddGroupMember($param);
	
	print_r($response);
	
	
	# Show the response
	
}
catch (Exception $e)
{
$response = 'Something went wrong...'.$e->getMessage();
print $response;
}
}
else
{
	echo '<form action="AddGroupMembershipClient.php">';
	echo '<table class="bordered-table">';
	echo '<tr><td>E-Mail Address : </td> <td><input type ="Text" name="email"></input></td></tr>
	<tr><td>Activity : </td> <td><input type ="Text" name="activity"></input></td></tr>
	</table>';
	echo '<input type="Submit" Value="Get Activities">';
	echo '</form>';
	
	
	echo '<form action="../index.php" method="GET"><div><button class="btn success"  type="submit">Back</button></div></form>';
}
}
else
{
echo 'Login Credentials not available. Please Press the Back Button to set login Credentials.'; 
}

?>