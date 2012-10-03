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
		foreach($featured as $fId){
			$aTopics[] = $this->Topic_GetTopicById($fId);
		}
		$this->Viewer_Assign('aTopics',$aTopics);
/*		print "<pre>";
			print_r($aTopics);
		print "</pre>";*/
		$s = $this->Viewer_Fetch(Plugin::GetTemplatePath('featured').'featured.tpl');
        return $s;
	}
}
?>
