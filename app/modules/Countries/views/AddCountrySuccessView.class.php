<?php

class Countries_AddCountrySuccessView extends countriesCountriesBaseView
{
	public function executeHtml(AgaviRequestDataHolder $rd)
	{
		$countryID = $this->getAttribute('countryID');
		$url = $this->getContext()->getRouting()->gen('show_country', array('country_id' => $countryID));
		$this->getResponse()->setRedirect($url, 301);
	}
}

?>