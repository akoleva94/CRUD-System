<?php

class Countries_DeleteCountryInputView extends countriesCountriesBaseView
{
	public function executeHtml(AgaviRequestDataHolder $rd)
	{
		$this->setupHtml($rd);
		$country = $this->getAttribute('country');
		$this->setAttribute('_title', 'Delete '.$country['countryName']);

	}
}

?>