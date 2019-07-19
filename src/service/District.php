<?php
/**
 * 行政区划
 * @link https://lbs.qq.com/webservice_v1/guide-region.html
 */

namespace zhangv\qq\map\service;

use zhangv\qq\map\QQMap;

class District extends QQMap {

	/**
	 * 获取全部行政区划数据
	 */
	public function listAll(){
		return $this->get("ws/district/v1/list");
	}

	/**
	 * 获取指定行政区划的子级行政区划
	 */
	public function getChildren($id){
		return $this->get("ws/district/v1/getchildren",['id' => $id]);
	}

	/**
	 * 根据关键词搜索行政区划
	 */
	public function search($keyword){
		return $this->get("ws/district/v1/search",['keyword' => $keyword]);
	}
}