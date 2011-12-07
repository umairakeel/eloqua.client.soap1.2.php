<?php
# Sample Client
include ('../EloquaSOAPClient.php');
echo '<link rel="stylesheet" href="../bootstrap.css" type="text/css">';
echo '<link rel="stylesheet" href="../style.css" type="text/css">';
echo '<div class="container">';
echo  '<div align="Center">
<table class="bordered-table">
<tr>

<td><h3>Service Name : </h3></td> <td><h3> Query  </h3></td>
</tr>
<tr>
<td><h3>Service Description : </h3></td><td><h3>Sample Query a contact using Query Service Call.<h3></td>
</tr>

<tr>
<td><h3>PHP Client Code Snippet : <h3></td><td> 

<b><br>$client = new EloquaSoapClient($wsdl, $userName, $password,$endPointURL); </br>
<br>$entityType = new EntityType(0, \'Contact\', \'Base\');</br>
<br>$param = new Query($entityType,\'C_EmailAddress=\'.$client_email_Address,null,1,10);</br>
<br>$response = $client->Query($param);</br>
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
	if(isSet($_GET['email']))
	{
	chdir('../');
	$wsdl = getcwd().'/wsdl/EloquaServiceV1.2.wsdl';
	# Fetching Client Credentials from Request
 	$userName= $_SESSION['userName'];
	$password = $_SESSION['password'];
	$endPointURL = $_SESSION['endPointURL'];
	# Instantiate a new instance of the Soap client
	$client = new EloquaSoapClient($wsdl, $userName, $password,$endPointURL);
	
	# Instantiate Query Object	
	$client_email_Address = $_GET["email"];	
	echo '<table border = 1>';
	echo '<tr><td>ID</td><td>Entity </td><td>Entity Type</td><td>Query Criteria</td><td>Query Value</td></tr>';
	echo '<tr> <td>0</td><td>Contact</td><td>Base</td><td>C_EmailAddress</td><td>'.$client_email_Address.'</td></tr>';
	echo '</table>';
	$entityType = new EntityType(0, 'Contact', 'Base');
	$param = new Query($entityType,'C_EmailAddress='.$client_email_Address,null,1,10);
	# Invoke SOAP Request : Query ()
	$response = $client->Query($param);
	$queryResult = $response->QueryResult;
	if (is_array($queryResult->Entities)) 
	{              
	 // 2+ results              
	 echo '<table class="bordered-table">';
	 echo '<tr>';
	 foreach ($queryResult->DynamicEntity as $key => $dynamicEntity) 
	 {
		echo '<tableclass="bordered-table"">';
	    $dynamicEntityFieldValueCollection = $dynamicEntity->FieldValueCollection;
		echo '<table class="bordered-table">';
		echo '<tr><td>Internal Name</td><td>Value</td></tr>';
			foreach($dynamicEntityFieldValueCollection as $key => $entityFields)
			{
				foreach($entityFields as $key => $entityField)
				{
				echo '<tr>';
				echo '<td>'.$entityField->InternalName.'</td>';
				echo '<td>'.$entityField->Value.'</td>';
				echo '</tr>';
				}
				echo '</table>';
			}
		echo '</tr>';
		echo '</table>';
	 }          
	 } 
	 elseif ($queryResult->Entities instanceof stdClass ) 
	 {   
		if(isset($queryResult->Entities->DynamicEntity))
		{
	    // 1 result
		$dynamicEntity = $queryResult->Entities->DynamicEntity;
		echo '<table border="1">';
	    $dynamicEntityFieldValueCollection = $dynamicEntity->FieldValueCollection;
		echo '<table class="bordered-table">';
		echo '<tr><td>Internal Name</td><td>Value</td></tr>';
			foreach($dynamicEntityFieldValueCollection as $key => $entityFields)
			{
				foreach($entityFields as $key => $entityField)
				{
				echo '<tr>';
				echo '<td>'.$entityField->InternalName.'</td>';
				echo '<td>'.$entityField->Value.'</td>';
				echo '</tr>';
				}
				echo '</table>';
			}
		echo '</tr>';
		echo '</table>';
		}
		else 
		{
		echo '<br>';
		echo 'No Result was found based on Query Criteria';         
		} 
		
	 }
	echo '<form action="QueryEntityClient.php" method="GET"><div><button class="btn success"  type="submit">Back</button></div></form>';	 
	}
	else
	{	
	echo '<form action="QueryEntityClient.php">';
	echo '<table class="bordered-table">';
	echo '<tr><td>Email Address : </td>
		  <td><input type ="Text" name="email"></input></td>
		  </tr>
	      </table>
	      <div><button class="btn warning"  type="submit" value="e">Query</button></div>
		  </form>';
	echo '<form action="../index.php" method="GET"><div><button class="btn success"  type="submit">Back</button></div></form>';
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