<?php

class Countries_ListCountriesSuccessView extends countriesCountriesBaseView
{
	public function executeHtml(AgaviRequestDataHolder $rd)
	{
		$this->setupHtml($rd);
		
		$this->setAttribute('_title', 'List All Countries');

		$mgr = $this->getContext()->getModel('CountriesManager', 'Countries');	
		$countries = $mgr->getAll();
		$this->setAttribute('countries', $countries);
		// $this->setAttribute('countries', $countries->getAll());
		// $mgr = new CountriesManagerModel();
		// $countries = $mgr->getAll();
		// $this->setAttribute('countries', $countries);
	}
}

?>