<?php
namespace Craft;

/**
 * Class ColdCachePlugin
 */
class ColdCachePlugin extends BasePlugin
{
	// Public Methods
	// =========================================================================

	public function getName()
	{
	    return 'Cold Cache';
	}

	public function getVersion()
	{
	    return '1.0';
	}

	public function getDeveloper()
	{
	    return 'Pixel & Tonic';
	}

	public function getDeveloperUrl()
	{
	    return 'http://pixelandtonic.com';
	}

	public function addTwigExtension()
	{
		Craft::import('plugins.coldcache.twigextensions.*');

		return new ColdCacheTwigExtension();
	}
}
