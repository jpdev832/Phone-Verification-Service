<?php
include_once './config_verify.php';

class CarrierHelper {
	private static $networkAdresses = array( 
		"3 River Wireless" => "sms.3rivers.net",
		"ACS Wireless" => "paging.acswireless.com",
		"Alltel" => "message.alltel.com",
		"AT&T" => "txt.att.net",
		"Bell Canada" => "txt.bellmobility.ca",
		"Bell Canada" => "bellmobility.ca",
		"Bell Mobility (Canada)" => "txt.bell.ca",
		"Bell Mobility" => "txt.bellmobility.ca",
		"Blue Sky Frog" => "blueskyfrog.com",
		"Bluegrass Cellular" => "sms.bluecell.com",
		"Boost Mobile" => "myboostmobile.com",
		"BPL Mobile" => "bplmobile.com",
		"Carolina West Wireless" => "cwwsms.com",
		"Cellular One" => "mobile.celloneusa.com",
		"Cellular South" => "csouth1.com",
		"Centennial Wireless" => "cwemail.com",
		"CenturyTel" => "messaging.centurytel.net",
		"Cingular (Now AT&T)" => "txt.att.net",
		"Clearnet" => "msg.clearnet.com",
		"Comcast" => "comcastpcs.textmsg.com",
		"Corr Wireless Communications" => "corrwireless.net",
		"Dobson" => "mobile.dobson.net",
		"Edge Wireless" => "sms.edgewireless.com",
		"Fido" => "fido.ca",
		"Golden Telecom" => "sms.goldentele.com",
		"Helio" => "messaging.sprintpcs.com",
		"Houston Cellular" => "text.houstoncellular.net",
		"Idea Cellular" => "ideacellular.net",
		"Illinois Valley Cellular" => "ivctext.com",
		"Inland Cellular Telephone" => "inlandlink.com",
		"MCI" => "pagemci.com",
		"Metrocall" => "page.metrocall.com",
		"Metrocall 2-way" => "my2way.com",
		"Metro PCS" => "mymetropcs.com",
		"Microcell" => "fido.ca",
		"Midwest Wireless" => "clearlydigital.com",
		"Mobilcomm" => "mobilecomm.net",
		"MTS" => "text.mtsmobility.com",
		"Nextel" => "messaging.nextel.com",
		"OnlineBeep" => "onlinebeep.net",
		"PCS One" => "pcsone.net",
		"President's Choice" => "txt.bell.ca",
		"Public Service Cellular" => "sms.pscel.com",
		"Qwest" => "qwestmp.com",
		"Rogers AT&T Wireless" => "pcs.rogers.com",
		"Rogers Canada" => "pcs.rogers.com",
		"Satellink" => "satellink.net",
		"Solo Mobile" => "txt.bell.ca",
		"Southwestern Bell" => "email.swbw.com",
		"Sprint" => "messaging.sprintpcs.com",
		"Sumcom" => "tms.suncom.com",
		"Surewest Communicaitons" => "mobile.surewest.com",
		"T-Mobile" => "tmomail.net",
		"Telus" => "msg.telus.com",
		"Tracfone" => "txt.att.net",
		"Triton" => "tms.suncom.com",
		"Unicel" => "utext.com",
		"US Cellular" => "email.uscc.net",
		"US West" => "uswestdatamail.com",
		"Verizon" => "vtext.com",
		"Virgin Mobile" => "vmobl.com",
		"Virgin Mobile Canada" => "vmobile.ca",
		"West Central Wireless" => "sms.wcc.net",
		"Western Wireless" => "cellularonewest.com" );
		
	function __construct() {}
	
	public function getNetworkDomain($network)
	{
		return self::$networkAdresses[$network];
	}
	
	public function getNetworkId($network)
	{
		return array_search($network, array_keys(self::$networkAdresses));
	}
}

?>