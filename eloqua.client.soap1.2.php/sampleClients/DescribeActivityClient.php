<?php
# Sample Client
include ('../EloquaSOAPClient.php');
		echo '<link rel="stylesheet" href="../bootstrap.css" type="text/css">';
		echo '<link rel="stylesheet" href="../style.css" type="text/css">';
		echo '<div class="container">';
		echo  '<div align="Center">
		<table class="bordered-table">
		<tr>		
		<td><h3>Service Name : </h3></td> <td><h3> DescribeActivity </h3></td>
		</tr>
		<tr>
		<td><h3>Service Description : </h3></td><td></td>
		</tr>
		<tr>
		<td><h3>PHP Client Code Snippet : <h3></td><td> 
		<b><br>$client = new EloquaSoapClient($wsdl, $userName, $password,$endPointURL); </br>
		<br>$param = new DescribeActivity (new ActivityType(0,activity,activityType));
		<br>$describeActivityTypeResponse = $client->DescribeActivityType($param);</br>
		</b>
		</td>
		</tr>
		</table>
		</div>';

	session_start(); 
	if(isSet($_SESSION['userName']) && isset($_SESSION['password']) && isset($_SESSION['endPointURL']))
	{
	if(isSet($_GET['activityType']) && isSet($_GET['activity']))
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
		
		$activityType = $_GET["activityType"];
		$activity = $_GET["activity"];
		echo '<ul class="breadcrumb"> <li><a href="ListActivityTypesClient.php">List Activity Types</a> <span class="divider">/</span></li><li><li><a href="DescribeActivityTypeClient.php?type='.$activityType.'">'.$activityType.'</a></li> <span class="divider">/</span><li class="active">'.$activity.'</li>';
		echo '<br>';
		echo '<br>';
		$param = new DescribeActivity (new EloquaActivityType(0, $activity, $activity));
		
		# Invoke SOAP Request : DescribeEntity()
		$describeActivityResponse = $client->DescribeActivity($param);
		
		#Print the Response
		echo '<br>';
		if($describeActivityResponse !=null)
			{
			$describeActivityResult = $describeActivityResponse->DescribeActivityResult;
			$fields = $describeActivityResult->Fields;
			echo '<table class="bordered-table">';
			echo '<tr><td>Counter</td><td>Data Type</td><td>Display Name</td><td>Internal Name</td><td>Is Required</td><td>Is Writable</td><td>Length</td></tr>';
			foreach ($fields as $key =>$fieldDefinition)
			{
				if(is_array($fieldDefinition))
				{
					foreach ($fieldDefinition as $key => $fieldDefinitionVal)
					{
						echo '<tr>';
						echo '<td>'.$key.'</td>';
						echo '<td>'.$fieldDefinitionVal->DataType.'</td>';
						echo '<td>'.$fieldDefinitionVal->DisplayName.'</td>';
						echo '<td>'.$fieldDefinitionVal->InternalName.'</td>';
						echo '<td>'.$fieldDefinitionVal->IsRequired.'</td>';
						echo '<td>'.$fieldDefinitionVal->IsWriteable.'</td>';
						echo '<td>'.$fieldDefinitionVal->Length.'</td>';
						echo '</tr>';	
					}
				}
				else
				{
						echo '<tr>';
						echo '<td>'.$key.'</td>';
						echo '<td>'.$fieldDefinition->DataType.'</td>';
						echo '<td>'.$fieldDefinition->DisplayName.'</td>';
						echo '<td>'.$fieldDefinition->InternalName.'</td>';
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
				echo '<form action="DescribeActivityClient.php">';
				echo '<table class="bordered-table">';
				echo '<tr><td>Type : </td>
				<td><input type ="Text" name="activityType"></input>e.g. Web</td></tr>
				<tr><td>Asset Name : </td>
				<td><input type ="Text" name="activity"></input>e.g. WebVisit</td>
				</tr>
				</table>
				<div><button class="btn warning"  type="submit" value="e">Describe</button></div>
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
	
?>