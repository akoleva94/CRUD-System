<?php

class States_ShowStateAction extends countriesStatesBaseAction
{
	public function handleError(AgaviRequestDataHolder $rd)
	{
		return array('Default', 'Error404Success');
	}


	public function execute(AgaviRequestDataHolder $rd)
	{
		$mgr = $this->getContext()->getModel('StatesManager', 'States');
		if ($state = $mgr->getStateById($rd->getParameter('state_id')))
		{
			$this->setAttribute('state', $state);
			return 'Success';
		}
		return array('Default', 'Error404Success');
	}
}

?>