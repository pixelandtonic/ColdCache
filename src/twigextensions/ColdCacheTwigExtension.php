<?php
namespace craft\coldcache\twigextensions;
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
	public function getName(): string
	{
		return 'coldcache';
	}

	/**
	 * Returns the token parser instances to add to the existing list.
	 *
	 * @return array An array of Twig_TokenParserInterface or Twig_TokenParserBrokerInterface instances
	 */
	public function getTokenParsers(): array
	{
		return array(
			new ColdCache_TokenParser(),
		);
	}
}
