<?php
/**
 * 行政区划
 * @link https://lbs.qq.com/webservice_v1/guide-region.html
 */

namespace zhangv\qq\map\service;

use zhangv\qq\map\QQMap;

class GeoCoder extends QQMap {

	/**
	 * 输入坐标返回地理位置信息和附近poi列表
	 */
	public function location($latlng){
		return $this->get("ws/geocoder/v1/",['location' => $latlng]);
	}

	/**
	 * 由地址描述到所述位置坐标的转换
	 */
	public function address($address){
		return $this->get("ws/geocoder/v1/",['address' => $address]);
	}

}