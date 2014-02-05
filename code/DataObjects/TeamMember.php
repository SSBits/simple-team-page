<?php

class TeamMember extends DataObject
{
	private static $db = array(
		'Name' => 'Varchar(255)',
		'Position' => 'Varchar(255)',
		'Bio' => 'Text'
	);
	
	private static $has_one = array(
		'TeamPage' => 'TeamPage',
		'Image' => 'Image',
		'Department' => 'Department'
	);
	
	private static $summary_fields = array(
		'Image.CMSThumbnail' => 'Image',
		'Name' => 'Name',
		'Department.Title' => 'Department'
	);
	
	public function getCMSFields()
	{
		$fields = parent::getCMSFields();
		
		$fields->removeByName('TeamPageID');
		
		return $fields;
	}	
}