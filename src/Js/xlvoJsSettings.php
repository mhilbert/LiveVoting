<?php

namespace LiveVoting\Js;

use ilLiveVotingPlugin;
use srag\DIC\DICTrait;

/**
 * Class xlvoJsSettings
 *
 * @package LiveVoting\Js
 * @author  Fabian Schmid <fs@studer-raimann.ch>
 */
class xlvoJsSettings {

	use DICTrait;
	const PLUGIN_CLASS_NAME = ilLiveVotingPlugin::class;
	/**
	 * @var array
	 */
	protected $settings = array();
	/**
	 * @var array
	 */
	protected $translations = array();


	/**
	 *
	 */
	public function __construct() {

	}


	/**
	 * @param string $name
	 * @param mixed  $value
	 */
	public function addSetting($name, $value) {
		$this->settings[$name] = $value;
	}


	/**
	 * @param string $key
	 */
	public function addTranslation($key) {
		$this->translations[$key] = self::translate($key);
	}


	/**
	 * @return string
	 */
	public function asJson() {
		$arr = array();
		foreach ($this->settings as $name => $value) {
			$arr[$name] = $value;
		}

		foreach ($this->translations as $key => $string) {
			$arr['lng'][$key] = $string;
		}

		return json_encode($arr);
	}
}