<?php

class Countries_EditCountrySuccessView extends countriesCountriesBaseView
{
	public function executeHtml(AgaviRequestDataHolder $rd)
	{
		$url = $this->getContext()->getRouting()->gen('show_country', array('country_id' => $rd->getParameter('country_id')));
		$this->getResponse()->setRedirect($url, 301);
	}
}

?>