<?php
/**
 * 行政区划
 * @link https://lbs.qq.com/webservice_v1/guide-region.html
 */

namespace zhangv\qq\map\service;

use zhangv\qq\map\QQMap;

class Coordination extends QQMap {

	/**
	 * 实现从其它地图供应商坐标系或标准GPS坐标系，批量转换到腾讯地图坐标系。
	 */
	public function translate($locations,$type,$ext = []){
		return $this->get("ws/coord/v1/translate",array_merge([
			'locations' => $locations,
			'type' => $type
		],$ext));
	}

}