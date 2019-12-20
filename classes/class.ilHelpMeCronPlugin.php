<?php

require_once __DIR__ . "/../../../../UIComponent/UserInterfaceHook/HelpMe/vendor/autoload.php";
require_once __DIR__ . "/../vendor/autoload.php";

use srag\Plugins\HelpMe\Job\FetchJiraTicketsJob;
use srag\Plugins\HelpMe\Utils\HelpMeTrait;

/**
 * Class ilHelpMeCronPlugin
 *
 * @author studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
class ilHelpMeCronPlugin extends ilCronHookPlugin
{

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
     * @return string
     */
    public function getPluginName() : string
    {
        return self::PLUGIN_NAME;
    }


    /**
     * @return ilCronJob[]
     */
    public function getCronJobInstances() : array
    {
        return [new FetchJiraTicketsJob()];
    }


    /**
     * @param string $a_job_id
     *
     * @return ilCronJob|null
     */
    public function getCronJobInstance(/*string*/
        $a_job_id
    )/*: ?ilCronJob*/
    {
        switch ($a_job_id) {
            case FetchJiraTicketsJob::CRON_JOB_ID:
                return new FetchJiraTicketsJob();

            default:
                return null;
        }
    }
}
