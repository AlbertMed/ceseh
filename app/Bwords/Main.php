<?php 
namespace Bwords;

class Main {
	

	static function getClientSoap(){
        $wsdl = "http://187.188.85.203:8036/Sample.asmx?WSDL";
		$client = new \nusoap_client($wsdl, true);
		return $client;
	}

	static function getId(){
		/* Obtener el id  Session*/
        $client = Main::getClientSoap();
		$idLogin = $client->call('Login');
		$ID = $idLogin['LoginResult']."";
        return $ID;
	}
	
}

?>