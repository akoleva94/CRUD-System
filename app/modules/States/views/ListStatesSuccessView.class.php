<?php

class States_ListStatesSuccessView extends countriesStatesBaseView
{
	public function executeHtml(AgaviRequestDataHolder $rd)
	{
		$this->setupHtml($rd);
		$mgr = $this->getContext()->getModel('StatesManager', 'States');	
		$country_id = $rd->getParameter('country_id');
		$states = $this->getAttribute('states');
		//$states = $mgr->getAllStatesByCountryId($country_id);
		$this->setAttribute('states', $states);

		$this->setAttribute('_title', $states['stateName']);
	}
}

?>