<?php

class Countries_DeleteCountrySuccessView extends countriesCountriesBaseView
{
	public function executeHtml(AgaviRequestDataHolder $rd)
	{
		$url = './';

		$_SESSION['message'] = 'The country was successfully deleted.';
		$this->getResponse()->setRedirect($url, 301);
	}
}

?>