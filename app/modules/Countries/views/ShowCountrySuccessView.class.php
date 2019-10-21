<?php

class Countries_ShowCountrySuccessView extends countriesCountriesBaseView
{
	public function executeHtml(AgaviRequestDataHolder $rd)
	{
		$this->setupHtml($rd);

		$country = $this->getAttribute('country');

		$this->setAttribute('_title', $country['countryName']);

		$mgr = $this->getContext()->getModel('StatesManager', 'States');
		$states = $mgr->getAllStatesByCountryId($rd->getParameter('country_id'));
		$this->setAttribute('states', $states);

		$stateCounter ="";
		$mgrC = $this->getContext()->getModel('CountriesManager', 'Countries'); 
		$stateCounter = $mgrC->getNumberOfStates($country['countryID']);
		$this->setAttribute('stateCounter', $stateCounter);
	}
}

?>