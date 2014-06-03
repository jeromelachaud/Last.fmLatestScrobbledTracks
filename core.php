<?php

class LastFM {
	
	public $apiKey;

	function __construct($api){
		$this->apiKey = $api;
	}

	function getRecentTracks($user){
		$curl = curl_init("http://ws.audioscrobbler.com/2.0/?method=user.getrecenttracks&user=$user&api_key=".$this->apiKey." ");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_HEADER, 0);
		curl_setopt($curl, CURLOPT_TIMEOUT, 3);
		$data = curl_exec($curl);
		curl_close($curl);
		$xml = new SimpleXmlElement($data);
		return $xml->recenttracks;
	}
}

	$apiKey = "your_api_key_here";
	$lastfm = new LastFM($apiKey);
	$userID = 'your_lastfm_id_here';
	$tracks = $lastfm->getRecentTracks('your_lastfm_id_here');

?>
