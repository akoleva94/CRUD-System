<?php

class Countries_DeleteCountryErrorView extends countriesCountriesBaseView
{
	public function executeHtml(AgaviRequestDataHolder $rd)
	{
		$this->setAttribute('_title', 'DeleteCountry');

		$url = $this->getContext()->getRouting()->gen('show_country', array('country_id' => $rd->getParameter('country_id')));
		$_SESSION['message'] = 'The country cannot be deleted.';
		$this->getResponse()->setRedirect($url, 301);

	}
}

?>