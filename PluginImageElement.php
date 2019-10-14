<?php
class PluginImageElement{
  public function widget_render($data){
    wfPlugin::includeonce('wf/array');
    $data = new PluginWfArray(array_merge(array('style' => 'width:30px'), $data['data']));
    $data->set('exist', false);
    $filename = wfGlobals::getWebDir().$data->get('path');
    if(wfFilesystem::fileExist($filename)){
      $data->set('exist', true);
      $element = array();
      $element[] = wfDocument::createHtmlElement('img', null, array('src' => $data->get('path'), 'style' => $data->get('style')));
      wfDocument::renderElement($element);
    }
  }
}