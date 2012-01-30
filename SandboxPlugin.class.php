<?php
require_once 'vendor/trails/trails.php';
require_once 'app/controllers/studip_controller.php';

require_once 'controllers/app_controller.php';

/**
 * SandboxPlugin.class.php
 *
 * @author  Jan-Hendrik Willms <tleilax+studip@gmail.com>
 * @version 0.4
 */

class SandboxPlugin extends StudIPPlugin implements SystemPlugin {

    function __construct() {
        parent::__construct();

        $navigation = new AutoNavigation('Sandbox');
        $navigation->setURL(PluginEngine::getURL($this, array(), 'sandbox/index'));
        $navigation->setImage('blank.gif');
        Navigation::addItem('/sandbox', $navigation);

        $navigation = new AutoNavigation('Sandbox');
        $navigation->setURL(PluginEngine::getURL($this, array(), 'sandbox/index'));
        Navigation::addItem('/sandbox/index', $navigation);
        
        # JS: Modal dialogs
        $navigation = new AutoNavigation('JS: Modal');
        $navigation->setURL(PluginEngine::getURL($this, array(), 'modal/index'));
        Navigation::addItem('/sandbox/modal', $navigation);

        # CSS: Form framwork
        $navigation = new AutoNavigation('CSS: Form framework');
        $navigation->setURL(PluginEngine::getURL($this, array(), 'form/index'));
        Navigation::addItem('/sandbox/form', $navigation);

        $this->addSASS('studip-form');
        $this->addCoffeescript('studip-form');
    }

    function initialize () {
    }

    function perform($unconsumed_path) {
        $dispatcher = new Trails_Dispatcher(
            $this->getPluginPath(),
            rtrim(PluginEngine::getLink($this, array(), null), '/'),
            'sandbox'
        );
        $dispatcher->plugin = $this;
        $dispatcher->dispatch($unconsumed_path);
    }

    protected function addCoffeescript($script, $extension = '.coffee') {
        $script = basename($script, $extension) . $extension;
        PageLayout::addHeadElement('script', array(
            'src'  => $this->getPluginURL() . '/assets/' . $script,
            'type' => 'text/coffeescript'
        ), '');
    }

    protected function addSASS($stylesheet, $extension = '.sass') {
        $stylesheet = basename($stylesheet, $extension) . $extension;
        PageLayout::addHeadElement('link', array(
            'rel'  => 'stylesheet',
            'href' => $this->getPluginURL() . '/assets/' . $stylesheet
        ));
    }
}
