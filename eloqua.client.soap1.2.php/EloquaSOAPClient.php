<?php
###
# Including Business Object classes based on wsdl Definition 
###
include_once('EloquaBObj.php');


###
# Extension of SoapClient - Eloqua SOAP API
##
class EloquaSOAPClient extends SoapClient 
{

  /**
   * 
   * @var array $classmap The defined classes
   * @access private
   */
  private static $classmap = array(
    'ListEntityTypes' => 'ListEntityTypes',
    'ListEntityTypesResponse' => 'ListEntityTypesResponse',
    'ListEntityTypesResult' => 'ListEntityTypesResult',
    'UnexpectedErrorFault' => 'UnexpectedErrorFault',
    'DescribeEntityType' => 'DescribeEntityType',
    'DescribeEntityTypeResponse' => 'DescribeEntityTypeResponse',
    'DescribeEntityTypeResult' => 'DescribeEntityTypeResult',
    'EntityType' => 'EntityType',
    'InvalidTypeFault' => 'InvalidTypeFault',
    'DescribeEntity' => 'DescribeEntity',
    'DescribeEntityResponse' => 'DescribeEntityResponse',
    'DescribeEntityResult' => 'DescribeEntityResult',
    'DynamicEntityFieldDefinition' => 'DynamicEntityFieldDefinition',
    'Create' => 'Create',
    'DynamicEntity' => 'DynamicEntity',
    'DynamicEntityFields' => 'DynamicEntityFields',
    'EntityFields' => 'EntityFields',
    'CreateResponse' => 'CreateResponse',
    'CreateResult' => 'CreateResult',
    'Error' => 'Error',
    'BatchSizeExceededFault' => 'BatchSizeExceededFault',
    'Update' => 'Update',
    'UpdateResponse' => 'UpdateResponse',
    'UpdateResult' => 'UpdateResult',
    'Delete' => 'Delete',
    'DeleteResponse' => 'DeleteResponse',
    'DeleteResult' => 'DeleteResult',
    'Retrieve' => 'Retrieve',
    'RetrieveResponse' => 'RetrieveResponse',
    'Query' => 'Query',
    'QueryResponse' => 'QueryResponse',
    'DynamicEntityQueryResults' => 'DynamicEntityQueryResults',
    'QueryTooLargeFault' => 'QueryTooLargeFault',
    'InvalidQueryFault' => 'InvalidQueryFault',
    'OperationTimeIntervalFault' => 'OperationTimeIntervalFault',
    'ListAssetTypes' => 'ListAssetTypes',
    'ListAssetTypesResponse' => 'ListAssetTypesResponse',
    'ListAssetTypesResult' => 'ListAssetTypesResult',
    'DescribeAssetType' => 'DescribeAssetType',
    'DescribeAssetTypeResponse' => 'DescribeAssetTypeResponse',
    'DescribeAssetTypeResult' => 'DescribeAssetTypeResult',
    'AssetType' => 'AssetType',
    'DescribeAsset' => 'DescribeAsset',
    'DescribeAssetResponse' => 'DescribeAssetResponse',
    'DescribeAssetResult' => 'DescribeAssetResult',
    'DynamicAssetFieldDefinition' => 'DynamicAssetFieldDefinition',
    'CreateAsset' => 'CreateAsset',
    'DynamicAsset' => 'DynamicAsset',
    'DynamicAssetFields' => 'DynamicAssetFields',
    'AssetFields' => 'AssetFields',
    'CreateAssetResponse' => 'CreateAssetResponse',
    'CreateAssetResult' => 'CreateAssetResult',
    'UpdateAsset' => 'UpdateAsset',
    'UpdateAssetResponse' => 'UpdateAssetResponse',
    'UpdateAssetResult' => 'UpdateAssetResult',
    'DeleteAsset' => 'DeleteAsset',
    'DeleteAssetResponse' => 'DeleteAssetResponse',
    'DeleteAssetResult' => 'DeleteAssetResult',
    'RetrieveAsset' => 'RetrieveAsset',
    'RetrieveAssetResponse' => 'RetrieveAssetResponse',
    'ListGroupMembership' => 'ListGroupMembership',
    'ListGroupMembershipResponse' => 'ListGroupMembershipResponse',
    'InvalidEntityFault' => 'InvalidEntityFault',
    'AddGroupMember' => 'AddGroupMember',
    'AddGroupMemberResponse' => 'AddGroupMemberResponse',
    'GroupMemberResult' => 'GroupMemberResult',
    'InvalidAssetFault' => 'InvalidAssetFault',
    'RemoveGroupMember' => 'RemoveGroupMember',
    'RemoveGroupMemberResponse' => 'RemoveGroupMemberResponse',
    'ListActivityTypes' => 'ListActivityTypes',
    'ListActivityTypesResponse' => 'ListActivityTypesResponse',
    'ListActivityTypesResult' => 'ListActivityTypesResult',
    'DescribeActivityType' => 'DescribeActivityType',
    'DescribeActivityTypeResponse' => 'DescribeActivityTypeResponse',
    'DescribeActivityTypeResult' => 'DescribeActivityTypeResult',
    'EloquaActivityType' => 'EloquaActivityType',
    'DescribeActivity' => 'DescribeActivity',
    'DescribeActivityResponse' => 'DescribeActivityResponse',
    'DescribeActivityResult' => 'DescribeActivityResult',
    'DynamicActivityFieldDefinition' => 'DynamicActivityFieldDefinition',
    'GetActivities' => 'GetActivities',
    'GetActivitiesResponse' => 'GetActivitiesResponse',
    'DynamicActivity' => 'DynamicActivity',
    'DynamicActivityFields' => 'DynamicActivityFields',
    'ActivityFields' => 'ActivityFields',
    'InvalidDateRangeFault' => 'InvalidDateRangeFault',
    'GetEmailActivitiesForRecipients' => 'GetEmailActivitiesForRecipients',
    'GetEmailActivitiesForRecipientsResponse' => 'GetEmailActivitiesForRecipientsResponse',
    'InvalidArgumentFault' => 'InvalidArgumentFault',
    'SendQuickEmail' => 'SendQuickEmail',
    'QuickSendEmailOption' => 'QuickSendEmailOption',
    'SendQuickEmailResponse' => 'SendQuickEmailResponse',
    'SendEmailResult' => 'SendEmailResult',
    'RecordNotFoundFault' => 'RecordNotFoundFault',
    'GetQuickEmailStatus' => 'GetQuickEmailStatus',
    'GetQuickEmailStatusResponse' => 'GetQuickEmailStatusResponse',
    'ValidationDetail' => 'ValidationDetail',
    'ValidationFault' => 'ValidationFault');

###
# Constructor to initialize SOAP header and Load Business Objects as a ClassMap
###
 
	public function __construct($wsdl , $username, $password, $end_pointURL) 
	{

	# Create client
	$wsdl_options = array(
        'trace'            => 1,
        'exceptions'    => true,
        'encoding'        => 'utf-8',
        'cache_wsdl'     => WSDL_CACHE_NONE,
		'style' => SOAP_DOCUMENT,
		'use' => SOAP_LITERAL
    );	
	foreach(self::$classmap as $key => $value)
	{
		if(!isset($wsdl_options['classmap'][$key]))
		{
		$wsdl_options['classmap'][$key] = $value;
		}
	}

	# WSSE Security Namespace
	$wsSecurityNS = "http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd";
	# SOAP Username and Password variables
	$soapVarUser = new SoapVar($username, XSD_STRING, NULL, $wsSecurityNS, NULL, $wsSecurityNS);
	$soapVarPass = new SoapVar($password, XSD_STRING, NULL, $wsSecurityNS, NULL, $wsSecurityNS);
	# WSSE Authentication SOAP var
	$WsAuthentication = new WsAuthentication($soapVarUser, $soapVarPass);
	$soapVarWsAuthentication = new SoapVar($WsAuthentication, SOAP_ENC_OBJECT, NULL, $wsSecurityNS, 'UsernameToken', $wsSecurityNS);
	# WSSE Authentication Token
	$WsToken = new WsToken($soapVarWsAuthentication);
	# Authentication Headers
	$soapVarWsToken = new SoapVar($WsToken, SOAP_ENC_OBJECT, NULL, $wsSecurityNS, 'UsernameToken', $wsSecurityNS);
	$soapVarHeaderVal=new SoapVar($soapVarWsToken, SOAP_ENC_OBJECT, NULL, $wsSecurityNS, 'Security', $wsSecurityNS);
	$soapVarWsHeader = new SoapHeader($wsSecurityNS, 'Security', $soapVarHeaderVal, true);

	parent::__construct($wsdl,$wsdl_options);
	parent::__setSoapHeaders(array($soapVarWsHeader));
	parent::__setLocation($end_pointURL);
	ini_set("soap.wsdl_cache_enabled", "0");

	}


  /**
   * 
   * @param ListEntityTypes $parameters
   * @access public
   */
  public function ListEntityTypes(ListEntityTypes $parameters)
  {
    return $this->__soapCall('ListEntityTypes', array($parameters));
  }

  /**
   * 
   * @param DescribeEntityType $parameters
   * @access public
   */
  public function DescribeEntityType(DescribeEntityType $parameters)
  {
    return $this->__soapCall('DescribeEntityType', array($parameters));
  }

  /**
   * 
   * @param DescribeEntity $parameters
   * @access public
   */
  public function DescribeEntity(DescribeEntity $parameters)
  {
    return $this->__soapCall('DescribeEntity', array($parameters));
  }

  /**
   * 
   * @param Create $parameters
   * @access public
   */
  public function Create(Create $parameters)
  {
    return $this->__soapCall('Create', array($parameters));
  }

  /**
   * 
   * @param Update $parameters
   * @access public
   */
  public function Update(Update $parameters)
  {
	
    return $this->__soapCall('Update', array($parameters));
  }

  /**
   * 
   * @param Delete $parameters
   * @access public
   */
  public function Delete(Delete $parameters)
  {
    return $this->__soapCall('Delete', array($parameters));
  }

  /**
   * 
   * @param Retrieve $parameters
   * @access public
   */
  public function Retrieve(Retrieve $parameters)
  {
    return $this->__soapCall('Retrieve', array($parameters));
  }

  /**
   * 
   * @param Query $parameters
   * @access public
   */
  public function Query(Query $parameters)
  {
    return $this->__soapCall('Query', array($parameters));
  }

  /**
   * 
   * @param ListAssetTypes $parameters
   * @access public
   */
  public function ListAssetTypes(ListAssetTypes $parameters)
  {
    return $this->__soapCall('ListAssetTypes', array($parameters));
  }

  /**
   * 
   * @param DescribeAssetType $parameters
   * @access public
   */
  public function DescribeAssetType(DescribeAssetType $parameters)
  {
    return $this->__soapCall('DescribeAssetType', array($parameters));
  }

  /**
   * 
   * @param DescribeAsset $parameters
   * @access public
   */
  public function DescribeAsset(DescribeAsset $parameters)
  {
    return $this->__soapCall('DescribeAsset', array($parameters));
  }

  /**
   * 
   * @param CreateAsset $parameters
   * @access public
   */
  public function CreateAsset(CreateAsset $parameters)
  {
    return $this->__soapCall('CreateAsset', array($parameters));
  }

  /**
   * 
   * @param UpdateAsset $parameters
   * @access public
   */
  public function UpdateAsset(UpdateAsset $parameters)
  {
    return $this->__soapCall('UpdateAsset', array($parameters));
  }

  /**
   * 
   * @param DeleteAsset $parameters
   * @access public
   */
  public function DeleteAsset(DeleteAsset $parameters)
  {
    return $this->__soapCall('DeleteAsset', array($parameters));
  }

  /**
   * 
   * @param RetrieveAsset $parameters
   * @access public
   */
  public function RetrieveAsset(RetrieveAsset $parameters)
  {
    return $this->__soapCall('RetrieveAsset', array($parameters));
  }

  /**
   * 
   * @param ListGroupMembership $parameters
   * @access public
   */
  public function ListGroupMembership(ListGroupMembership $parameters)
  {
    return $this->__soapCall('ListGroupMembership', array($parameters));
  }

  /**
   * 
   * @param AddGroupMember $parameters
   * @access public
   */
  public function AddGroupMember(AddGroupMember $parameters)
  {
    return $this->__soapCall('AddGroupMember', array($parameters));
  }

  /**
   * 
   * @param RemoveGroupMember $parameters
   * @access public
   */
  public function RemoveGroupMember(RemoveGroupMember $parameters)
  {
    return $this->__soapCall('RemoveGroupMember', array($parameters));
  }

  /**
   * 
   * @param ListActivityTypes $parameters
   * @access public
   */
  public function ListActivityTypes(ListActivityTypes $parameters)
  {
    return $this->__soapCall('ListActivityTypes', array($parameters));
  }

  /**
   * 
   * @param DescribeActivityType $parameters
   * @access public
   */
  public function DescribeActivityType(DescribeActivityType $parameters)
  {
    return $this->__soapCall('DescribeActivityType', array($parameters));
  }

  /**
   * 
   * @param DescribeActivity $parameters
   * @access public
   */
  public function DescribeActivity(DescribeActivity $parameters)
  {
    return $this->__soapCall('DescribeActivity', array($parameters));
  }

  /**
   * 
   * @param GetActivities $parameters
   * @access public
   */
  public function GetActivities(GetActivities $parameters)
  {
    return $this->__soapCall('GetActivities', array($parameters));
  }

  /**
   * 
   * @param GetEmailActivitiesForRecipients $parameters
   * @access public
   */
  public function GetEmailActivitiesForRecipients(GetEmailActivitiesForRecipients $parameters)
  {
    return $this->__soapCall('GetEmailActivitiesForRecipients', array($parameters));
  }

  /**
   * 
   * @param SendQuickEmail $parameters
   * @access public
   */
  public function SendQuickEmail(SendQuickEmail $parameters)
  {
    return $this->__soapCall('SendQuickEmail', array($parameters));
  }

  /**
   * 
   * @param GetQuickEmailStatus $parameters
   * @access public
   */
  public function GetQuickEmailStatus(GetQuickEmailStatus $parameters)
  {
    return $this->__soapCall('GetQuickEmailStatus', array($parameters));
  }
}



### Web Service Helper classes
# Authentication helper class
##
class WsAuthentication 
{
	private $Username;
	private $Password;

	function __construct($username, $password)
	{
	$this->Username=$username;
	$this->Password=$password;
	}
}

###
# Web Service Token helper class
##
class WsToken 
{
	private $UsernameToken;

	function __construct ($innerVal)
	{
	$this->UsernameToken = $innerVal;
	}
}
?>