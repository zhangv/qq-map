<?php

namespace zhangv\qq\map;


/**
 * Class QQMap
 * @package zhangv\qq\map
 * @author zhangv
 * @license MIT
 *
 * @method static service\District      District($key,$secretKey = null)
 * @method static service\Place         Place($key,$secretKey = null)
 * @method static service\GeoCoder      GeoCoder($key,$secretKey = null)
 * @method static service\Direction     Direction($key,$secretKey = null)
 * @method static service\Distance      Distance($key,$secretKey = null)
 * @method static service\Coordination  Coordination($key,$secretKey = null)
 * @method static service\Location      Location($key,$secretKey = null)
 * @method static service\StreetView    StreetView($key,$secretKey = null)
 * @method static service\StaticMap     StaticMap($key,$secretKey = null)
 */
class QQMap {
	protected $key;
	protected $secretKey;
	protected $httpClient;

	const ENDPOINT = "https://apis.map.qq.com/";

	/**
	 * @param $key string API密钥
	 * @param $secretKey string 签名密钥
	 */
	protected function __construct($key, $secretKey = null) {
		$this->key = $key;
		$this->secretKey = $secretKey;
		$this->httpClient = new HttpClient(5);
	}

	/**
	 * @param string $name
	 * @param string $config
	 * @return mixed
	 */
	private static function load($name, $key, $secretKey = null) {
		$service = __NAMESPACE__ . "\\service\\{$name}";
		return new $service($key, $secretKey);
	}

	/**
	 * @param string $name
	 * @param array  $config
	 *
	 * @return mixed
	 */
	public static function __callStatic($name, $config) {
		return self::load($name, ...$config);
	}

	public function get($url, $data = []) {
		$opts = [
			CURLOPT_SSL_VERIFYPEER => false,
			CURLOPT_SSL_VERIFYHOST => false,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_TIMEOUT => 10
		];
		$params = array_merge($data, ['key' => $this->key]);

		if ($this->secretKey) {
			$signature = $this->createSignature($url, $params);
			$params['sig'] = $signature;
		}

		$content = $this->httpClient->get(self::ENDPOINT . $url, $params, $opts);
		if (!$content) throw new \Exception("Empty response");

		$json = json_decode($content);

		if ($json->status !== 0) {
			throw new \Exception("[$json->status]{$json->message}");
		}
		return empty($json->result) ? empty($json->detail) ? $json->data : $json->detail : $json->result;
	}

	protected function createSignature($url, $params) {
		ksort($params);
		$tmp = [];
		foreach ($params as $k => $v) {
			$tmp[] = "{$k}={$v}";
		}
		$tmp = implode('&', $tmp);
		$str = "/{$url}?{$tmp}{$this->secretKey}";
		return md5($str);
	}
}
