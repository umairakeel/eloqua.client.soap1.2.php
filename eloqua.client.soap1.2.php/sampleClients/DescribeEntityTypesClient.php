<?php
include ('../EloquaSOAPClient.php');
# Sample Client
print "SOAP API Sample - DescribeEntityType()<p>";

try
{
# Instantiate a new instance of the Soap client
 chdir('../');
$wsdl = getcwd().'/wsdl/EloquaServiceV1.2.wsdl';
# Client Credentials
$username = "######";
$password = "######";
$endURL = "https://qasecure.eloquacorp.com/API/1.2/Service.svc?wsdl" ;

$client = new EloquaSoapClient($wsdl, $username, $password,$endURL);
$client->__setLocation($endURL);

# Invoke SOAP Request : ListEntityTypes()
$response = $client->DescribeEntityType(array('Form'));

# Print the response
print_r($response);

}
catch (Exception $e)
{
$response = 'Some thing went wrong...'.$e->getMessage();
}
?>