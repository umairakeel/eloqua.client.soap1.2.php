<?php

include ('../EloquaSOAPClient.php');
echo '<link rel="stylesheet" href="../bootstrap.css" type="text/css">';
echo '<link rel="stylesheet" href="../style.css" type="text/css">';
echo '<div class="container">';
echo '<div align="Center">
		<table class="bordered-table">
		<tr>
		<td><h3>Service Name : </h3></td> <td><h3> ListActivityTypes </h3></td>
		</tr>
		<tr>
		<td><h3>Service Description : </h3></td><td></td>
		</tr>
		<tr>
		<td><h3>PHP Client Code Snippet : <h3></td><td> 
		<b><br>$client = new EloquaSoapClient($wsdl, $userName, $password,$endPointURL); </br>
		<br>$param = new ListActivityTypes(); </br>
		<br>$listActivityTypesResponse = $client->ListActivityTypes($param);</br>
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
	 
    $userName= $_SESSION['userName'];
	$password = $_SESSION['password'];
	$endPointURL = $_SESSION['endPointURL'];
	# Instantiate a new instance of the Soap client
	$client = new EloquaSoapClient($wsdl, $userName, $password,$endPointURL);

	# Invoke SOAP Request : ListEntityTypes()
	$param = new ListActivityTypes();
	$listActivityTypesResponse = $client->ListActivityTypes($param);

	# Show the response
	if($listActivityTypesResponse != null)
	{
	$listActivityTypesResult = $listActivityTypesResponse->ListActivityTypesResult;
	$activityTypes = $listActivityTypesResult->ActivityTypes;
	echo '<table class="bordered-table">';
	echo '<tr> <td><h3>Counter</h3></td><td><h3>Type</h3></td></tr>';
	foreach( $activityTypes as $key => $activityType)
	{
		foreach ($activityType as $key => $value)
		{
		echo '<tr>';
		echo '<td>'.($key+1).'</td>';
		echo '<td><ul class="pills"><a href = "DescribeActivityTypeClient.php?type='.$value.'">'.$value.'</a></td>';
		echo '</tr>';	
		}
	}
	echo '</table>';
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