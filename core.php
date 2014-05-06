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

	$apiKey = "5fac3e93c05bc557b45e4ab4843b7882";
	$lastfm = new LastFM($apiKey);
	$userID = 'PatBateman75';
	$tracks = $lastfm->getRecentTracks('PatBateman75');

?>