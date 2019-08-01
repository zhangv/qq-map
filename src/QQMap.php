<?php
namespace zhangv\qq\map;


/**
 * Class QQMap
 * @package zhangv\qq\map
 * @author zhangv
 * @license MIT
 *
 * @method static service\District      District(string $key)
 * @method static service\Place         Place(string $key)
 * @method static service\GeoCoder      GeoCoder(string $key)
 * @method static service\Direction     Direction(string $key)
 * @method static service\Distance      Distance(string $key)
 * @method static service\Coordination  Coordination(string $key)
 * @method static service\Location      Location(string $key)
 * @method static service\StreetView    StreetView(string $key)
 * @method static service\StaticMap     StaticMap(string $key)
 */
class QQMap {
	public $key;
	public $httpClient;

	const ENDPOINT = "https://apis.map.qq.com/";

	/**
	 * @param $key string API密钥
	 */
	protected function __construct($key) {
		$this->key = $key;
		$this->httpClient = new HttpClient(5);
	}

	/**
	 * @param string $name
	 * @param string $config
	 * @return mixed
	 */
	private static function load($name, $config) {
		$service = __NAMESPACE__ . "\\service\\{$name}";
		return new $service($config);
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

	protected function get($url, $data = []) {
		$opts = [
			CURLOPT_SSL_VERIFYPEER => false,
			CURLOPT_SSL_VERIFYHOST => false,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_TIMEOUT => 10
		];
		$params = array_merge($data,['key'=>$this->key]);
		$content = $this->httpClient->get(self::ENDPOINT . $url,$params,$opts);
		if(!$content) throw new \Exception("Empty response");

		$json = json_decode($content);

		if($json->status !== 0){
			throw new \Exception("[$json->status]{$json->message}");
		}
		return empty($json->result)?empty($json->detail)?$json->data:$json->detail:$json->result;
	}
}