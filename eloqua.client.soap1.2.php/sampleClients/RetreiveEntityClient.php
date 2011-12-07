<?php
# Sample Client
include ('../EloquaSOAPClient.php');
	echo '<link rel="stylesheet" href="../bootstrap.css" type="text/css">';
	echo '<link rel="stylesheet" href="../style.css" type="text/css">';
	echo '<div class="container">';
	echo  ' <div align="Center">
		    <table class="bordered-table">
		    <tr>
		    <td><h3>Service Name : </h3></td> <td><h3> CreateAsset </h3></td>
		    </tr>
		    <tr>
		    <td><h3>Service Description : </h3></td><td><h3>Sample is fetching an entity using the RetreiveEntity Service Call.<h3></td>
		    </tr>
		    <tr>
		    <td><h3>PHP Client Code Snippet : <h3></td><td> 
			<b><br>$client = new EloquaSoapClient($wsdl, $userName, $password,$endPointURL); </br>
			<br>$entityType = new EntityType(0, \'Base\', \'Contact\');</br>
			<br>$param = new Retreive($entityType,array($id));</br></b>
			<br>$param = new Retreive($entityType,array($id));</br></b>
			</td>
			</tr>
			</table>
			</div>';

session_start();
if(isSet($_SESSION['userName']) && isset($_SESSION['password']) && isset($_SESSION['endPointURL']))
{
if(isSet($_GET['entityType']) &&  isSet($_GET['entityTypeName']) && isSet($_GET['id']))
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
	
				#Create Request Object for Retreive Entity
				$entityTypeName = $_GET['entityTypeName'];
				$entityType = $_GET['entityType'];
				$entityType = new EntityType(0, $entityTypeName, $entityType);
				$id = $_GET["id"];
				$param = new Retrieve($entityType,array($id),array());

				# Invoke SOAP Request : Create ()
				$response = $client->Retrieve($param);
				$retreiveResult = $response->RetrieveResult;
				# Print the response
				if (is_array($retreiveResult->DynamicEntity)) 
				{              
				 // 2+ results              
				 echo '<table class="bordered-table">';
				 foreach ($retreiveResult->DynamicEntity as $key => $dynamicEntity) 
				 {
					echo '<tr><td>Asset Fetched with ID </td><td>'.$dynamicEntity->Id.'</td></tr>';			
					echo '</tr>';
				 }
					echo '</table>';
					echo '<br>';
					echo '<form action="../index.php" method="GET"><div><button class="btn danger"  type="submit" value="Go to Example Page">Back</button></div></form>';
				 } 
				 elseif ($retreiveResult->DynamicEntity instanceof DynamicEntity ) 
				 {   
					// 1 result
					$dynamicEntity = $retreiveResult->DynamicEntity;
					echo '<table class="bordered-table">';
					echo '<tr><td>Asset Fetched with ID </td><td>'.$dynamicEntity->Id.'</td></tr>';			
					echo '</tr>';
					echo '</table>';
					echo '<br>';
					echo '<form action="../index.php" method="GET"><div><button class="btn danger"  type="submit" value="Go to Example Page">Back</button></div></form>';
				 }
				else 
				{
					echo '<br>';
					echo 'No Result was found based on Retreive Criteria';
					echo '<form action="../index.php" method="GET"><div><button class="btn danger"  type="submit" value="Go to Example Page">Back</button></div></form>';		
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
		echo 	'<form action="RetreiveEntityClient.php">';
		echo 	'<table class="bordered-table">';
		echo 	'<tr><td>Entity Type :</td>
				<td><input type ="Text" name="entityType"></input> e.g. Base</td></tr>
				<tr><td>Entity Type Name : </td><td> <input type ="Text" name="entityTypeName"></input>e.g. Contact</td></tr>
				<tr><td>Entity ID : </td><td> <input type ="Text" name="id"></input></td></tr>
				</tr></table> 
				<div><button class="btn warning"  type="submit" value="e">Retreive</button></div>
				</form>';
		echo 	'<form action="../index.php" method="GET"><div><button class="btn success"  type="submit">Back</button></div></form>';
		}
	}
	else
	{
	echo '<h2>Login Credentials not available. Please Press the Back Button to set login Credentials.<h2>'; 
	echo '<form action="../index.php" method="GET"><div><button class="btn danger"  type="submit" value="Go to Example Page">Back</button></div></form>';
	}

?>