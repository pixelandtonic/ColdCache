<?php

namespace craft\coldcache;

use Craft;
use craft\coldcache\twigextensions\ColdCacheTwigExtension;

/**
 * Class ColdCachePlugin
 */
class Plugin extends \craft\base\Plugin
{
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // Add in our Twig extensions
        Craft::$app->view->twig->addExtension(new ColdCacheTwigExtension());
    }
}
