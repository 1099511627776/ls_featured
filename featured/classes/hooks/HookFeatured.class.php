<?php

class PluginFeatured_HookFeatured extends Hook {

    /*
     * Регистрация событий на хуки
	*/
    public function RegisterHook() {
        $this->AddHook('template_featured_topics', 'displayTopics',__CLASS__);
    }
	
	public function displayTopics(){
		$aTopics = array();
		if($pages_featured = Config::Get('plugin.featured.pages')){
			$aFilter = array('order'=>'topic_rating DESC','topic_publish'=>1);
			$aAllTopics = $this->Topic_GetTopicsByFilter($aFilter,1,$pages_featured * 2);
			$aTopics = $aAllTopics['collection'];
		} else {
			if($featured_topics = Config::Get('plugin.featured.featured')){
				foreach($featured as $fId){
					if($oTopic = $this->Topic_GetTopicById($fId)){
						$aTopics[] = $oTopic;
					}
				}
			}
		}
		$this->Viewer_Assign('aTopics',$aTopics);
		$s = $this->Viewer_Fetch(Plugin::GetTemplatePath('featured').'featured.tpl');
        return $s;
   }
}
?>
