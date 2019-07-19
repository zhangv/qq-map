<?php
/**
 * 行政区划
 * @link https://lbs.qq.com/webservice_v1/guide-region.html
 */

namespace zhangv\qq\map\service;

use zhangv\qq\map\QQMap;

class Distance extends QQMap {

	public function getDistance($mode,$from,$to,$ext = []){
		return $this->get("ws/distance/v1",array_merge([
			'mode' => $mode,
			'from' => $from,
			'to' => $to
		],$ext));
	}

	public function matrix($mode,$from,$to,$ext = []){
		return $this->get("ws/distance/v1/matrix",array_merge([
			'mode' => $mode,
			'from' => $from,
			'to' => $to
		],$ext));
	}


}