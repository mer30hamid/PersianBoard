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
            if (array_key_exists("WeKanboard", $this->pluginLoader->getPlugins())) {
                $this->hook->on("template:layout:css", array("template" => "plugins/PersianBoard/Assets/css/WeKanboard_rtl.css"));
            }
        }
    }

   public function onstartup()
   {
        //translator::load($this->languagemodel->getcurrentlanguage(), __dir__ . '/locale');
        if($this->dateParser->getUserDateFormat() != 'Y/m/d'){
            $this->flash->failure('Persian Board plugin Error - Date Format : ' . $this->dateParser->getUserDateFormat(). " please change it to: Y/m/d");
        }
        elseif($this->languageModel->getCurrentLanguage() != 'fa_IR'){
            $this->flash->failure('Persian Board plugin Error - to use this plugin you must change language to "ÙØ§Ø±Ø³ÛŒ"' );
        }
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
        return 'Hamid Kord';
    }

    public function getPluginVersion()
    {
        return '1.0.1';
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