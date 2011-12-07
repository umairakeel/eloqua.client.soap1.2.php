<?php
# Sample Client
include ('../EloquaSOAPClient.php');
echo '<link rel="stylesheet" href="../style.css" type="text/css">';
print "SOAP API Sample - RetrieveAsset()<p>";
if(isSet($_GET['h_userName']) && isset($_GET['h_password']) && isset($_GET['h_endPointURL']))
{
try
{
	chdir('../');
	$wsdl = getcwd().'/wsdl/EloquaServiceV1.2.wsdl';
	# Client Credentials
	# Fetching Client Credentials from Request
 	$userName = $_GET['h_userName'];
	$password = $_GET['h_password'];
	$endPointURL = $_GET['h_endPointURL'];
	
	# Setting Client Credentials in Session
	session_start(); 
    $_SESSION['userName'] = $_GET['h_userName'];
	$_SESSION['password'] = $_GET['h_password'];
	$_SESSION['endPointURL'] = $_GET['h_endPointURL'];
	
	# Instantiate a new instance of the Soap client
	$client = new EloquaSoapClient($wsdl, $userName, $password,$endPointURL);
	
	# Instantiate Request Object
	$assetType = new AssetType(0, '06540', 'ContactGroup');
	$id = $_GET["id"];
	$param = new RetrieveAsset($assetType,array($id),array());

	# Invoke SOAP Request : Create ()
	$response = $client->RetrieveAsset($param);
	$retreiveResult = $response->RetrieveAssetResult;
	# Print the response
	if (is_array($retreiveResult->DynamicAsset)) 
	{              
	 // 2+ results              
	 echo '<table border = 1>';
	 foreach ($retreiveResult->DynamicAsset as $key => $dynamicAsset) 
	 {
		echo '<tr><td>Asset Fetched with ID </td><td>'.$dynamicAsset->Id.'</td></tr>';			
		echo '</tr>';
	 }
		echo '</table>';
	 } 
	 elseif ($retreiveResult->DynamicAsset instanceof DynamicAsset ) 
	 {   
	    // 1 result
		$dynamicAsset = $retreiveResult->DynamicAsset;
		echo '<table border="1">';
		echo '<tr><td>Asset Fetched with ID </td><td>'.$dynamicAsset->Id.'</td></tr>';			
		echo '</tr>';
		echo '</table>';
	 }
	else 
	{
		echo '<br>';
		echo 'No Result was found based on Retreive Criteria';         
	}	 

}
catch (Exception $e)
{
	$response = 'Something went wrong...'.$e->getMessage();
	print $response;
}
}
else
{
echo 'Login Credentials not available. Please Press the Back Button to set login Credentials.'; 
}
echo '<a href="../index.php">Back</a>'; 
?>