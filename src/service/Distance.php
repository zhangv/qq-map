<?php
/**
 * 距离计算
 * @link https://lbs.qq.com/webservice_v1/guide-distance.html
 */

namespace zhangv\qq\map\service;

use zhangv\qq\map\QQMap;

class Distance extends QQMap {
	const MODE_DRIVING = 'driving',MODE_WALKING = 'walking';
	public function getDistance($from,$to,$mode = self::MODE_DRIVING, $ext = []){
		return $this->get("ws/distance/v1",array_merge([
			'mode' => $mode,
			'from' => $from,
			'to' => $to
		],$ext));
	}

	/**
	 * @param $mode
	 * @param $from
	 * @param $to
	 * @param array $ext
	 * @return mixed
	 * @throws \Exception
	 * @link https://lbs.qq.com/webservice_v1/guide-distancematrix.html
	 */
	public function matrix($from,$to,$mode = self::MODE_DRIVING, $ext = []){
		return $this->get("ws/distance/v1/matrix",array_merge([
			'mode' => $mode,
			'from' => $from,
			'to' => $to
		],$ext));
	}


}