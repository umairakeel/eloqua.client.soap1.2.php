<?php
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
		    <td><h3>Service Description : </h3></td><td><h3>Sample is create a new Asset using the CreateAsset Service Call.<h3></td>
		    </tr>
		    <tr>
		    <td><h3>PHP Client Code Snippet : <h3></td><td> 
			<b><br>$client = new EloquaSoapClient($wsdl, $userName, $password,$endPointURL); </br>
			<br>$assetType = new AssetType(0, \'ContactList\', \'ContactGroup\');</br>
			<br>$assetFields = new AssetFields(\'name\',$assetName);</br>
			<br>$dynamicAssetFields = new DynamicAssetFields($entityFields);</br>
			<br>$asset = new DynamicAsset($AssetType,$dynamicAssetFields,null);</br>
			<br>$param = new CreateAsset(array($asset));</br></b>
			</td>
			</tr>
			</table>
			</div>';
	session_start();
	if(isSet($_SESSION['userName']) && isset($_SESSION['password']) && isset($_SESSION['endPointURL']))
	{
		if(isSet($_GET['assetType']) &&  isSet($_GET['assetTypeName']) && isSet($_GET['assetName']))
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
				$assetName = $_GET["assetName"];
				$assetTypeName = $_GET['assetTypeName'];
				$assetType = $_GET['assetType'];
				$assetType = new AssetType(0, $assetTypeName, $assetType);
				$assetFields = new AssetFields('name',$assetName);
				$dynamicAssetFields = new DynamicAssetFields($assetFields);
				$asset = new DynamicAsset($assetType,$dynamicAssetFields,'');
				$param = new CreateAsset(array($asset));

				# Invoke SOAP Request : CreateAsset ()
				$response = $client->CreateAsset($param);
				$createResultID = $response->CreateAssetResult->CreateAssetResult->ID;

				if($createResultID > -1)
				{
					echo '<table border = 1>';
					echo '<tr><td>Asset Created Successfully : </td><td>'.$createResultID.'</td></tr>';
					echo '</table>';
					echo '<br>';
					echo '<form action="CreateAssetClient.php" method="GET"><div><button class="btn success"  type="submit" value="e">Back</button></div></form>';
					echo '<br>';
				}
				else
				{
					echo '<table border = 1>';
					echo '<tr><td>Error Occured while Creating account : </td><td>'. $response->CreateAssetResult->CreateAssetResult->Errors->Error->Message.'</td></tr>';
					echo '</table>';
					echo '<br>';
					echo '<br>';
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
		echo 	'<form action="CreateAssetClient.php">';
		echo 	'<table class="bordered-table">';
		echo 	'<tr><td>Asset Type :</td>
				<td><input type ="Text" name="assetType"></input> e.g. ContactGroup</td></tr>
				<tr><td>Asset Type Name : </td><td> <input type ="Text" name="assetTypeName"></input>e.g. ContactList</td></tr>
				<tr><td>Asset Name : </td><td> <input type ="Text" name="assetName"></input></td></tr>
				</tr></table> 
				<div><button class="btn warning"  type="submit" value="e">Create</button></div>
				</form>';
		echo 	'<form action="../index.php" method="GET"><div><button class="btn success"  type="submit">Back</button></div></form>';
		}	
	}	
	else
	{
	echo 'Login Credentials not available. Please Press the Back Button to set login Credentials.'; 
	}
?>