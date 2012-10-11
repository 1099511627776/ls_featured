<?php

class PluginFeatured_HookFeatured extends Hook {

    /*
     * Регистрация событий на хуки
	*/
    public function RegisterHook() {
        $this->AddHook('template_featured_topics', 'displayTopics',__CLASS__);
    }
	
	public function displayTopics(){
		$featured = Config::Get('plugin.featured.featured');
		$aTopics = array();
		if($featured) {
			foreach($featured as $fId){
				if($oTopic = $this->Topic_GetTopicById($fId)){
					$aTopics[] = $oTopic;
				}
			}
		}
		$this->Viewer_Assign('aTopics',$aTopics);
		$s = $this->Viewer_Fetch(Plugin::GetTemplatePath('featured').'featured.tpl');
        return $s;
	}
}
?>
