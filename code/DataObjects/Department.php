<?php

class Department extends DataObject{
	
	private static $db = array(
		'Title' => 'Varchar(255)'
	);
	
	private static $has_one = array(
		'TeamPage' => 'TeamPage'
	);
	
	private static $has_many = array(
		'TeamMembers' => 'TeamMember'
	);
	
	public function getCMSFields()
	{
		$fields = parent::getCMSFields();
		
		$fields->removeByName('TeamPageID');
		$fields->removeByName('TeamMembers');
		
		return $fields;
	}
	
	public function LinkingMode()
	{
		if($controller = Controller::curr())
		{
			return $controller->CurrentDepartmentID == $this->ID ? 'current' : 'link';
		}
	}
}
