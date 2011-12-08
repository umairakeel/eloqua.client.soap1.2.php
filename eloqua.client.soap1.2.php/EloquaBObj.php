<?php

class ActivityFields
{

  /**
   * 
   * @var string $InternalName
   * @access public
   */
  public $InternalName;

  /**
   * 
   * @var string $Value
   * @access public
   */
  public $Value;

  /**
   * 
   * @param string $InternalName
   * @param string $Value
   * @access public
   */
  public function __construct($InternalName, $Value)
  {
    $this->InternalName = $InternalName;
    $this->Value = $Value;
  }

}

class AddGroupMember
{

  /**
   * 
   * @var DynamicEntity $entity
   * @access public
   */
  public $entity;

  /**
   * 
   * @var DynamicAsset $asset
   * @access public
   */
  public $asset;

  /**
   * 
   * @param DynamicEntity $entity
   * @param DynamicAsset $asset
   * @access public
   */
  public function __construct($entity, $asset)
  {
    $this->entity = $entity;
    $this->asset = $asset;
  }

}

class AddGroupMemberResponse
{

  /**
   * 
   * @var GroupMemberResult $AddGroupMemberResult
   * @access public
   */
  public $AddGroupMemberResult;

  /**
   * 
   * @param GroupMemberResult $AddGroupMemberResult
   * @access public
   */
  public function __construct($AddGroupMemberResult)
  {
    $this->AddGroupMemberResult = $AddGroupMemberResult;
  }

}

class AssetFields
{

  /**
   * 
   * @var string $InternalName
   * @access public
   */
  public $InternalName;

  /**
   * 
   * @var string $Value
   * @access public
   */
  public $Value;

  /**
   * 
   * @param string $InternalName
   * @param string $Value
   * @access public
   */
  public function __construct($InternalName, $Value)
  {
    $this->InternalName = $InternalName;
    $this->Value = $Value;
  }

}

class AssetType
{

  /**
   * 
   * @var int $ID
   * @access public
   */
  public $ID;

  /**
   * 
   * @var string $Name
   * @access public
   */
  public $Name;

  /**
   * 
   * @var string $Type
   * @access public
   */
  public $Type;

  /**
   * 
   * @param int $ID
   * @param string $Name
   * @param string $Type
   * @access public
   */
  public function __construct($ID, $Name, $Type)
  {
    $this->ID = $ID;
    $this->Name = $Name;
    $this->Type = $Type;
  }

}

class BatchSizeExceededFault
{

  /**
   * 
   * @access public
   */
  public function __construct()
  {
  
  }

}

class Create
{

  /**
   * 
   * @var array $entities
   * @access public
   */
  public $entities;

  /**
   * 
   * @param array $entities
   * @access public
   */
  public function __construct($entities)
  {
    $this->entities = $entities;
  }

}

class CreateAsset
{

  /**
   * 
   * @var array $assets
   * @access public
   */
  public $assets;

  /**
   * 
   * @param array $assets
   * @access public
   */
  public function __construct($assets)
  {
    $this->assets = $assets;
  }

}


class CreateAssetResponse
{

  /**
   * 
   * @var array $CreateAssetResult
   * @access public
   */
  public $CreateAssetResult;

  /**
   * 
   * @param array $CreateAssetResult
   * @access public
   */
  public function __construct($CreateAssetResult)
  {
    $this->CreateAssetResult = $CreateAssetResult;
  }

}

class CreateAssetResult
{

  /**
   * 
   * @var AssetType $AssetType
   * @access public
   */
  public $AssetType;

  /**
   * 
   * @var array $Errors
   * @access public
   */
  public $Errors;

  /**
   * 
   * @var int $ID
   * @access public
   */
  public $ID;

  /**
   * 
   * @param AssetType $AssetType
   * @param array $Errors
   * @param int $ID
   * @access public
   */
  public function __construct($AssetType, $Errors, $ID)
  {
    $this->AssetType = $AssetType;
    $this->Errors = $Errors;
    $this->ID = $ID;
  }

}


class CreateResponse
{

  /**
   * 
   * @var array $CreateResult
   * @access public
   */
  public $CreateResult;

  /**
   * 
   * @param array $CreateResult
   * @access public
   */
  public function __construct($CreateResult)
  {
    $this->CreateResult = $CreateResult;
  }

}

class CreateResult
{

  /**
   * 
   * @var EntityType $EntityType
   * @access public
   */
  public $EntityType;

  /**
   * 
   * @var array $Errors
   * @access public
   */
  public $Errors;

  /**
   * 
   * @var int $ID
   * @access public
   */
  public $ID;

  /**
   * 
   * @param EntityType $EntityType
   * @param array $Errors
   * @param int $ID
   * @access public
   */
  public function __construct($EntityType, $Errors, $ID)
  {
    $this->EntityType = $EntityType;
    $this->Errors = $Errors;
    $this->ID = $ID;
  }

}


class Delete
{

  /**
   * 
   * @var EntityType $entityType
   * @access public
   */
  public $entityType;

  /**
   * 
   * @var array $ids
   * @access public
   */
  public $ids;

  /**
   * 
   * @param EntityType $entityType
   * @param array $ids
   * @access public
   */
  public function __construct($entityType, $ids)
  {
    $this->entityType = $entityType;
    $this->ids = $ids;
  }

}

class DeleteAsset
{

  /**
   * 
   * @var AssetType $assetType
   * @access public
   */
  public $assetType;

  /**
   * 
   * @var array $ids
   * @access public
   */
  public $ids;

  /**
   * 
   * @param AssetType $assetType
   * @param array $ids
   * @access public
   */
  public function __construct($assetType, $ids)
  {
    $this->assetType = $assetType;
    $this->ids = $ids;
  }

}

class DeleteAssetResponse
{

  /**
   * 
   * @var array $DeleteAssetResult
   * @access public
   */
  public $DeleteAssetResult;

  /**
   * 
   * @param array $DeleteAssetResult
   * @access public
   */
  public function __construct($DeleteAssetResult)
  {
    $this->DeleteAssetResult = $DeleteAssetResult;
  }

}

class DeleteAssetResult
{

  /**
   * 
   * @var AssetType $AssetType
   * @access public
   */
  public $AssetType;

  /**
   * 
   * @var array $Errors
   * @access public
   */
  public $Errors;

  /**
   * 
   * @var int $ID
   * @access public
   */
  public $ID;

  /**
   * 
   * @var boolean $Success
   * @access public
   */
  public $Success;

  /**
   * 
   * @param AssetType $AssetType
   * @param array $Errors
   * @param int $ID
   * @param boolean $Success
   * @access public
   */
  public function __construct($AssetType, $Errors, $ID, $Success)
  {
    $this->AssetType = $AssetType;
    $this->Errors = $Errors;
    $this->ID = $ID;
    $this->Success = $Success;
  }

}

class DeleteResponse
{

  /**
   * 
   * @var array $DeleteResult
   * @access public
   */
  public $DeleteResult;

  /**
   * 
   * @param array $DeleteResult
   * @access public
   */
  public function __construct($DeleteResult)
  {
    $this->DeleteResult = $DeleteResult;
  }

}


class DeleteResult
{

  /**
   * 
   * @var EntityType $EntityType
   * @access public
   */
  public $EntityType;

  /**
   * 
   * @var array $Errors
   * @access public
   */
  public $Errors;

  /**
   * 
   * @var int $ID
   * @access public
   */
  public $ID;

  /**
   * 
   * @var boolean $Success
   * @access public
   */
  public $Success;

  /**
   * 
   * @param EntityType $EntityType
   * @param array $Errors
   * @param int $ID
   * @param boolean $Success
   * @access public
   */
  public function __construct($EntityType, $Errors, $ID, $Success)
  {
    $this->EntityType = $EntityType;
    $this->Errors = $Errors;
    $this->ID = $ID;
    $this->Success = $Success;
  }

}


class DescribeActivity
{

  /**
   * 
   * @var EloquaActivityType $ActivityType
   * @access public
   */
  public $ActivityType;

  /**
   * 
   * @param EloquaActivityType $ActivityType
   * @access public
   */
  public function __construct($ActivityType)
  {
    $this->ActivityType = $ActivityType;
  }

}


class DescribeActivityResponse
{

  /**
   * 
   * @var DescribeActivityResult $DescribeActivityResult
   * @access public
   */
  public $DescribeActivityResult;

  /**
   * 
   * @param DescribeActivityResult $DescribeActivityResult
   * @access public
   */
  public function __construct($DescribeActivityResult)
  {
    $this->DescribeActivityResult = $DescribeActivityResult;
  }

}


class DescribeActivityResult
{

  /**
   * 
   * @var array $Fields
   * @access public
   */
  public $Fields;

  /**
   * 
   * @var string $Name
   * @access public
   */
  public $Name;

  /**
   * 
   * @var EloquaAssetType $RelatedAssetType
   * @access public
   */
  public $RelatedAssetType;

  /**
   * 
   * @param array $Fields
   * @param string $Name
   * @param EloquaAssetType $RelatedAssetType
   * @access public
   */
  public function __construct($Fields, $Name, $RelatedAssetType)
  {
    $this->Fields = $Fields;
    $this->Name = $Name;
    $this->RelatedAssetType = $RelatedAssetType;
  }

}


class DescribeActivityType
{

  /**
   * 
   * @var string $activityType
   * @access public
   */
  public $activityType;

  /**
   * 
   * @param string $activityType
   * @access public
   */
  public function __construct($activityType)
  {
    $this->activityType = $activityType;
  }

}


class DescribeActivityTypeResponse
{

  /**
   * 
   * @var DescribeActivityTypeResult $DescribeActivityTypeResult
   * @access public
   */
  public $DescribeActivityTypeResult;

  /**
   * 
   * @param DescribeActivityTypeResult $DescribeActivityTypeResult
   * @access public
   */
  public function __construct($DescribeActivityTypeResult)
  {
    $this->DescribeActivityTypeResult = $DescribeActivityTypeResult;
  }

}

class DescribeActivityTypeResult
{

  /**
   * 
   * @var array $ActivityTypes
   * @access public
   */
  public $ActivityTypes;

  /**
   * 
   * @param array $ActivityTypes
   * @access public
   */
  public function __construct($ActivityTypes)
  {
    $this->ActivityTypes = $ActivityTypes;
  }

}


class DescribeAsset
{

  /**
   * 
   * @var AssetType $assetType
   * @access public
   */
  public $assetType;

  /**
   * 
   * @param AssetType $assetType
   * @access public
   */
  public function __construct($assetType)
  {
    $this->assetType = $assetType;
  }

}

class DescribeAssetResponse
{

  /**
   * 
   * @var DescribeAssetResult $DescribeAssetResult
   * @access public
   */
  public $DescribeAssetResult;

  /**
   * 
   * @param DescribeAssetResult $DescribeAssetResult
   * @access public
   */
  public function __construct($DescribeAssetResult)
  {
    $this->DescribeAssetResult = $DescribeAssetResult;
  }

}

class DescribeAssetResult
{

  /**
   * 
   * @var array $Fields
   * @access public
   */
  public $Fields;

  /**
   * 
   * @var boolean $IsCreateable
   * @access public
   */
  public $IsCreateable;

  /**
   * 
   * @var boolean $IsDeletable
   * @access public
   */
  public $IsDeletable;

  /**
   * 
   * @var boolean $IsQueryable
   * @access public
   */
  public $IsQueryable;

  /**
   * 
   * @var boolean $IsRetrievable
   * @access public
   */
  public $IsRetrievable;

  /**
   * 
   * @var boolean $IsUpdateable
   * @access public
   */
  public $IsUpdateable;

  /**
   * 
   * @var string $Name
   * @access public
   */
  public $Name;

  /**
   * 
   * @param array $Fields
   * @param boolean $IsCreateable
   * @param boolean $IsDeletable
   * @param boolean $IsQueryable
   * @param boolean $IsRetrievable
   * @param boolean $IsUpdateable
   * @param string $Name
   * @access public
   */
  public function __construct($Fields, $IsCreateable, $IsDeletable, $IsQueryable, $IsRetrievable, $IsUpdateable, $Name)
  {
    $this->Fields = $Fields;
    $this->IsCreateable = $IsCreateable;
    $this->IsDeletable = $IsDeletable;
    $this->IsQueryable = $IsQueryable;
    $this->IsRetrievable = $IsRetrievable;
    $this->IsUpdateable = $IsUpdateable;
    $this->Name = $Name;
  }

}

class DescribeAssetType
{

  /**
   * 
   * @var string $assetType
   * @access public
   */
  public $assetType;

  /**
   * 
   * @param string $assetType
   * @access public
   */
  public function __construct($assetType)
  {
    $this->assetType = $assetType;
  }

}


class DescribeAssetTypeResponse
{

  /**
   * 
   * @var DescribeAssetTypeResult $DescribeAssetTypeResult
   * @access public
   */
  public $DescribeAssetTypeResult;

  /**
   * 
   * @param DescribeAssetTypeResult $DescribeAssetTypeResult
   * @access public
   */
  public function __construct($DescribeAssetTypeResult)
  {
    $this->DescribeAssetTypeResult = $DescribeAssetTypeResult;
  }

}

class DescribeAssetTypeResult
{

  /**
   * 
   * @var array $AssetTypes
   * @access public
   */
  public $AssetTypes;

  /**
   * 
   * @param array $AssetTypes
   * @access public
   */
  public function __construct($AssetTypes)
  {
    $this->AssetTypes = $AssetTypes;
  }

}

class DescribeEntity
{

  /**
   * 
   * @var EntityType $entityType
   * @access public
   */
  public $entityType;

  /**
   * 
   * @param EntityType $entityType
   * @access public
   */
  public function __construct($entityType)
  {
    $this->entityType = $entityType;
  }

}

class DescribeEntityResponse
{

  /**
   * 
   * @var DescribeEntityResult $DescribeEntityResult
   * @access public
   */
  public $DescribeEntityResult;

  /**
   * 
   * @param DescribeEntityResult $DescribeEntityResult
   * @access public
   */
  public function __construct($DescribeEntityResult)
  {
    $this->DescribeEntityResult = $DescribeEntityResult;
  }

}


class DescribeEntityResult
{

  /**
   * 
   * @var array $Fields
   * @access public
   */
  public $Fields;

  /**
   * 
   * @var boolean $IsCreateable
   * @access public
   */
  public $IsCreateable;

  /**
   * 
   * @var boolean $IsDeletable
   * @access public
   */
  public $IsDeletable;

  /**
   * 
   * @var boolean $IsQueryable
   * @access public
   */
  public $IsQueryable;

  /**
   * 
   * @var boolean $IsRetrievable
   * @access public
   */
  public $IsRetrievable;

  /**
   * 
   * @var boolean $IsUpdateable
   * @access public
   */
  public $IsUpdateable;

  /**
   * 
   * @var string $Name
   * @access public
   */
  public $Name;

  /**
   * 
   * @param array $Fields
   * @param boolean $IsCreateable
   * @param boolean $IsDeletable
   * @param boolean $IsQueryable
   * @param boolean $IsRetrievable
   * @param boolean $IsUpdateable
   * @param string $Name
   * @access public
   */
  public function __construct($Fields, $IsCreateable, $IsDeletable, $IsQueryable, $IsRetrievable, $IsUpdateable, $Name)
  {
    $this->Fields = $Fields;
    $this->IsCreateable = $IsCreateable;
    $this->IsDeletable = $IsDeletable;
    $this->IsQueryable = $IsQueryable;
    $this->IsRetrievable = $IsRetrievable;
    $this->IsUpdateable = $IsUpdateable;
    $this->Name = $Name;
  }

}


class DescribeEntityType
{

  /**
   * 
   * @var string $globalEntityType
   * @access public
   */
  public $globalEntityType;

  /**
   * 
   * @param string $globalEntityType
   * @access public
   */
  public function __construct($globalEntityType)
  {
    $this->globalEntityType = $globalEntityType;
  }

}

class DescribeEntityTypeResponse
{

  /**
   * 
   * @var DescribeEntityTypeResult $DescribeEntityTypeResult
   * @access public
   */
  public $DescribeEntityTypeResult;

  /**
   * 
   * @param DescribeEntityTypeResult $DescribeEntityTypeResult
   * @access public
   */
  public function __construct($DescribeEntityTypeResult)
  {
    $this->DescribeEntityTypeResult = $DescribeEntityTypeResult;
  }

}


class DescribeEntityTypeResult
{

  /**
   * 
   * @var array $EntityTypes
   * @access public
   */
  public $EntityTypes;

  /**
   * 
   * @param array $EntityTypes
   * @access public
   */
  public function __construct($EntityTypes)
  {
    $this->EntityTypes = $EntityTypes;
  }

}


class DynamicActivity
{

  /**
   * 
   * @var ActivityType $ActivityType
   * @access public
   */
  public $ActivityType;

  /**
   * 
   * @var dateTime $Date
   * @access public
   */
  public $Date;

  /**
   * 
   * @var DynamicAsset $DynamicAsset
   * @access public
   */
  public $DynamicAsset;

  /**
   * 
   * @var DynamicEntity $DynamicEntity
   * @access public
   */
  public $DynamicEntity;

  /**
   * 
   * @var DynamicActivityFields $FieldValueCollection
   * @access public
   */
  public $FieldValueCollection;

  /**
   * 
   * @var string $Id
   * @access public
   */
  public $Id;

  /**
   * 
   * @param ActivityType $ActivityType
   * @param dateTime $Date
   * @param DynamicAsset $DynamicAsset
   * @param DynamicEntity $DynamicEntity
   * @param DynamicActivityFields $FieldValueCollection
   * @param string $Id
   * @access public
   */
  public function __construct($ActivityType, $Date, $DynamicAsset, $DynamicEntity, $FieldValueCollection, $Id)
  {
    $this->ActivityType = $ActivityType;
    $this->Date = $Date;
    $this->DynamicAsset = $DynamicAsset;
    $this->DynamicEntity = $DynamicEntity;
    $this->FieldValueCollection = $FieldValueCollection;
    $this->Id = $Id;
  }

}


class DynamicActivityFieldDefinition
{

  /**
   * 
   * @var ActivityFieldDataType $DataType
   * @access public
   */
  public $DataType;

  /**
   * 
   * @var string $DisplayName
   * @access public
   */
  public $DisplayName;

  /**
   * 
   * @var string $InternalName
   * @access public
   */
  public $InternalName;

  /**
   * 
   * @var boolean $IsRequired
   * @access public
   */
  public $IsRequired;

  /**
   * 
   * @var boolean $IsWriteable
   * @access public
   */
  public $IsWriteable;

  /**
   * 
   * @var int $Length
   * @access public
   */
  public $Length;

  /**
   * 
   * @param ActivityFieldDataType $DataType
   * @param string $DisplayName
   * @param string $InternalName
   * @param boolean $IsRequired
   * @param boolean $IsWriteable
   * @param int $Length
   * @access public
   */
  public function __construct($DataType, $DisplayName, $InternalName, $IsRequired, $IsWriteable, $Length)
  {
    $this->DataType = $DataType;
    $this->DisplayName = $DisplayName;
    $this->InternalName = $InternalName;
    $this->IsRequired = $IsRequired;
    $this->IsWriteable = $IsWriteable;
    $this->Length = $Length;
  }

}


class DynamicActivityFields
{

  /**
   * 
   * @var ActivityFields $ActivityFields
   * @access public
   */
  public $ActivityFields;

  /**
   * 
   * @param ActivityFields $ActivityFields
   * @access public
   */
  public function __construct($ActivityFields=array())
  {
    $this->ActivityFields = $ActivityFields;
  }
  
  /**
  * Adding utility methods to set dynamic activity fields
  */
  public function setDynamicActivityField($fieldName,$fieldValue)
  {
  foreach ($this->ActivityFields as $key => $fieldVal) 
		{
            if ($fieldVal->InternalName === $fieldName) 
			{
                $this->ActivityFields[$key]->Value = $fieldValue;
                return;
            }
		}
	$activityField = new ActivityFields($fieldName,$fieldValue);
    $this->ActivityFields[] = $activityField;
  }
  
  /**
  * Adding utility methods to get dynamic activity fields
  */
  
  public function getDynamicActivityField($fieldName)
  {
  foreach ($this->ActivityFields as $key => $fieldVal) 
		{
            if ($fieldVal->InternalName === $fieldName) 
			{
                return $this->ActivityFields[$key]->Value;
            }
		}
   return new stdClass();	
  }
  
  
  
  

}

class DynamicAsset
{

  /**
   * 
   * @var AssetType $AssetType
   * @access public
   */
  public $AssetType;

  /**
   * 
   * @var DynamicAssetFields $FieldValueCollection
   * @access public
   */
  public $FieldValueCollection;

  /**
   * 
   * @var int $Id
   * @access public
   */
  public $Id;

  /**
   * 
   * @param AssetType $AssetType
   * @param DynamicAssetFields $FieldValueCollection
   * @param int $Id
   * @access public
   */
  public function __construct($AssetType, $FieldValueCollection, $Id)
  {
    $this->AssetType = $AssetType;
    $this->FieldValueCollection = $FieldValueCollection;
    $this->Id = $Id;
  }
  
}

class DynamicAssetFieldDefinition
{

  /**
   * 
   * @var AssetFieldDataType $DataType
   * @access public
   */
  public $DataType;

  /**
   * 
   * @var string $DisplayName
   * @access public
   */
  public $DisplayName;

  /**
   * 
   * @var string $InternalName
   * @access public
   */
  public $InternalName;

  /**
   * 
   * @var boolean $IsRequired
   * @access public
   */
  public $IsRequired;

  /**
   * 
   * @var boolean $IsWriteable
   * @access public
   */
  public $IsWriteable;

  /**
   * 
   * @var int $Length
   * @access public
   */
  public $Length;

  /**
   * 
   * @param AssetFieldDataType $DataType
   * @param string $DisplayName
   * @param string $InternalName
   * @param boolean $IsRequired
   * @param boolean $IsWriteable
   * @param int $Length
   * @access public
   */
  public function __construct($DataType, $DisplayName, $InternalName, $IsRequired, $IsWriteable, $Length)
  {
    $this->DataType = $DataType;
    $this->DisplayName = $DisplayName;
    $this->InternalName = $InternalName;
    $this->IsRequired = $IsRequired;
    $this->IsWriteable = $IsWriteable;
    $this->Length = $Length;
  }

}


class DynamicAssetFields
{

  /**
   * 
   * @var AssetFields $AssetFields
   * @access public
   */
  public $AssetFields;

  /**
   * 
   * @param AssetFields $AssetFields
   * @access public
   */
  public function __construct($AssetFields = array())
  {
    $this->AssetFields = $AssetFields;
  }
  
  /**
  * Adding utility methods to set dynamic asset fields
  *
  *
  */
  public function setDynamicAssetField($fieldName,$fieldValue)
  {
  foreach ($this->AssetFields as $key => $fieldVal) 
		{
            if ($fieldVal->InternalName === $fieldName) 
			{
                $this->AssetFields[$key]->Value = $fieldValue;
                return;
            }
		}
	$assetField = new AssetFields($fieldName,$fieldValue);
    $this->AssetFields[] = $assetField;
  }
  
  /**
  * Adding utility methods to get dynamic asset fields
  */
  public function getDynamicAssetField($fieldName)
  {
  foreach ($this->AssetFields as $key => $fieldVal) 
		{
            if ($fieldVal->InternalName === $fieldName) 
			{
                return $this->AssetFields[$key]->Value;
            }
		}
   return new stdClass();	
  }
}

class DynamicEntity
{

  /**
   * 
   * @var EntityType $EntityType
   * @access public
   */
  public $EntityType;

  /**
   * 
   * @var DynamicEntityFields $FieldValueCollection
   * @access public
   */
  public $FieldValueCollection;

  /**
   * 
   * @var int $Id
   * @access public
   */
  public $Id;

  /**
   * 
   * @param EntityType $EntityType
   * @param DynamicEntityFields $FieldValueCollection
   * @param int $Id
   * @access public
   */
  public function __construct($EntityType, $FieldValueCollection, $Id)
  {
    $this->EntityType = $EntityType;
    $this->FieldValueCollection = $FieldValueCollection;
    $this->Id = $Id;

  }
  
}


class DynamicEntityFieldDefinition
{

  /**
   * 
   * @var DataType $DataType
   * @access public
   */
  public $DataType;

  /**
   * 
   * @var string $DefaultValue
   * @access public
   */
  public $DefaultValue;

  /**
   * 
   * @var string $DisplayName
   * @access public
   */
  public $DisplayName;

  /**
   * 
   * @var string $InternalName
   * @access public
   */
  public $InternalName;

  /**
   * 
   * @var boolean $IsCustom
   * @access public
   */
  public $IsCustom;

  /**
   * 
   * @var boolean $IsRequired
   * @access public
   */
  public $IsRequired;

  /**
   * 
   * @var boolean $IsWriteable
   * @access public
   */
  public $IsWriteable;

  /**
   * 
   * @var int $Length
   * @access public
   */
  public $Length;

  /**
   * 
   * @param DataType $DataType
   * @param string $DefaultValue
   * @param string $DisplayName
   * @param string $InternalName
   * @param boolean $IsCustom
   * @param boolean $IsRequired
   * @param boolean $IsWriteable
   * @param int $Length
   * @access public
   */
  public function __construct($DataType, $DefaultValue, $DisplayName, $InternalName, $IsCustom, $IsRequired, $IsWriteable, $Length)
  {
    $this->DataType = $DataType;
    $this->DefaultValue = $DefaultValue;
    $this->DisplayName = $DisplayName;
    $this->InternalName = $InternalName;
    $this->IsCustom = $IsCustom;
    $this->IsRequired = $IsRequired;
    $this->IsWriteable = $IsWriteable;
    $this->Length = $Length;
  }

}


class DynamicEntityFields
{

  /**
   * 
   * @var EntityFields $EntityFields
   * @access public
   */
  public $EntityFields;

  /**
   * 
   * @param EntityFields $EntityFields
   * @access public
   */
  public function __construct($EntityFields=array())
  {
    $this->EntityFields = $EntityFields;
  }
  
  /**
  * Adding utility methods to set dynamic entity fields
  *
  *
  */
  public function setDynamicEntityField($fieldName,$fieldValue)
  {
  foreach ($this->EntityFields as $key => $fieldVal) 
		{
            if ($fieldVal->InternalName === $fieldName) 
			{
                $this->EntityFields[$key]->Value = $fieldValue;
                return;
            }
		}
	$entityField = new EntityFields($fieldName,$fieldValue);
    $this->EntityFields[] = $entityField;
	
  }
  
  /**
  * Adding utility methods to get dynamic entity fields
  */
  public function getDynamicEntityField($fieldName)
  {
  foreach ($this->EntityFields as $key => $fieldVal) 
		{
            if ($fieldVal->InternalName === $fieldName) 
			{
                return $this->EntityFields[$key]->Value;
            }
		}
   return new stdClass();	
  }

}



class DynamicEntityQueryResults
{

  /**
   * 
   * @var array $Entities
   * @access public
   */
  public $Entities;

  /**
   * 
   * @var int $TotalPages
   * @access public
   */
  public $TotalPages;

  /**
   * 
   * @var int $TotalRecords
   * @access public
   */
  public $TotalRecords;

  /**
   * 
   * @param array $Entities
   * @param int $TotalPages
   * @param int $TotalRecords
   * @access public
   */
  public function __construct($Entities, $TotalPages, $TotalRecords)
  {
    $this->Entities = $Entities;
    $this->TotalPages = $TotalPages;
    $this->TotalRecords = $TotalRecords;
  }

}


class EloquaActivityType
{

  /**
   * 
   * @var string $Id
   * @access public
   */
  public $Id;

  /**
   * 
   * @var string $Name
   * @access public
   */
  public $Name;

  /**
   * 
   * @var string $Type
   * @access public
   */
  public $Type;

  /**
   * 
   * @param string $Id
   * @param string $Name
   * @param string $Type
   * @access public
   */
  public function __construct($Id, $Name, $Type)
  {
    $this->Id = $Id;
    $this->Name = $Name;
    $this->Type = $Type;
  }

}


class EntityFields
{

  /**
   * 
   * @var string $InternalName
   * @access public
   */
  public $InternalName;

  /**
   * 
   * @var string $Value
   * @access public
   */
  public $Value;

  /**
   * 
   * @param string $InternalName
   * @param string $Value
   * @access public
   */
  public function __construct($InternalName, $Value)
  {
    $this->InternalName = $InternalName;
    $this->Value = $Value;
  }

}

class EntityType
{

  /**
   * 
   * @var int $ID
   * @access public
   */
  public $ID;

  /**
   * 
   * @var string $Name
   * @access public
   */
  public $Name;

  /**
   * 
   * @var string $Type
   * @access public
   */
  public $Type;

  /**
   * 
   * @param int $ID
   * @param string $Name
   * @param string $Type
   * @access public
   */
  public function __construct($ID, $Name, $Type)
  {
    $this->ID = $ID;
    $this->Name = $Name;
    $this->Type = $Type;
  }

}

class Error
{

  /**
   * 
   * @var ErrorCode $ErrorCode
   * @access public
   */
  public $ErrorCode;

  /**
   * 
   * @var string $Message
   * @access public
   */
  public $Message;

  /**
   * 
   * @param ErrorCode $ErrorCode
   * @param string $Message
   * @access public
   */
  public function __construct($ErrorCode, $Message)
  {
    $this->ErrorCode = $ErrorCode;
    $this->Message = $Message;
  }

}

class GetActivities
{

  /**
   * 
   * @var DynamicEntity $dynamicEntity
   * @access public
   */
  public $dynamicEntity;

  /**
   * 
   * @var array $activityTypes
   * @access public
   */
  public $activityTypes;

  /**
   * 
   * @var dateTime $startDate
   * @access public
   */
  public $startDate;

  /**
   * 
   * @var dateTime $endDate
   * @access public
   */
  public $endDate;

  /**
   * 
   * @param DynamicEntity $dynamicEntity
   * @param array $activityTypes
   * @param dateTime $startDate
   * @param dateTime $endDate
   * @access public
   */
  public function __construct($dynamicEntity, $activityTypes, $startDate, $endDate)
  {
    $this->dynamicEntity = $dynamicEntity;
    $this->activityTypes = $activityTypes;
    $this->startDate = $startDate;
    $this->endDate = $endDate;
  }

}


class GetActivitiesResponse
{

  /**
   * 
   * @var array $GetActivitiesResult
   * @access public
   */
  public $GetActivitiesResult;

  /**
   * 
   * @param array $GetActivitiesResult
   * @access public
   */
  public function __construct($GetActivitiesResult)
  {
    $this->GetActivitiesResult = $GetActivitiesResult;
  }

}

class GetEmailActivitiesForRecipients
{

  /**
   * 
   * @var array $emailAddresses
   * @access public
   */
  public $emailAddresses;

  /**
   * 
   * @var array $emailIDs
   * @access public
   */
  public $emailIDs;

  /**
   * 
   * @var int $pageSize
   * @access public
   */
  public $pageSize;

  /**
   * 
   * @var int $requestedPage
   * @access public
   */
  public $requestedPage;

  /**
   * 
   * @param array $emailAddresses
   * @param array $emailIDs
   * @param int $pageSize
   * @param int $requestedPage
   * @access public
   */
  public function __construct($emailAddresses, $emailIDs, $pageSize, $requestedPage)
  {
    $this->emailAddresses = $emailAddresses;
    $this->emailIDs = $emailIDs;
    $this->pageSize = $pageSize;
    $this->requestedPage = $requestedPage;
  }

}


class GetEmailActivitiesForRecipientsResponse
{

  /**
   * 
   * @var array $GetEmailActivitiesForRecipientsResult
   * @access public
   */
  public $GetEmailActivitiesForRecipientsResult;

  /**
   * 
   * @param array $GetEmailActivitiesForRecipientsResult
   * @access public
   */
  public function __construct($GetEmailActivitiesForRecipientsResult)
  {
    $this->GetEmailActivitiesForRecipientsResult = $GetEmailActivitiesForRecipientsResult;
  }

}


class GetQuickEmailStatus
{

  /**
   * 
   * @var int $deploymentId
   * @access public
   */
  public $deploymentId;

  /**
   * 
   * @param int $deploymentId
   * @access public
   */
  public function __construct($deploymentId)
  {
    $this->deploymentId = $deploymentId;
  }

}


class GetQuickEmailStatusResponse
{

  /**
   * 
   * @var SendEmailResult $GetQuickEmailStatusResult
   * @access public
   */
  public $GetQuickEmailStatusResult;

  /**
   * 
   * @param SendEmailResult $GetQuickEmailStatusResult
   * @access public
   */
  public function __construct($GetQuickEmailStatusResult)
  {
    $this->GetQuickEmailStatusResult = $GetQuickEmailStatusResult;
  }

}

class GroupMemberResult
{

  /**
   * 
   * @var array $Errors
   * @access public
   */
  public $Errors;

  /**
   * 
   * @var boolean $Success
   * @access public
   */
  public $Success;

  /**
   * 
   * @param array $Errors
   * @param boolean $Success
   * @access public
   */
  public function __construct($Errors, $Success)
  {
    $this->Errors = $Errors;
    $this->Success = $Success;
  }

}


class InvalidArgumentFault
{

  /**
   * 
   * @access public
   */
  public function __construct()
  {
  
  }

}

class InvalidAssetFault
{

  /**
   * 
   * @access public
   */
  public function __construct()
  {
  
  }

}


class InvalidDateRangeFault
{

  /**
   * 
   * @access public
   */
  public function __construct()
  {
  
  }

}

class InvalidEntityFault
{

  /**
   * 
   * @access public
   */
  public function __construct()
  {
  
  }

}

class InvalidQueryFault
{

  /**
   * 
   * @access public
   */
  public function __construct()
  {
  
  }

}


class InvalidTypeFault
{

  /**
   * 
   * @access public
   */
  public function __construct()
  {
  
  }

}

class ListActivityTypes
{

  /**
   * 
   * @access public
   */
  public function __construct()
  {
  
  }

}

class ListActivityTypesResponse
{

  /**
   * 
   * @var ListActivityTypesResult $ListActivityTypesResult
   * @access public
   */
  public $ListActivityTypesResult;

  /**
   * 
   * @param ListActivityTypesResult $ListActivityTypesResult
   * @access public
   */
  public function __construct($ListActivityTypesResult)
  {
    $this->ListActivityTypesResult = $ListActivityTypesResult;
  }

}


class ListActivityTypesResult
{

  /**
   * 
   * @var array $ActivityTypes
   * @access public
   */
  public $ActivityTypes;

  /**
   * 
   * @param array $ActivityTypes
   * @access public
   */
  public function __construct($ActivityTypes)
  {
    $this->ActivityTypes = $ActivityTypes;
  }

}

class ListAssetTypes
{

  /**
   * 
   * @access public
   */
  public function __construct()
  {
  
  }

}


class ListAssetTypesResponse
{

  /**
   * 
   * @var ListAssetTypesResult $ListAssetTypesResult
   * @access public
   */
  public $ListAssetTypesResult;

  /**
   * 
   * @param ListAssetTypesResult $ListAssetTypesResult
   * @access public
   */
  public function __construct($ListAssetTypesResult)
  {
    $this->ListAssetTypesResult = $ListAssetTypesResult;
  }

}

class ListAssetTypesResult
{

  /**
   * 
   * @var array $AssetTypes
   * @access public
   */
  public $AssetTypes;

  /**
   * 
   * @param array $AssetTypes
   * @access public
   */
  public function __construct($AssetTypes)
  {
    $this->AssetTypes = $AssetTypes;
  }

}

class ListEntityTypes
{

  /**
   * 
   * @access public
   */
  public function __construct()
  {
  
  }

}

class ListEntityTypesResponse
{

  /**
   * 
   * @var ListEntityTypesResult $ListEntityTypesResult
   * @access public
   */
  public $ListEntityTypesResult;

  /**
   * 
   * @param ListEntityTypesResult $ListEntityTypesResult
   * @access public
   */
  public function __construct($ListEntityTypesResult)
  {
    $this->ListEntityTypesResult = $ListEntityTypesResult;
  }

}

class ListEntityTypesResult
{

  /**
   * 
   * @var array $EntityTypes
   * @access public
   */
  public $EntityTypes;

  /**
   * 
   * @param array $EntityTypes
   * @access public
   */
  public function __construct($EntityTypes)
  {
    $this->EntityTypes = $EntityTypes;
  }

}

class ListGroupMembership
{

  /**
   * 
   * @var DynamicEntity $entity
   * @access public
   */
  public $entity;

  /**
   * 
   * @param DynamicEntity $entity
   * @access public
   */
  public function __construct($entity)
  {
    $this->entity = $entity;
  }

}

class ListGroupMembershipResponse
{

  /**
   * 
   * @var array $ListGroupMembershipResult
   * @access public
   */
  public $ListGroupMembershipResult;

  /**
   * 
   * @param array $ListGroupMembershipResult
   * @access public
   */
  public function __construct($ListGroupMembershipResult)
  {
    $this->ListGroupMembershipResult = $ListGroupMembershipResult;
  }

}

class OperationTimeIntervalFault
{

  /**
   * 
   * @access public
   */
  public function __construct()
  {
  
  }

}

class Query
{

  /**
   * 
   * @var EntityType $eloquaType
   * @access public
   */
  public $eloquaType;

  /**
   * 
   * @var string $searchQuery
   * @access public
   */
  public $searchQuery;

  /**
   * 
   * @var array $fieldNames
   * @access public
   */
  public $fieldNames;

  /**
   * 
   * @var int $pageNumber
   * @access public
   */
  public $pageNumber;

  /**
   * 
   * @var int $pageSize
   * @access public
   */
  public $pageSize;

  /**
   * 
   * @param EntityType $eloquaType
   * @param string $searchQuery
   * @param array $fieldNames
   * @param int $pageNumber
   * @param int $pageSize
   * @access public
   */
  public function __construct($eloquaType, $searchQuery, $fieldNames, $pageNumber, $pageSize)
  {
    $this->eloquaType = $eloquaType;
    $this->searchQuery = $searchQuery;
    $this->fieldNames = $fieldNames;
    $this->pageNumber = $pageNumber;
    $this->pageSize = $pageSize;
  }

}


class QueryResponse
{

  /**
   * 
   * @var DynamicEntityQueryResults $QueryResult
   * @access public
   */
  public $QueryResult;

  /**
   * 
   * @param DynamicEntityQueryResults $QueryResult
   * @access public
   */
  public function __construct($QueryResult)
  {
    $this->QueryResult = $QueryResult;
  }

}

class QueryTooLargeFault
{

  /**
   * 
   * @access public
   */
  public function __construct()
  {
  
  }

}

class QuickSendEmailOption
{

  /**
   * 
   * @var boolean $AllowResend
   * @access public
   */
  public $AllowResend;

  /**
   * 
   * @var boolean $SendToBouncebacked
   * @access public
   */
  public $SendToBouncebacked;

  /**
   * 
   * @var boolean $SendToEmailGroupUnsubscribed
   * @access public
   */
  public $SendToEmailGroupUnsubscribed;

  /**
   * 
   * @var boolean $SendToMasterExcluded
   * @access public
   */
  public $SendToMasterExcluded;

  /**
   * 
   * @var boolean $SendToUnsubscribed
   * @access public
   */
  public $SendToUnsubscribed;

  /**
   * 
   * @var int $SenderId
   * @access public
   */
  public $SenderId;

  /**
   * 
   * @param boolean $AllowResend
   * @param boolean $SendToBouncebacked
   * @param boolean $SendToEmailGroupUnsubscribed
   * @param boolean $SendToMasterExcluded
   * @param boolean $SendToUnsubscribed
   * @param int $SenderId
   * @access public
   */
  public function __construct($AllowResend, $SendToBouncebacked, $SendToEmailGroupUnsubscribed, $SendToMasterExcluded, $SendToUnsubscribed, $SenderId)
  {
    $this->AllowResend = $AllowResend;
    $this->SendToBouncebacked = $SendToBouncebacked;
    $this->SendToEmailGroupUnsubscribed = $SendToEmailGroupUnsubscribed;
    $this->SendToMasterExcluded = $SendToMasterExcluded;
    $this->SendToUnsubscribed = $SendToUnsubscribed;
    $this->SenderId = $SenderId;
  }

}


class RecordNotFoundFault
{

  /**
   * 
   * @access public
   */
  public function __construct()
  {
  
  }

}

class RemoveGroupMember
{

  /**
   * 
   * @var DynamicEntity $entity
   * @access public
   */
  public $entity;

  /**
   * 
   * @var DynamicAsset $asset
   * @access public
   */
  public $asset;

  /**
   * 
   * @param DynamicEntity $entity
   * @param DynamicAsset $asset
   * @access public
   */
  public function __construct($entity, $asset)
  {
    $this->entity = $entity;
    $this->asset = $asset;
  }

}

class RemoveGroupMemberResponse
{

  /**
   * 
   * @var GroupMemberResult $RemoveGroupMemberResult
   * @access public
   */
  public $RemoveGroupMemberResult;

  /**
   * 
   * @param GroupMemberResult $RemoveGroupMemberResult
   * @access public
   */
  public function __construct($RemoveGroupMemberResult)
  {
    $this->RemoveGroupMemberResult = $RemoveGroupMemberResult;
  }

}

class Retrieve
{

  /**
   * 
   * @var EntityType $entityType
   * @access public
   */
  public $entityType;

  /**
   * 
   * @var array $ids
   * @access public
   */
  public $ids;

  /**
   * 
   * @var array $fieldNames
   * @access public
   */
  public $fieldNames;

  /**
   * 
   * @param EntityType $entityType
   * @param array $ids
   * @param array $fieldNames
   * @access public
   */
  public function __construct($entityType, $ids, $fieldNames)
  {
    $this->entityType = $entityType;
    $this->ids = $ids;
    $this->fieldNames = $fieldNames;
  }

}


class RetrieveAsset
{

  /**
   * 
   * @var AssetType $assetType
   * @access public
   */
  public $assetType;

  /**
   * 
   * @var array $ids
   * @access public
   */
  public $ids;

  /**
   * 
   * @var array $fieldNames
   * @access public
   */
  public $fieldNames;

  /**
   * 
   * @param AssetType $assetType
   * @param array $ids
   * @param array $fieldNames
   * @access public
   */
  public function __construct($assetType, $ids, $fieldNames)
  {
    $this->assetType = $assetType;
    $this->ids = $ids;
    $this->fieldNames = $fieldNames;
  }

}

class RetrieveAssetResponse
{

  /**
   * 
   * @var array $RetrieveAssetResult
   * @access public
   */
  public $RetrieveAssetResult;

  /**
   * 
   * @param array $RetrieveAssetResult
   * @access public
   */
  public function __construct($RetrieveAssetResult)
  {
    $this->RetrieveAssetResult = $RetrieveAssetResult;
  }

}

class RetrieveResponse
{

  /**
   * 
   * @var array $RetrieveResult
   * @access public
   */
  public $RetrieveResult;

  /**
   * 
   * @param array $RetrieveResult
   * @access public
   */
  public function __construct($RetrieveResult)
  {
    $this->RetrieveResult = $RetrieveResult;
  }

}

class SendEmailResult
{

  /**
   * 
   * @var int $DeploymentId
   * @access public
   */
  public $DeploymentId;

  /**
   * 
   * @var string $Message
   * @access public
   */
  public $Message;

  /**
   * 
   * @var SendEmailStatus $Status
   * @access public
   */
  public $Status;

  /**
   * 
   * @param int $DeploymentId
   * @param string $Message
   * @param SendEmailStatus $Status
   * @access public
   */
  public function __construct($DeploymentId, $Message, $Status)
  {
    $this->DeploymentId = $DeploymentId;
    $this->Message = $Message;
    $this->Status = $Status;
  }

}

class SendQuickEmail
{

  /**
   * 
   * @var DynamicAsset $asset
   * @access public
   */
  public $asset;

  /**
   * 
   * @var DynamicEntity $entity
   * @access public
   */
  public $entity;

  /**
   * 
   * @var QuickSendEmailOption $options
   * @access public
   */
  public $options;

  /**
   * 
   * @param DynamicAsset $asset
   * @param DynamicEntity $entity
   * @param QuickSendEmailOption $options
   * @access public
   */
  public function __construct($asset, $entity, $options)
  {
    $this->asset = $asset;
    $this->entity = $entity;
    $this->options = $options;
  }

}


class SendQuickEmailResponse
{

  /**
   * 
   * @var SendEmailResult $SendQuickEmailResult
   * @access public
   */
  public $SendQuickEmailResult;

  /**
   * 
   * @param SendEmailResult $SendQuickEmailResult
   * @access public
   */
  public function __construct($SendQuickEmailResult)
  {
    $this->SendQuickEmailResult = $SendQuickEmailResult;
  }

}

class UnexpectedErrorFault
{

  /**
   * 
   * @access public
   */
  public function __construct()
  {
  
  }

}

class Update
{

  /**
   * 
   * @var array $entities
   * @access public
   */
  public $entities;

  /**
   * 
   * @param array $entities
   * @access public
   */
  public function __construct($entities)
  {
    $this->entities = $entities;
  }

}

class UpdateAsset
{

  /**
   * 
   * @var array $assets
   * @access public
   */
  public $assets;

  /**
   * 
   * @param array $assets
   * @access public
   */
  public function __construct($assets)
  {
    $this->assets = $assets;
  }

}

class UpdateAssetResponse
{

  /**
   * 
   * @var array $UpdateAssetResult
   * @access public
   */
  public $UpdateAssetResult;

  /**
   * 
   * @param array $UpdateAssetResult
   * @access public
   */
  public function __construct($UpdateAssetResult)
  {
    $this->UpdateAssetResult = $UpdateAssetResult;
  }

}

class UpdateAssetResult
{

  /**
   * 
   * @var AssetType $AssetType
   * @access public
   */
  public $AssetType;

  /**
   * 
   * @var array $Errors
   * @access public
   */
  public $Errors;

  /**
   * 
   * @var int $ID
   * @access public
   */
  public $ID;

  /**
   * 
   * @var boolean $Success
   * @access public
   */
  public $Success;

  /**
   * 
   * @param AssetType $AssetType
   * @param array $Errors
   * @param int $ID
   * @param boolean $Success
   * @access public
   */
  public function __construct($AssetType, $Errors, $ID, $Success)
  {
    $this->AssetType = $AssetType;
    $this->Errors = $Errors;
    $this->ID = $ID;
    $this->Success = $Success;
  }

}


class UpdateResponse
{

  /**
   * 
   * @var array $UpdateResult
   * @access public
   */
  public $UpdateResult;

  /**
   * 
   * @param array $UpdateResult
   * @access public
   */
  public function __construct($UpdateResult)
  {
    $this->UpdateResult = $UpdateResult;
  }

}

class UpdateResult
{

  /**
   * 
   * @var EntityType $EntityType
   * @access public
   */
  public $EntityType;

  /**
   * 
   * @var array $Errors
   * @access public
   */
  public $Errors;

  /**
   * 
   * @var int $ID
   * @access public
   */
  public $ID;

  /**
   * 
   * @var boolean $Success
   * @access public
   */
  public $Success;

  /**
   * 
   * @param EntityType $EntityType
   * @param array $Errors
   * @param int $ID
   * @param boolean $Success
   * @access public
   */
  public function __construct($EntityType, $Errors, $ID, $Success)
  {
    $this->EntityType = $EntityType;
    $this->Errors = $Errors;
    $this->ID = $ID;
    $this->Success = $Success;
  }

}


class ValidationDetail
{

  /**
   * 
   * @var string $Key
   * @access public
   */
  public $Key;

  /**
   * 
   * @var string $Message
   * @access public
   */
  public $Message;

  /**
   * 
   * @var string $Tag
   * @access public
   */
  public $Tag;

  /**
   * 
   * @param string $Key
   * @param string $Message
   * @param string $Tag
   * @access public
   */
  public function __construct($Key, $Message, $Tag)
  {
    $this->Key = $Key;
    $this->Message = $Message;
    $this->Tag = $Tag;
  }

}

class ValidationFault
{

  /**
   * 
   * @var array $Details
   * @access public
   */
  public $Details;

  /**
   * 
   * @param array $Details
   * @access public
   */
  public function __construct($Details)
  {
    $this->Details = $Details;
  }

}






