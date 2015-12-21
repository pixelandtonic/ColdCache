<?php
namespace Craft;

/**
 * Class ColdCachePlugin
 */
class ColdCachePlugin extends BasePlugin
{
	/**
	 * @return string
	 */
	public function getName()
	{
		return 'Cold Cache';
	}

	/**
	 * @return string
	 */
	public function getVersion()
	{
		return '1.1';
	}

	/**
	 * @return string
	 */
	public function getSchemaVersion()
	{
		return '1.0.0';
	}

	public function getDeveloper()
	{
		return 'Pixel & Tonic';
	}

	/**
	 * @return string
	 */
	public function getDeveloperUrl()
	{
		return 'http://pixelandtonic.com';
	}

	/**
	 * @return string
	 */
	public function getPluginUrl()
	{
		return 'https://github.com/pixelandtonic/ColdCache';
	}

	/**
	 * @return string
	 */
	public function getDocumentationUrl()
	{
		return $this->getPluginUrl().'/blob/master/README.md';
	}

	/**
	 * @return string
	 */
	public function getReleaseFeedUrl()
	{
		return 'https://raw.githubusercontent.com/pixelandtonic/ColdCache/master/releases.json';
	}

	/**
	 * @return ColdCacheTwigExtension
	 */
	public function addTwigExtension()
	{
		Craft::import('plugins.coldcache.twigextensions.*');
		return new ColdCacheTwigExtension();
	}
}
