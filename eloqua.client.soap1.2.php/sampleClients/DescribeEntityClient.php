<?php
# Sample Client
include ('../EloquaSOAPClient.php');
echo 	'<link rel="stylesheet" href="../bootstrap.css" type="text/css">';
echo 	'<link rel="stylesheet" href="../style.css" type="text/css">';
echo  	'<div align="Center">
		<table class="bordered-table">
		<tr>
		<td><h3>Service Name : </h3></td> <td><h3> DescribeEntity </h3></td>
		</tr>
		<tr>
		<td><h3>Service Description : </h3></td><td></td>
		</tr>
		<tr>
		<td><h3>PHP Client Code Snippet : <h3></td><td> 
		<b><br>$client = new EloquaSoapClient($wsdl, $userName, $password,$endPointURL); </br>
		<br>	$param = new DescribeEntity (new EntityType(0,'.$_GET["entity"].','.$_GET["entityType"].'));
		<br>$describeEntityTypeResponse = $client->DescribeEntityType($param);</br>
		</b>
		</td>
		</tr>
		</table>
		</div>';
session_start(); 
if(isSet($_SESSION['userName']) && isset($_SESSION['password']) && isset($_SESSION['endPointURL']))
{
	try
	{
	chdir('../');
	$wsdl = getcwd().'/wsdl/EloquaServiceV1.2.wsdl';
	# Client Credentials
	$userName= $_SESSION['userName'];
	$password = $_SESSION['password'];
	$endPointURL = $_SESSION['endPointURL'];
	
	# Instantiate a new instance of the Soap client
	$client = new EloquaSoapClient($wsdl, $userName, $password,$endPointURL);
	$entityType = $_GET["entityType"];
	$entity = $_GET["entity"];
	echo '<ul class="breadcrumb"> <li><a href="ListEntityTypesClient.php">List Entity Types</a> <span class="divider">/</span></li><li><li><a href="DescribeEntityTypeClient.php?type='.$entityType.'">'.$entityType.'</a></li> <span class="divider">/</span><li class="active">'.$entity.'</li>';
	echo '<br>';
	echo '<br>';
	$param = new DescribeEntity (new EntityType(0, $entity, $entityType));
	# Invoke SOAP Request : DescribeEntity()
	$describeEntityResponse = $client->DescribeEntity($param);
	#Print the Response
	echo '<br>';
	if($describeEntityResponse !=null)
	{
	$describeEntityResult = $describeEntityResponse->DescribeEntityResult;
	$fields = $describeEntityResult->Fields;
	echo '<table class="bordered-table">';
	echo '<tr><td>Counter</td><td>Data Type</td><td>Display Name</td><td>Internal Name</td> <td>Is Custom</td><td>Is Required</td><td>Is Writable</td><td>Length</td></tr>';
		foreach ($fields as $key =>$fieldDefinitionArray)
		{
			foreach ($fieldDefinitionArray as $key =>$fieldDefinition)
			{
			echo '<tr>';
			echo '<td>'.($key+1).'</td>';
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
	echo '<br>';
	echo '<br>';
	echo '<form action="../index.php" method="GET"><div><button class="btn success"  type="submit" value="e">Back</button></div></form>';
	echo '</div>';
	echo '</div>';
	}
}
catch (Exception $e)
{
	echo '<table><tr><td>Error Occured</td><td>Error Message : '.$e->getMessage().'</td></tr></table>';
	echo '<form action="../index.php" method="GET"><div><button class="btn danger"  type="submit" value="Go to Example Page">Back</button></div></form>';
}
}
else
{
	echo '<h2>Login Credentials not available. Please Press the Back Button to set login Credentials.<h2>'; 
	echo '<form action="../index.php" method="GET"><div><button class="btn danger"  type="submit" value="Go to Example Page">Back</button></div></form>';
}			
?>