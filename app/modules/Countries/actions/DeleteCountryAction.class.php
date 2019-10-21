<?php

class Countries_DeleteCountryAction extends countriesCountriesBaseAction
{
	public function executeRead(AgaviRequestDataHolder $rd)
	{
		$mgr = $this->getContext()->getModel('CountriesManager', 'Countries');
		if ($country = $mgr->getById($rd->getParameter('country_id')))
		{
			$this->setAttribute('country', $country);
			return 'Input';
		}

		return array('Default', 'Error404Success');
	}

	public function handleWriteError(AgaviRequestDataHolder $rd)
	{
		$mgr = $this->getContext()->getModel('CountriesManager', 'Countries');
		if ($country = $mgr->getById($rd->getParameter('country_id')))
		{
			$this->setAttribute('country', $country);
			return 'Input';
		}

		return array('Default', 'Error404Success');
	}

	public function executeWrite(AgaviRequestDataHolder $rd)
	{
		$mgr = $this->getContext()->getModel('CountriesManager', 'Countries');
		if ($country = $mgr->getById($rd->getParameter('country_id')))
		{
			try 
			{
				$mgr->delete($rd->getParameter('country_id'));
				$us = $this->getContext()->getUser();
				$us->setAttribute('message', 'A country was deleted successfully!');

				return 'Success';	
			} 
			catch (Exception $e) 
			{
				return 'Error';
			}	
			
		}
		return array('Default', 'Error404Success');
	}
}

?>