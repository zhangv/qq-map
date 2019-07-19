<?php
/**
 * 行政区划
 * @link https://lbs.qq.com/webservice_v1/guide-region.html
 */

namespace zhangv\qq\map\service;

use zhangv\qq\map\QQMap;

class StreetView extends QQMap {

	/**
	 * 根据ID获取
	 */
	public function getById($id,$ext = []){
		return $this->get("ws/streetview/v1/getpano",array_merge([
			'id' => $id
		],$ext));
	}

	/**
	 * 根据位置坐标获取
	 */
	public function getByLocation($location,$ext = []){
		return $this->get("ws/streetview/v1/getpano",array_merge([
			'location' => $location
		],$ext));
	}

	/**
	 * 根据ID获取
	 */
	public function getByPOI($poi,$ext = []){
		return $this->get("ws/streetview/v1/getpano",array_merge([
			'poi' => $poi
		],$ext));
	}

}