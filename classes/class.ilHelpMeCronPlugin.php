<?php

require_once __DIR__ . "/../../../../UIComponent/UserInterfaceHook/HelpMe/vendor/autoload.php";
require_once __DIR__ . "/../vendor/autoload.php";

use srag\DIC\HelpMe\DICTrait;
use srag\Plugins\HelpMe\Utils\HelpMeTrait;

/**
 * Class ilHelpMeCronPlugin
 *
 * @author studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
class ilHelpMeCronPlugin extends ilCronHookPlugin
{

    use DICTrait;
    use HelpMeTrait;
    const PLUGIN_ID = "srsucron";
    const PLUGIN_NAME = "HelpMeCron";
    const PLUGIN_CLASS_NAME = ilHelpMePlugin::class;
    /**
     * @var self|null
     */
    protected static $instance = null;


    /**
     * @return self
     */
    public static function getInstance() : self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }


    /**
     * ilHelpMeCronPlugin constructor
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * @inheritDoc
     */
    public function getPluginName() : string
    {
        return self::PLUGIN_NAME;
    }


    /**
     * @inheritDoc
     */
    public function getCronJobInstances() : array
    {
        return self::helpMe()->jobs()->factory()->newInstances();
    }


    /**
     * @inheritDoc
     */
    public function getCronJobInstance(/*string*/ $a_job_id)/*: ?ilCronJob*/
    {
        return self::helpMe()->jobs()->factory()->newInstanceById($a_job_id);
    }
}
