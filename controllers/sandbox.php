<?php
class SandboxController extends StudipController
{
    function before_filter(&$action, &$args)
    {
        parent::before_filter($action, $args);

        PageLayout::setTitle(_('Sandbox'));
        
        $this->set_layout($GLOBALS['template_factory']->open('layouts/base_without_infobox'));
    }

    function index_action()
    {
    }
}
