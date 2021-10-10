<?php

Class ParseXml extends Core
{
	private $xml;

	function __construct($xmlData = false)
	{
		if(!$xmlData)
			die("to instanciate the ".__CLASS__.", xml data must be provided");

		parent::__construct();

		$this->xml = $xmlData;
	}

	private function parseXml2Arr()
	{
		// Load xml string that return SimpleXMLObj
		$loaded = simplexml_load_string($this->xml,'SimpleXMLElement',LIBXML_NOWARNING | LIBXML_NOERROR);
		if(!$loaded)
			throw new UnexpectedValueException('Xml couldn\'t be loaded appropriately');

		// Convert the obj to json and decode it
		return json_decode(json_encode($loaded),1);
	}

	public function renderData()
	{
		$arr = $this->parseXml2Arr();
		$this->loadHelper('functions_helper');
		$this->render('result_view',$arr);
	}

}

