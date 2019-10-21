<?php

class Countries_ShowCountryAction extends countriesCountriesBaseAction
{
	public function execute(AgaviRequestDataHolder $rd)
	{
		$mgr = $this->getContext()->getModel('CountriesManager', 'Countries');
		if ($country = $mgr->getById($rd->getParameter('country_id')))
		{
			$this->setAttribute('country', $country);
			return 'Success';
		}

		return array('Default', 'Error404Success');
	}
}

?>