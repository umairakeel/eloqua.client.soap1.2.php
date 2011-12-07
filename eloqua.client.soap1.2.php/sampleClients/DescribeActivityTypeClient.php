<?php
# Sample Client
include ('../EloquaSOAPClient.php');
		echo '<link rel="stylesheet" href="../bootstrap.css" type="text/css">';
		echo '<link rel="stylesheet" href="../style.css" type="text/css">';
		echo '<div class="container">';
		echo  '<div align="Center">
		<table class="bordered-table">
		<tr>		
		<td><h3>Service Name : </h3></td> <td><h3> DescribeActivityType </h3></td>
		</tr>
		<tr>
		<td><h3>Service Description : </h3></td><td></td>
		</tr>
		<tr>
		<td><h3>PHP Client Code Snippet : <h3></td><td> 
		<b><br>$client = new EloquaSoapClient($wsdl, $userName, $password,$endPointURL); </br>
		<br>$param = new DescribeActivityType('. $_GET["type"].'); 
		<br>$describeActivityTypeResponse = $client->DescribeActivityType($param);</br>
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
				# Fetching Client Credentials from Request
				$userName= $_SESSION['userName'];
				$password = $_SESSION['password'];
				$endPointURL = $_SESSION['endPointURL'];
				
				# Instantiate a new instance of the Soap client
				$client = new EloquaSoapClient($wsdl, $userName, $password,$endPointURL);
				$type = $_GET["type"];
				$activityType = $type;
				$param = new DescribeActivityType($activityType);
				echo '<ul class="breadcrumb"> <li><a href="ListActivityTypesClient.php">List Activity Type</a> <span class="divider">/</span></li><li class="active">'.$type.'</li>';
				echo '<br>';
				echo '<br>';
				
				# Invoke SOAP Request : DescribeActivityType()
				$describeActivityTypeResponse = $client->DescribeActivityType($param);
				echo '<br>';
				if($describeActivityTypeResponse !=null)
				{
				$describeActivityTypesResult = $describeActivityTypeResponse->DescribeActivityTypeResult;
				$activityTypes = $describeActivityTypesResult->ActivityTypes;
				echo '<table class="bordered-table">';
				echo '<tr> <td>Counter</td><td>ID</td><td>Name</td></tr>';
					foreach ($activityTypes as $key => $activityType)
					{
						if(is_array($activityType))
						{
							foreach($activityType as $arrKey =>$arrVal)
							{
							echo '<tr>';
							echo '<td>'.($arrKey+1).'</td>';
							echo '<td>'.$arrVal->Id.'</td>';
							echo '<td><ul class="pills"><a href ="DescribeActivityClient.php?activityType='.$type.'&activity='.$arrVal->Name.'">'.$arrVal->Name.'</a></td>';
							echo '</tr>';
							}
						}
						else
						{
						echo '<tr>';
						echo '<td>'.($key+1).'</td>';
						echo '<td>'.$activityType->Id.'</td>';
						echo '<td><ul class="pills"><a href ="DescribeActivityClient.php?activityType='.$type.'&activity='.$activityType->Name.'">'.$activityType->Name.'</a></td>';
						echo '</tr>';
						}
					}
				echo '</table>';
				echo '<br>';
				echo '<br>';
				echo '<form action="ListActivityTypesClient.php" method="GET"><div><button class="btn success"  type="submit" value="e">Back</button></div></form>';
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