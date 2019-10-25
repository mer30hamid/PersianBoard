<?php

namespace Kanboard\Plugin\PersianBoard;

use Kanboard\Core\Plugin\Base;
use Kanboard\Core\Translator;

class Plugin extends Base
{
    public function initialize()
    {
        if ($this->languageModel->getCurrentLanguage() == "fa_IR") {
            $this->hook->on("template:layout:css", array("template" => "plugins/PersianBoard/Assets/css/default_rtl.css"));
            $this->hook->on("template:layout:css", array("template" => "plugins/PersianBoard/Assets/css/persian-datepicker.min.css"));
            $this->hook->on("template:layout:js", array("template" => "plugins/PersianBoard/Assets/js/persian-date.min.js"));
            $this->hook->on("template:layout:js", array("template" => "plugins/PersianBoard/Assets/js/persian-datepicker.min.js"));
            $this->hook->on("template:layout:js", array("template" => "plugins/PersianBoard/Assets/js/PersianBoard.js"));
        }
    }

    public function onStartup()
    {

        Translator::load($this->languageModel->getCurrentLanguage(), __DIR__ . '/Locale');
    }

    public function getPluginName()
    {
        return 'Persian Board';
    }

    public function getPluginDescription()
    {
        return t('Make Kanboard compatible with Iranian Calendar (Persian or jalali Calendar) and support RTL (Right To Left) direction');
    }

    public function getPluginAuthor()
    {
        return 'Hamid Kurd';
    }

    public function getPluginVersion()
    {
        return '0.1.0';
    }

    public function getCompatibleVersion()
    {
        return '>1.2.11';
    }

    public function getPluginHomepage()
    {
        return 'https://github.com/mer30hamid/PersianBoard';
    }
}