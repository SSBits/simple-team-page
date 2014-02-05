<?php
/**
* 
*  Simple Team Page
* 
*  Full Tutorial on SSbits.com
* 
*  @package simpleteampage
* 
*/

class TeamPage extends Page
{
	private static $description = 'A page to display team members';	
	
	private static $has_many = array(
		'TeamMembers' => 'TeamMember',
		'Departments' => 'Department'
	);
	
	public function getCMSFields()
	{
		$fields = parent::getCMSFields();
	
		//Team members
		$gridConfig = GridFieldConfig_RelationEditor::create();
		$gridField = new GridField(
			'TeamMembers', 
			'Team Members', 
			$this->TeamMembers(), 
			$gridConfig
		);
		$fields->addFieldToTab('Root.TeamMembers', $gridField);
	
		//Departments
		$gridConfig = GridFieldConfig_RelationEditor::create();
		$gridField = new GridField(
			'Departments', 
			'Departments', 
			$this->Departments(), 
			$gridConfig
		);
		$fields->addFieldToTab('Root.Departments', $gridField);

		return $fields;
	}	
}

class TeamPage_Controller extends Page_Controller
{

	private static $allowed_actions = array(
		'department'
	);
	
	public function department()
	{
		if($departmentID = $this->getCurrentDepartmentID())
		{
			$teamMembers = $this->TeamMembers()->filter('DepartmentID', $departmentID);
			
			$data = array(
				'TeamMembers' => $teamMembers
			);
			
			return $this->customise($data);
		}
	}
	
	public function getCurrentDepartmentID()
	{
		$params = $this->request->allParams();
		
		if($params && isset($params['ID']) && is_numeric($params['ID']))
		{
			return $params['ID'];
		}
	}
}