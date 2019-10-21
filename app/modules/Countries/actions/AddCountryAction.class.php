<?php

class Countries_AddCountryAction extends countriesCountriesBaseAction
{	
	public function executeRead(AgaviRequestDataHolder $rd)
	{
		return 'Input';
	}

	public function handleWriteError(AgaviRequestDataHolder $rd)
	{
		return 'Input';
	}

	public function executeWrite(AgaviRequestDataHolder $rd)
	{
		$mgr = $this->getContext()->getModel('CountriesManager', 'Countries');
		
		$data = array(
			'countryName' => $rd->getParameter('countryName'),
			'code' => $rd->getParameter('code'),
			'area' => $rd->getParameter('area'),
			'population' => $rd->getParameter('population')
		);

		try
		{
			$countryID = $mgr->insert($data);
			$this->setAttribute('countryID', $countryID);
			$us = $this->getContext()->getUser();
			$us->setAttribute('message', 'A country was created successfully!');

			return 'Success';
		}
		catch (Exception $e)
		{
			//$this->setAttribute('session_message', 'Cannot create country. Already exists???');
			$this->setAttribute('session_message', AgaviConfig::get('core.error_messages')['country_create']);
			return 'Input';
		}
		
		return array('Default', 'Error404Success');
	}
}

?>