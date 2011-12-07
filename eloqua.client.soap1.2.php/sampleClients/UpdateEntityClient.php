<?php

# Sample Client
include ('../EloquaSOAPClient.php');
echo '<link rel="stylesheet" href="../style.css" type="text/css">';
print "SOAP API Sample - UpdateEntity()<p>";
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

	$entityType = new EntityType(0, 'Contact', 'Base');
	$entityFields = new EntityFields('C_EmailAddress','syed.naqvi11112@eloqua.com');
	$dynamicEntityFields = new DynamicEntityFields($entityFields);
	$entity = new DynamicEntity($entityType,$dynamicEntityFields,'1642087');
	$param = new Update(array($entity));
	# Invoke SOAP Request : Create ()
	$response = $client->Update($param);
	# Print the response
	print_r($response);
}
catch (Exception $e)
{
	$response = 'Something went wrong...'.$e->getMessage();
	print $response;
}
}
else
{
echo '<h2>Login Credentials not available. Please Press the Back Button to set login Credentials.<h2>'; 
echo '<form action="../index.php" method="GET"><div><button class="btn danger"  type="submit" value="Go to Example Page">Back</button></div></form>';
}

?>