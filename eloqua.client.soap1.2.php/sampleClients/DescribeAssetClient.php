<?php
# Sample Client
include ('../EloquaSOAPClient.php');
echo '<link rel="stylesheet" href="../bootstrap.css" type="text/css">';
echo '<link rel="stylesheet" href="../style.css" type="text/css">';
echo '	<div align="Center">
		<table class="bordered-table">
		<tr>
		<td><h3>Service Name : </h3></td> <td><h3> DescribeAsset </h3></td>
		</tr>
		<tr>
		<td><h3>Service Description : </h3></td><td></td>
		</tr>
		<tr>
		<td><h3>PHP Client Code Snippet : <h3></td><td> 
		<b><br>$client = new EloquaSoapClient($wsdl, $userName, $password,$endPointURL); </br>
		<br>	$param = new DescribeAsset (new EntityType(0,'.$_GET["asset"].','.$_GET["assetType"].'));
		<br>$describeAssetTypeResponse = $client->DescribeAssetType($param);</br>
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
			$assetType = $_GET["assetType"];
			$asset = $_GET["asset"];
			echo '<ul class="breadcrumb"> <li><a href="ListAssetTypesClient.php">List Asset Types</a> <span class="divider">/</span></li><li><li><a href="DescribeAssetTypeClient.php?type='.$assetType.'">'.$assetType.'</a></li> <span class="divider">/</span><li class="active">'.$asset.'</li>';
			echo '<br>';
			echo '<br>';
			$param = new DescribeAsset (new AssetType(0, $asset, $assetType));
			
			# Invoke SOAP Request : DescribeEntity()
			$describeAssetResponse = $client->DescribeAsset($param);
			#Print the Response
			echo '<br>';
			if($describeAssetResponse !=null)
				{
				$describeAssetResult = $describeAssetResponse->DescribeAssetResult;
				$fields = $describeAssetResult->Fields;
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