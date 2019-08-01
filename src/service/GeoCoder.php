<?php
/**
 * 地址解析
 */

namespace zhangv\qq\map\service;

use zhangv\qq\map\QQMap;

class GeoCoder extends QQMap {

	/**
	 * 输入坐标返回地理位置信息和附近poi列表
	 * @link https://lbs.qq.com/webservice_v1/guide-gcoder.html
	 */
	public function getByLocation($latlng){
		return $this->get("ws/geocoder/v1/",['location' => $latlng]);
	}

	/**
	 * 由地址描述到所述位置坐标的转换
	 * @link https://lbs.qq.com/webservice_v1/guide-geocoder.html
	 */
	public function getByAddress($address){
		return $this->get("ws/geocoder/v1/",['address' => $address]);
	}

}