<?php
# Sample Client
include ('../EloquaSOAPClient.php');
echo '<link rel="stylesheet" href="../bootstrap.css" type="text/css">';
	echo '<link rel="stylesheet" href="../style.css" type="text/css">';
	echo '<div class="container">';
	echo  ' <div align="Center">
		    <table class="bordered-table">
		    <tr>
		    <td><h3>Service Name : </h3></td> <td><h3> RetreiveAsset </h3></td>
		    </tr>
		    <tr>
		    <td><h3>Service Description : </h3></td><td><h3>Sample is retreive an Asset using the RetreiveAsset Service Call.<h3></td>
		    </tr>
		    <tr>
		    <td><h3>PHP Client Code Snippet : <h3></td><td> 
			<b><br>$client = new EloquaSoapClient($wsdl, $userName, $password,$endPointURL); </br>
			<br>$assetType = new AssetType(0, \'ContactList\', \'ContactGroup\');</br>
			<br>$asset = new DynamicAsset($AssetType,$dynamicAssetFields,id);</br>
			<br>$param = new RetreiveAsset(array($asset));</br></b>
			<br>$response = $client->RetrieveAsset($param);</br></b>
			</td>
			</tr>
			</table>
			</div>';

session_start();
if(isSet($_SESSION['userName']) && isset($_SESSION['password']) && isset($_SESSION['endPointURL']))
{
if(isSet($_GET['assetType']) &&  isSet($_GET['assetTypeName']) && isSet($_GET['id']))
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
				$assetTypeName = $_GET['assetTypeName'];
				$assetType = $_GET['assetType'];
				$assetType = new AssetType(0, $assetTypeName, $assetType);
				$id = $_GET["id"];
				$param = new RetrieveAsset($assetType,array($id),array());

				# Invoke SOAP Request : Create ()
				$response = $client->RetrieveAsset($param);
				$retreiveResult = $response->RetrieveAssetResult;
				# Print the response
				if (is_array($retreiveResult->DynamicAsset)) 
				{              
				 // 2+ results              
				 echo '<table class="bordered-table">';
				 foreach ($retreiveResult->DynamicAsset as $key => $dynamicAsset) 
				 {
					echo '<tr><td>Asset Fetched with ID </td><td>'.$dynamicAsset->Id.'</td></tr>';			
					echo '</tr>';
				 }
					echo '</table>';
					echo '<br>';
					echo '<form action="../index.php" method="GET"><div><button class="btn danger"  type="submit" value="Go to Example Page">Back</button></div></form>';
				 } 
				 elseif ($retreiveResult->DynamicAsset instanceof DynamicAsset ) 
				 {   
					// 1 result
					$dynamicAsset = $retreiveResult->DynamicAsset;
					echo '<table class="bordered-table">';
					echo '<tr><td>Asset Fetched with ID </td><td>'.$dynamicAsset->Id.'</td></tr>';			
					echo '</tr>';
					echo '</table>';
					echo '<br>';
					echo '<form action="../index.php" method="GET"><div><button class="btn danger"  type="submit" value="Go to Example Page">Back</button></div></form>';
				 }
				else 
				{
					echo '<br>';
					echo 'No Result was found based on Retreive Criteria';         
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
		echo 	'<form action="RetreiveAssetClient.php">';
		echo 	'<table class="bordered-table">';
		echo 	'<tr><td>Asset Type :</td>
				<td><input type ="Text" name="assetType"></input> e.g. ContactGroup</td></tr>
				<tr><td>Asset Type Name : </td><td> <input type ="Text" name="assetTypeName"></input>e.g. ContactList</td></tr>
				<tr><td>Asset ID : </td><td> <input type ="Text" name="id"></input></td></tr>
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