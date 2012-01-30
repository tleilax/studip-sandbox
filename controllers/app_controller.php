<?
class AppController extends StudipController
{    
    protected function addCoffeescript($script, $extension = '.coffee') {
        $script = basename($script, $extension) . $extension;
        PageLayout::addHeadElement('script', array(
            'src'  => $this->dispatcher->plugin->getPluginURL() . '/assets/' . $script,
            'type' => 'text/coffeescript'
        ), '');
    }

    protected function addSASS($stylesheet, $extension = '.sass') {
        $stylesheet = basename($stylesheet, $extension) . $extension;
        PageLayout::addHeadElement('link', array(
            'rel'  => 'stylesheet',
            'href' => $this->dispatcher->plugin->getPluginURL() . '/assets/' . $stylesheet
        ));
    }
}