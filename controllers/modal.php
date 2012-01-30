<?
class ModalController extends AppController
{
    function before_filter(&$action, &$args) {
        parent::before_filter($action, $args);
        
        PageLayout::setTitle(_('Sandbox'));
        $this->set_layout($GLOBALS['template_factory']->open('layouts/base_without_infobox'));

        $this->addCoffeescript('studip-modal');
    }

    function index_action()
    {
    }
    
    function example_action($index = 0)
    {
        $this->render_template('modal/example' . $index);
    }
}
