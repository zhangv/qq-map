<?php
/**
 * 静态图
 * @link https://lbs.qq.com/static_v2/guide-getImage.html
 */

namespace zhangv\qq\map\service;

use zhangv\qq\map\model\Label;
use zhangv\qq\map\model\Marker;
use zhangv\qq\map\model\Path;
use zhangv\qq\map\QQMap;

class StaticMap extends QQMap {
	const TYPE_ROADMAP = 'roadmap', //普通路网
		TYPE_SATELLITE = 'satellite', //卫星
		TYPE_LANDFORM = 'landform', //地形图
		TYPE_TERRAIN = 'terrain', //地形叠加路网
		TYPE_HYBRID = 'hybrid'; //卫星叠加路网
	const SCALE_HIGHRES = '2', //高清
		SCALE_NORMAL = '1'; //普清
	const FORMAT_PNG = 'png', FORMAT_PNG8 = 'png8', FORMAT_GIF = 'gif', FORMAT_JPG = 'jpg';

	/**
	 * 根据中心点获取地图
	 * @param $center
	 * @param string $size
	 * @param int $zoom
	 * @param string $format
	 * @param string $scale
	 * @param string $type
	 * @param array|Marker $markers [ [color,size,label,[latlng]] ]
	 * @param array|Label $labels [ name|latlng => [border,size,color,bgcolor,anchor, offset]]
	 * @param array|Path $path [color,weight, [ latlng]
	 * @return mixed
	 * @throws \Exception
	 */
	public function getByCenter($center,$size = "600x300", $zoom = 10,
	                            $format = self::FORMAT_PNG, $scale = self::SCALE_NORMAL,
	                            $type = self::TYPE_ROADMAP,
	                            $markers = [],$labels = [],$path = null){
		if($center){
			if($zoom < 4 || $zoom > 18) throw new \Exception('Zoom should between 4 and 18 (inclusive) ');
			if($zoom === 18 && $type !== self::TYPE_ROADMAP) throw new \Exception("Zoom(18) can only be shown when the type is [roadmap]");
		}

//		$markersArray = $this->buildMarkers($markers);
//		$labelsArray = $this->buildLabels($labels);
//		$path = $this->buildPath($path);
		return $this->buildURL([
			'center' => $center,
			'zoom' => $zoom,
			'size' => $size,
			'scale' => $scale,
			'type' => $type,
			'format' => $format,
			'markers' => $markers,
			'labels' => $labels,
			'path' => $path
		]);
	}

	public function getByBounds($swLatlng,$neLatlng,$size = "600x300",
	                            $format = self::FORMAT_PNG, $scale = self::SCALE_NORMAL,
	                            $type = self::TYPE_ROADMAP,
	                            $markers = [],$labels = [],$path = null){
		return $this->buildURL([
			'bounds' => "$swLatlng;$neLatlng",
			'size' => $size,
			'scale' => $scale,
			'type' => $type,
			'format' => $format,
			'markers' => $markers,
			'labels' => $labels,
			'path' => $path
		]);
	}


	private function buildURL($params){
		var_dump($params);
		$r = [];
		foreach($params as $n => $v){
			if(!$v) continue;
			if(is_array($v)){
				foreach($v as $vv){
					$tmp = (string)$vv;
					$r[] = "$n=$tmp";
				}
			}else{
				$r[] = "$n=$v";
			}
		}
		$s = self::ENDPOINT . "ws/staticmap/v2/?key={$this->key}&" . implode('&',$r);
		return $s;
	}

}