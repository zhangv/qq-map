<?php
/**
 * 街景静态图
 * @link https://lbs.qq.com/panostatic_v1/guide-adsorb.html
 */

namespace zhangv\qq\map\service;

use zhangv\qq\map\QQMap;

class StreetView extends QQMap {

	/**
	 * 根据坐标或地址名称获取
	 * @param $location
	 * @param string $size
	 * @param array $ext
	 * @return mixed
	 * @throws \Exception
	 */
	public function getImageByLocation($location,$size='138x187',$ext = []){
		return $this->get("ws/streetview/v1/image",array_merge([
			'location' => $location,
			'size' => $size,
		],$ext));
	}

	/**
	 * 根据街景的场景ID获取
	 * @param $panoId
	 * @param string $size
	 * @param array $ext
	 * @return mixed
	 * @throws \Exception
	 */
	public function getImageByPanoId($panoId,$size='138x187',$ext = []){
		return $this->get("ws/streetview/v1/image",array_merge([
			'pano' => $panoId,
			'size' => $size,
		],$ext));
	}

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