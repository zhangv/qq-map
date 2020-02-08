<?php

namespace zhangv\qq\map\model;

class Path {
	const SIZE_L = 'large', SIZE_M = 'mid', SIZE_S = 'small', SIZE_T = 'tiny';
	const COLOR_BLACK = 'black', COLOR_BROWN = 'brown', COLOR_GREEN = 'green',
		COLOR_PURPLE = 'purple', COLOR_YELLOW = 'yellow',COLOR_BLUE = 'blue',
		COLOR_GRAY = 'gray', COLOR_ORANGE = 'orange', COLOR_RED = 'red',COLOR_WHITE = 'white';
	/** @var string */
	public $color, $weight;
	/** @var array */
	public $locations;//经纬度或名称

	public function __construct($locations, $weight = 3, $color = self::COLOR_BLUE) {
		$this->locations = $locations;
		$this->weight = $weight;
		$this->color = $color;
	}

	public function __toString() {
		$locs = implode('|',$this->locations);
		$styles = "color:{$this->color}|weight:{$this->weight}";
		return "{$styles}|$locs";
	}
}