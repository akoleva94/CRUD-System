<?php

class Default_IndexSuccessView extends countriesDefaultBaseView
{
	public function executeHtml(AgaviRequestDataHolder $rd)
	{
		$this->setupHtml($rd);
		
		$this->setAttribute('_title', 'Homepage');

	}
}

?>