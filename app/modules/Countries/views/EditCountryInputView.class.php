<?php

class Countries_EditCountryInputView extends countriesCountriesBaseView
{
	public function executeHtml(AgaviRequestDataHolder $rd)
	{
		$this->setupHtml($rd);

		$country = $this->getAttribute('country');

		$this->setAttribute('_title', 'Edit '.$country['countryName']);
	}
}

?>