<?php

namespace Bagus\SiCepat;

use Requests;

class SiCepat
{

	private $api_key;
	private $url;

	public function __construct($api_key, $url)
	{
		$this->api_key = $api_key;
		$this->url = $url;
		return $this;
	}

	public function origin()
	{
		$url = $this->url . '/customer/origin';
		$response = Requests::get($url, $this->_getHeader());
		if (isset($response->body)) {
			return json_decode($response->body);
		}
	}

	public function destination()
	{
		$url = $this->url . '/customer/destination';
		$response = Requests::get($url, $this->_getHeader());
		if (isset($response->body)) {
			return json_decode($response->body);
		}
	}

	public function tarif($args = [])
	{
		$url = $this->url . '/customer/tariff?' . http_build_query($args);
		$response = Requests::get($url, $this->_getHeader());
		if (isset($response->body)) {
			return json_decode($response->body);
		}
	}

	public function waybill($waybill)
	{
		$url = $this->url . '/customer/waybill?waybill=' . $waybill;
		$response = Requests::get($url, $this->_getHeader());
		if (isset($response->body)) {
			return json_decode($response->body);
		}
	}

	public function waybillNumber($waybillNumber)
	{
		$url = $this->url . '/customer/waybillNumber?orderId=' . $waybillNumber;
		$response = Requests::get($url, $this->_getHeader());
		if (isset($response->body)) {
			return json_decode($response->body);
		}
	}

	private function _getHeader()
	{
		return [
			'api-key' => $this->api_key,
		];
	}

}