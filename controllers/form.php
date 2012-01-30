<?
class FormController extends AppController
{
    function before_filter(&$action, &$args) {
        parent::before_filter($action, $args);

        PageLayout::setTitle(_('Sandbox'));
        Navigation::activateItem('/sandbox/form');

        $this->set_layout($GLOBALS['template_factory']->open('layouts/base_without_infobox'));
    }

    function index_action()
    {
    }
}
