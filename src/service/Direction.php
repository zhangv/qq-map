<?php
/**
 * 路线规划
 * @link https://lbs.qq.com/webservice_v1/guide-road.html
 */

namespace zhangv\qq\map\service;

use zhangv\qq\map\QQMap;

class Direction extends QQMap {
	const MODE_DRIVING = 'driving',MODE_WALKING = 'walking', MODE_BICYCLING = 'bicycling', MODE_TRANSIT = 'transit';

	public function getDirection($from,$to,$type,$ext = []){
		return $this->get("ws/direction/v1/$type",array_merge([
			'from' => $from,
			'to' => $to
		],$ext));
	}
	/**
	 * 驾车路线规划
	 * @param $from
	 * @param $to
	 * @param array $ext
	 * @return mixed
	 * @throws \Exception
	 */
	public function driving($from,$to,$ext = []){
		return $this->getDirection($from,$to,self::MODE_DRIVING);
	}

	/**
	 * 步行路线规划
	 * @param $from
	 * @param $to
	 * @param array $ext
	 * @return mixed
	 * @throws \Exception
	 */
	public function walking($from,$to,$ext = []){
		return $this->getDirection($from,$to,self::MODE_WALKING);
	}

	/**
	 * 骑行路线规划
	 * @param $from
	 * @param $to
	 * @param array $ext
	 * @return mixed
	 * @throws \Exception
	 */
	public function bicycling($from,$to,$ext = []){
		return $this->getDirection($from,$to,self::MODE_BICYCLING);
	}

	/**
	 * 公共交通路线规划
	 * @param $from
	 * @param $to
	 * @param array $ext
	 * @return mixed
	 * @throws \Exception
	 */
	public function transit($from,$to,$ext = []){
		return $this->getDirection($from,$to,self::MODE_TRANSIT);
	}

}