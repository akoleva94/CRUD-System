<?php

class Countries_AddCountryInputView extends countriesCountriesBaseView
{
	public function executeHtml(AgaviRequestDataHolder $rd)
	{
		$this->setupHtml($rd);

		$ro = $this->getContext()->getRouting();

		$country = $this->getAttribute('country');		
		$this->setAttribute('_title', 'Add Country');
		$this->setAttribute('addUrl', $ro->gen('add_country'));
	}
}

?>