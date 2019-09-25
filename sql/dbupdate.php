<#1>
<?php
// Fix ILIAS not automatic create job entry in jobs table, only if open the cron jobs GUI
\ilCronManager::createDefaultEntry(\srag\DIC\HelpMe\DICStatic::plugin(\ilHelpMeCronPlugin::class)->getPluginObject()
    ->getCronJobInstance(\srag\Plugins\HelpMe\Job\FetchJiraTicketsJob::CRON_JOB_ID), \ilHelpMeCronPlugin::PLUGIN_NAME, "Plugins", "");
?>
