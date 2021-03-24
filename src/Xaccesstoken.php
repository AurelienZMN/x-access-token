<?php

/**
 * x-access-token plugin for Craft CMS 3.x
 *
 * Craft CMS plugin to add 'x-access-token' Authentification capability

 *
 * @link      https://github.com/AurelienZMN
 * @copyright Copyright (c) 2021 Aurelien Zimmermann
 */

namespace aurelienzmn\xaccesstoken;


use Craft;
use craft\base\Plugin;
use craft\services\Plugins;
use craft\events\PluginEvent;
use craft\services\Gql;
use yii\base\Event;


/**
 * Class Xaccesstoken
 *
 * @author    Aurelien Zimmermann
 * @package   Xaccesstoken
 * @since     0.0.1
 *
 */
class Xaccesstoken extends Plugin
{
    // Static Properties
    // =========================================================================

    /**
     * @var Xaccesstoken
     */
    public static $plugin;

    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public $schemaVersion = '0.0.1';

    /**
     * @var bool
     */
    public $hasCpSettings = false;

    /**
     * @var bool
     */
    public $hasCpSection = false;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {

        parent::init();
        self::$plugin = $this;


        Event::on(
            Gql::class,
            Gql::EVENT_BEFORE_EXECUTE_GQL_QUERY,
            function () {
                $request = Craft::$app->getRequest();
                $requestHeaders = $request->getHeaders();
                // $accessToken = $requestHeaders['x-access-token'];
                // $requestHeaders->set('Authorization', $accessToken);
            }
        );

        Event::on(
            Plugins::class,
            Plugins::EVENT_AFTER_INSTALL_PLUGIN,
            function (PluginEvent $event) {
                if ($event->plugin === $this) {
                }
            }
        );

        Craft::info(
            Craft::t(
                'x-access-token',
                '{name} plugin loaded',
                ['name' => $this->name]
            ),
            __METHOD__
        );
    }

    // Protected Methods
    // =========================================================================

}
