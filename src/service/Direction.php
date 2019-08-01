<?php
/**
 * 路线规划
 * @link https://lbs.qq.com/webservice_v1/guide-road.html
 */

namespace zhangv\qq\map\service;

use zhangv\qq\map\QQMap;

class Direction extends QQMap {
	const MODE_DRIVING = 'driving',MODE_WALKING = 'walking', MODE_BICYCLING = 'bicycling', MODE_TRANSIT = 'transit';

	/**
	 * 驾车（driving）路线规划
	 * @param $from
	 * @param $to
	 * @param array $ext
	 * @return mixed
	 * @throws \Exception
	 */
	public function driving($from,$to,$ext = []){
		return $this->get("ws/direction/v1/driving",array_merge([
			'from' => $from,
			'to' => $to
		],$ext));
	}

	public function walking($from,$to,$ext = []){
		return $this->get("ws/direction/v1/walking",array_merge([
			'from' => $from,
			'to' => $to
		],$ext));
	}

	public function bicycling($from,$to,$ext = []){
		return $this->get("ws/direction/v1/bicycling",array_merge([
			'from' => $from,
			'to' => $to
		],$ext));
	}

	public function transit($from,$to,$ext = []){
		return $this->get("ws/direction/v1/transit",array_merge([
			'from' => $from,
			'to' => $to
		],$ext));
	}

}