<?php
/**
 * 行政区划
 * @link https://lbs.qq.com/webservice_v1/guide-region.html
 */

namespace zhangv\qq\map\service;

use zhangv\qq\map\QQMap;

class Location extends QQMap {

	/**
	 * 通过终端设备IP地址获取其当前所在地理位置，精确到市级，常用于显示当地城市天气预报、初始化用户城市等非精确定位场景。
	 */
	public function ip($ip,$ext = []){
		return $this->get("ws/location/v1/ip",array_merge([
			'ip' => $ip
		],$ext));
	}

}