<?php

class Countries_ListCountriesErrorView extends countriesCountriesBaseView
{
	public function executeHtml(AgaviRequestDataHolder $rd)
	{
		$this->setupHtml($rd);
		
		$this->setAttribute('_title', 'ListCountries');
	}
}

?>