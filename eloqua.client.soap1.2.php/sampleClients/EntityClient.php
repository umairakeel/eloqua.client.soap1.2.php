<?php
include ('../EloquaSOAPClient.php');
# Sample Client
echo 'SOAP API Sample - This Sample contains calls to ListEntityTypes(), DescribeEntityType(), DescribeEntity() Service calls<p>';
echo '<br>';

# Instantiate a new instance of the Soap client
chdir('../');
$wsdl = getcwd().'/wsdl/EloquaServiceV1.2.wsdl';
# Client Credentials
$username = "OrionTest\Orion.Full";
$password = "Eloqua123";
$endPointURL = "https://qasecure.eloquacorp.com/API/1.2/Service.svc?wsdl" ;

$client = new EloquaSoapClient($wsdl, $username, $password,$endPointURL);

echo 'Invoking Service List Entity Types : ';

try
{
$param = new ListEntityTypes();
# Invoke SOAP Request : ListEntityTypes()
$listEntityTypesResponse = $client->ListEntityTypes($param);

if($listEntityTypesResponse != null)
{
echo 'Service invoked successfully ';
echo '<br>';
$listEntityTypesResult = $listEntityTypesResponse->ListEntityTypesResult;
$entityTypes = $listEntityTypesResult->EntityTypes;
echo '<table border ="1">';
echo '<tr> <td>Counter</td><td>Type</td></tr>';
foreach( $entityTypes as $key => $entityType)
{
foreach ($entityType as $key => $value)
{
echo '<tr>';
	echo '<td>'.$key.'</td>';
	echo '<td>'.$value.'</td>';
echo '</tr>';	
}
}
echo '</table>';
echo '<br>';
echo '<br>';
}
}
catch (Exception $e)
{
echo 'Error Invoking Service List Entity Types : ';
echo '<br>';
$errorResponse = 'Something went wrong...'.$e->getMessage();
echo $errorResponse;
echo '<br>';
}

echo 'Invoking Service Describe Entity Type. Using Global Entity Type (Base) : ';

try
{
$globalEntityType = 'Base';
$param = new DescribeEntityType($globalEntityType);

# Invoke SOAP Request : DescribeEntityType()
$describeEntityTypeResponse = $client->DescribeEntityType($param);
echo 'Service invoked successfully ';
echo '<br>';
if($describeEntityTypeResponse !=null)
{
$describeEntityTypesResult = $describeEntityTypeResponse->DescribeEntityTypeResult;
$entityTypes = $describeEntityTypesResult->EntityTypes;

echo '<table border ="1">';
echo '<tr> <td>Counter</td><td>ID</td><td>Name</td><td>Type</td> </tr>';
foreach ($entityTypes as $key => $entityType)
{
foreach ($entityType as $key =>$value)
{
echo '<tr>';
	echo '<td>'.$key.'</td>';
	echo '<td>'.$value->ID.'</td>';
	echo '<td>'.$value->Name.'</td>';
	echo '<td>'.$value->Type.'</td>';
echo '</tr>';	
}
}
echo '</table>';
echo '<br>';
}
}
catch (Exception $e)
{
$errorResponse = 'Something went wrong...'.$e->getMessage();
print $errorResponse;
}



echo '<br>';
echo 'Invoking Service Describe Entity. Describing Entity (Contact) : ';

try
{

$param = new DescribeEntity(new EntityType(0, 'Prospect', 'Base'));

# Invoke SOAP Request : DescribeEntity()
$describeEntityResponse = $client->DescribeEntity($param);
echo 'Service invoked successfully ';
echo '<br>';
if($describeEntityResponse !=null)
{
$describeEntityResult = $describeEntityResponse->DescribeEntityResult;
$fields = $describeEntityResult->Fields;
echo '<table border ="1">';
echo '<tr><td>Counter</td><td>Data Type</td><td>Display Name</td><td>Internal Name</td> <td>Is Custom</td><td>Is Required</td><td>Is Writable</td><td>Length</td></tr>';
foreach ($fields as $key =>$fieldDefinitionArray)
{
foreach ($fieldDefinitionArray as $key =>$fieldDefinition)
{
echo '<tr>';
	echo '<td>'.$key.'</td>';
	echo '<td>'.$fieldDefinition->DataType.'</td>';
	echo '<td>'.$fieldDefinition->DisplayName.'</td>';
	echo '<td>'.$fieldDefinition->InternalName.'</td>';
	echo '<td>'.$fieldDefinition->IsCustom.'</td>';
	echo '<td>'.$fieldDefinition->IsRequired.'</td>';
	echo '<td>'.$fieldDefinition->IsWriteable.'</td>';
	echo '<td>'.$fieldDefinition->Length.'</td>';
	
echo '</tr>';	
}
}
echo '</table>';
echo '<br>';
}
}
catch (Exception $e)
{
$errorResponse = 'Something went wrong...'.$e->getMessage();
print $errorResponse;
}




?>