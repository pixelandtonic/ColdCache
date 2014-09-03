<?php
namespace Craft;

/**
 * Class ColdCacheTwigExtension
 */
class ColdCacheTwigExtension extends \Twig_Extension
{
	// Public Methods
	// =========================================================================

	/**
	 * Returns the name of the extension.
	 *
	 * @return string The extension name
	 */
	public function getName()
	{
		return 'coldcache';
	}

	/**
	 * Returns the token parser instances to add to the existing list.
	 *
	 * @return array An array of Twig_TokenParserInterface or Twig_TokenParserBrokerInterface instances
	 */
	public function getTokenParsers()
	{
		return array(
			new ColdCache_TokenParser(),
		);
	}
}
