<?php
/**
 * 地点
 */

namespace zhangv\qq\map\service;

use zhangv\qq\map\QQMap;

class Place extends QQMap {

	/**
	 * 地点搜索
	 * @link https://lbs.qq.com/webservice_v1/guide-search.html
	 * @param $keyword
	 * @param $boundary https://lbs.qq.com/webservice_v1/guide-search.html#boundary_detail
	 * @param null $filter https://lbs.qq.com/webservice_v1/guide-search.html#filter_detail
	 * @param null $orderBy
	 * @param null $pageSize
	 * @param null $pageIndex
	 * @param null $output
	 * @param null $callback
	 * @return mixed
	 * @throws \Exception
	 */
	public function search($keyword,$boundary,$filter = null,$orderBy = null,$pageSize = null,$pageIndex = null,$output = null,$callback = null){
		return $this->get("ws/place/v1/search",[
			'keyword' => $keyword,
			'boundary' => $boundary,
			'filter' => $filter,
			'orderBy' => $orderBy,
			'pageSize' => $pageSize,
			'pageIndex' => $pageIndex,
			'output' => $output,
			'callback' => $callback,
		]);
	}

	/**
	 * 搜索提示
	 * @link https://lbs.qq.com/webservice_v1/guide-suggestion.html
	 * @param $keyword
	 * @param $region
	 * @param array $ext
	 * @return mixed
	 * @throws \Exception
	 */
	public function suggestion($keyword,$region,$ext = []){
		return $this->get("ws/place/v1/suggestion",array_merge([
			'keyword' => $keyword,
			'region' => $region,
		],$ext));
	}

}