Overview
========

The Eloqua PHP Client is written to enable invoking SOAP Services call using PHP for all the methods enumerated in the Eloqua API 1.2 
which provides functionality for managing assets, entities, activities, group memberships as well as basic email sending.
 
The client consist of a wrapper is created on top of Native PHP SOAP Client that can be invoked on any PHP 5.x environment. 

The client also consist of a list of samples which include example for most Eloqua API service calls. 

Pre-requisites
--------------
- PHP 5.x installed.
- PHP Soap Extension must be enabled
- Must have an account on GitHub.com in order to get the project.
- Have Git installed and configured if you want to access the reposiroty using Git.(Optional)
  

Installation
------------
- Once downloaded place the project folder "eloqua.client.soap1.2.php" in the working directory of your php installation. For example, if you are using WAMP installed your working directory might look be '<DRIVE_NAME>:\wamp\www'

- Once copied, you can run the sample clients packaged with the PHP Client by accessing http://localhost:<port>/eloqua.client.soap1.2.php/

Sample Clients
--------------
- Enter the Connection Details and press the connect button to connect to Eloqua Service

- Invoke the Entity, Asset Services etc by clicking the buttons as shown below to make sure you can make service calls to Eloqua Web Service.

    - List of Servies with Sample Clients:
      - ListEntityTypes
      - DescribeEntityType
      - DescribeEntity
      - CreateEntity
      - QueryEntity
      - ListAssetTypes
      - DescribeAssetType
      - DescribeAsset
      - CreateAsset
      - RetreiveAsset
      - UpdateAsset
      - ListActivityTypes
      - DescribeActivityType
      - DescribeActivity
      - ListGroupMembership
      - AddGroupMembership
      - RemoveGroupMembership


Tutorial : Using Eloqua PHP Client to Create a new Contact
----------------------------------------------------------
This tutorial will walk through step by step approach for using Eloqua PHP Client to invoke SOAP Calls to Eloqua Service using PHP. 
The tutrial is written on an assumption that Developer have basic php development experience , have installed PHP with php soap extension enabled along with 
Eloqua PHP Service Client downloaded. 

Steps
-----
- Create a new folder Tutorial Folder
- Copy EloquaBObj.php & EloquaSOAPClient.php from eloqua.client.soap1.2.php folder into Tutorial Folder
- Copy the wsdl folder from eloqua.client.soap1.2.php folder into Tutorial FOlder
- Create a new php file CreateContact.php in Tutorial Folder
-  Include EloquaServiceClient in your new php file

        include (EloquaSOAPClient.php);

- Setup Client credentials to connect to Eloqua

			$userName= '#####'; // CompanyName/userName
			$password = '*****'; //password
			$endPointURL = 'https://secure.eloqua.com/API/1.2/Service.svc?wsdl';
			
- Instantiate a new instance of the Soap client
			$client = new EloquaSoapClient($wsdl, $userName, $password,$endPointURL);
			
			
- Set the entity types as contact

			$entityType = new EntityType(0, 'Contact', 'Base');
	
- Set Entity Fields (You can set values for all the fields using the same format
 
			$dynamicEntityFields = new DynamicEntityFields();
			$dynamicEntityFields->setDynamicEntityField('C_EmailAddress','test@titurial.com');
			$dynamicEntityFields->setDynamicEntityField('C_FirstName','Joe');
			$dynamicEntityFields->setDynamicEntityField('C_LastName','Tutorial');
			$dynamicEntityFields = new DynamicEntityFields($entityFields);
	
- Create a new Dynamic Entity Object
			
			$entity = new DynamicEntity($entityType,$dynamicEntityFields,null);
	
- Create a new Create Request Object. (The Request object can be used to create an array of Dynamic entities, however we are only creating a single Contact in this tutorial so setting the value of the request parameter.)		

			$param = new Create(array($entity));

- Invoke SOAP Request : Create ()

			$response = $client->Create($param);

- Fetch the response along with the ID of the created contact entity.

			$createResultID = $response->CreateResult->CreateResult->ID;


Code Sample
-----------

`<?php`
		
        include ('../EloquaSOAPClient.php');		
		try
		{
			$wsdl = getcwd().'/wsdl/EloquaServiceV1.2.wsdl';
			$userName= '#####'; // CompanyName/userName
			$password = '*****'; //password
			$endPointURL = 'https://secure.eloqua.com/API/1.2/Service.svc?wsdl';

			# Instantiate a new instance of the Soap client
			$client = new EloquaSoapClient($wsdl, $userName, $password,$endPointURL);
			
			#Create Request Object for Creating Entity
			
			$entityType = new EntityType(0, 'Contact', 'Base');	
			$dynamicEntityFields = new DynamicEntityFields();
			$dynamicEntityFields->setDynamicEntityField('C_EmailAddress','test@test.com');
			
			$entity = new DynamicEntity($entityType,$dynamicEntityFields,null);
			$param = new Create(array($entity));

			# Invoke SOAP Request : Create ()
			$response = $client->Create($param);
			$createResultID = $response->CreateResult->CreateResult->ID;
			# Print the response
			if($createResultID > -1)
			{
			echo 'Contact Created SUccessfully with ID : '.$createResultID);
			}
			else
			{
			echo 'Error occurred while creating a contact :'.$response->CreateResult->CreateResult->Errors->Error->Message;
			}
		}
		catch(Exception e)
		{
		echo 'Exception Occurred : '.$e->getMessage();
		}

`?>`
  [GitHub.com]: https://github.com/Eloqua/eloqua.client.soap1.2.php
