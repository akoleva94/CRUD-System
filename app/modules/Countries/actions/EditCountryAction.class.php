<?php

class Countries_EditCountryAction extends countriesCountriesBaseAction
{
	public function executeRead(AgaviRequestDataHolder $rd)
	{
		$mgr = $this->getContext()->getModel('CountriesManager', 'Countries');
		if ($country = $mgr->getById($rd->getParameter('country_id')))
		{
			$this->setAttribute('country', $country);
			return 'Input';
		}

		return array('Default', 'Error404Success');
	}

	public function handleWriteError(AgaviRequestDataHolder $rd)
	{
		$mgr = $this->getContext()->getModel('CountriesManager', 'Countries');
		if ($country = $mgr->getById($rd->getParameter('country_id')))
		{
			$this->setAttribute('country', $country);
			return 'Input';
		}

		return array('Default', 'Error404Success');
	}

	public function executeWrite(AgaviRequestDataHolder $rd)
	{
		$mgr = $this->getContext()->getModel('CountriesManager', 'Countries');
		if ($country = $mgr->getById($rd->getParameter('country_id')))
		{
			$data = array(
				'countryID' => $rd->getParameter('country_id'),
				'countryName' => $rd->getParameter('countryName'),
				'code' => $rd->getParameter('code'),
				'population' => $rd->getParameter('population'),
				'area' => $rd->getParameter('area')
			);	

			$mgr->update($data);

			return 'Success';
		}

		return array('Default', 'Error404Success');
	}
}

?>