<?php

class States_ShowStateSuccessView extends countriesStatesBaseView
{
	public function executeHtml(AgaviRequestDataHolder $rd)
	{
		$this->setupHtml($rd);
		$state = $this->getAttribute('state');
		$this->setAttribute('state', $state);
		$this->setAttribute('_title', $state['stateName']);

		$parrent = array();
		$mgrP = $this->getContext()->getModel('StatesManager', 'States');
		$parrent = $mgrP->getCountryByStateId($state['stateID']);
		$this->setAttribute('parrent', $parrent);
	}
}

?>