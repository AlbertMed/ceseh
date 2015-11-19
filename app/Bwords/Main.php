<?php 
namespace Bwords;

class Main {
	

	static function getClientSoap(){
        $wsdl = "http://192.168.1.79:8036/DISCeseh.asmx?WSDL";
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