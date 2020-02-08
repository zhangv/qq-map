<?php

namespace zhangv\qq\map\model;

class Marker {
	const SIZE_L = 'large', SIZE_M = 'mid', SIZE_S = 'small', SIZE_T = 'tiny';
	const COLOR_BLACK = 'black', COLOR_BROWN = 'brown', COLOR_GREEN = 'green',
		COLOR_PURPLE = 'purple', COLOR_YELLOW = 'yellow',COLOR_BLUE = 'blue',
		COLOR_GRAY = 'gray', COLOR_ORANGE = 'orange', COLOR_RED = 'red',COLOR_WHITE = 'white';
	/** @var string */
	public $color, $size,$label,$icon;
	/** @var array */
	public $locations;

	public function __construct($locations, $label = null, $color = self::COLOR_BLUE, $size = self::SIZE_M) {
		$this->locations = $locations;
		$this->label = $label;
		$this->color = $color;
		$this->size = $size;
	}

	public function __toString() {
		$locs = implode('|',$this->locations);
		$attrs = "color:{$this->color}|size:{$this->size}";
		if($this->label) $attrs .= "|{$this->label}";
		return "{$attrs}|$locs";
	}
}