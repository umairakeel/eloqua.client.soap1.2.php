<?php
# Sample Client
include ('../EloquaSOAPClient.php');

echo  '		<link rel="stylesheet" href="../bootstrap.css" type="text/css">';
echo  '		<link rel="stylesheet" href="../style.css" type="text/css">';
echo  '		<div align="Center">
			<table class="bordered-table">
			<tr>
			<td><h3>Service Name : </h3></td> <td><h3> CreateEntity </h3></td>
			</tr>
			<tr>
			<td><h3>Service Description : </h3></td><td><h3>Sample is create a new Contact using the CreateEntity Service Call.<h3></td>
			</tr>
			<tr>
			<td><h3>PHP Client Code Snippet : <h3></td><td> 
			<b><br>$client = new EloquaSoapClient($wsdl, $userName, $password,$endPointURL); </br>
			<br>$entityType = new EntityType(0, \'Contact\', \'Base\');</br>
			<br>$dynamicEntityFields = new DynamicEntityFields();</br>
			<br>$dynamicEntityFields->setDynamicEntityField(\'C_EmailAddress\',$client_email_Address);</br>
			<br>$entity = new DynamicEntity($entityType,$dynamicEntityFields,null);</br>
			<br>$param = new Create(array($entity));</br></b>
			</td>
			</tr>
			</table>
			</div>';
echo  '		<div class="container">';

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
			
			#Create Request Object for Creating Entity
			$client_email_Address = $_GET["email"];
			$entityType = new EntityType(0, 'Contact', 'Base');	
			$dynamicEntityFields = new DynamicEntityFields();
			$dynamicEntityFields->setDynamicEntityField('C_EmailAddress',$client_email_Address);
			if(isSet($_GET['properties']))
			{
				eval($_GET['properties']);
			}
			$entity = new DynamicEntity($entityType,$dynamicEntityFields,null);
			$param = new Create(array($entity));

			# Invoke SOAP Request : Create ()
			$response = $client->Create($param);
			$createResultID = $response->CreateResult->CreateResult->ID;
			# Print the response
			if($createResultID > -1)
			{
				echo '<table class="bordered-table">';
				echo '<tr>
				<td>Contact Created Successfully : </td>
				<td>'.$createResultID.'</td>
				</tr>';
				echo '</table>';
				echo '<br>';
				echo '<br>';
				echo '<form action="CreateEntityClient.php" method="GET"><div><button class="btn success"  type="submit" value="e">Back</button></div></form>';
			}
			else
			{
				echo '<table class="bordered-table">';
				echo '<tr><td>Error Occured while Creating account : </td><td>'. $response->CreateResult->CreateResult->Errors->Error->Message.'</td></tr>';
				echo '</table>';
				echo '<br>';
				echo '<br>';
				echo '<form action="CreateEntityClient.php" method="GET"><div><button class="btn success"  type="submit" value="e">Back</button></div></form>';
				echo '</div>';
				echo '</div>';
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
				echo '<form action="CreateEntityClient.php">';
				echo '<table class="bordered-table">';
				echo '<tr><td>Email Address : </td>
				<td><input type ="Text" name="email"></input></td>
				</tr>
				<tr>
				<td>Additional Properties
				</td>
				<td>
				<textarea class="xxlarge" id="properties" name="properties" rows="3"></textarea>
				$dynamicEntityFields->setDynamicEntityField(\'C_FirstName\',\'Test\');
				</td>
				</tr>
				</table>
				<div><button class="btn warning"  type="submit" value="e">Create</button></div>
				</form>';
				echo '<br>';
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