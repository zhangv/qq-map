<?php

namespace zhangv\qq\map\model;

class Label {
	const BORDER_Y = 1, BORDER_N = 0;
	const SIZE_S = 'small', SIZE_T = 'tiny';
	const COLOR_BLACK = 'black', COLOR_BROWN = 'brown', COLOR_GREEN = 'green',
		COLOR_PURPLE = 'purple', COLOR_YELLOW = 'yellow',COLOR_BLUE = 'blue',
		COLOR_GRAY = 'gray', COLOR_ORANGE = 'orange', COLOR_RED = 'red',COLOR_WHITE = 'white';
	/** @var string */
	public $color, $size,$bgColor,$border,$anchor,$offset;
	/** @var array */
	public $locations;

	public function __construct($locations, $color = self::COLOR_BLACK
		, $bgColor = self::COLOR_WHITE, $anchor = 0, $border = 1, $offset = '0_0', $size = 12) {
		$this->locations = $locations;
		$this->bgColor = $bgColor;
		$this->color = $color;
		$this->size = $size;
		$this->anchor = $anchor;
		$this->offset = $offset;
		$this->border = $border;
	}

	public function __toString() {
		$tmp = [];
		foreach($this->locations as $name => $latlng){
			$tmp[] = "$name|$latlng";
		}
		$locs = implode('|',$tmp);
		$tmp = [];
		if($this->color) $tmp[] =  "color:{$this->color}";
		if($this->size) $tmp[] =  "size:{$this->size}";
		if($this->border) $tmp[] =  "border:{$this->border}";
		if($this->bgColor) $tmp[] =  "bgcolor:{$this->bgColor}";
		if($this->anchor) $tmp[] =  "anchor:{$this->anchor}";
		if($this->offset) $tmp[] =  "offset:{$this->offset}";
		$styles = implode('|',$tmp);
		return "{$styles}|$locs";
	}
}