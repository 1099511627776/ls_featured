<?php
function cmpTopicDate($oTopic_a,$oTopic_b){
	return strtotime($oTopic_b->getDateAdd())-strtotime($oTopic_a->getDateAdd());
}

class PluginFeatured_HookFeatured extends Hook {

    /*
     * Регистрация событий на хуки
	*/
    public function RegisterHook() {
        $this->AddHook('template_featured_topics', 'displayTopics',__CLASS__);
    }
	
	public function displayTopics(){
		$aTopics = array();
		dump('displayTopics:::::');
		if($pages_featured = Config::Get('plugin.featured.pages')){
			$exclude = Config::Get('plugin.featured.exclude');
			$count_topics = $pages_featured * 2 + count($exclude);
			if($featured_topics = Config::Get('plugin.featured.featured')){
				foreach($featured_topics as $fId){
					if($oTopic = $this->Topic_GetTopicById($fId)){
						$aTopics[] = $oTopic;
					}
				}
			}
			$aFilter = array('order'=>array('t.topic_rating desc','t.topic_id desc'),'topic_publish'=>1,'blog_type' => array('personal','open'));
			if($period = Config::Get('plugin.featured.top_period') * 60 * 60 * 24){
				$aFilter['topic_date_more'] = date("Y-m-d H:00:00",time()-$period);;
			};
			dump($aFilter);
			$aAllTopics = $this->Topic_GetTopicsByFilter($aFilter,1,$count_topics);
			$aAllTopics1 = array();
			foreach($aAllTopics['collection'] as $oTopic) {
				if(!in_array($oTopic->getId(),$featured_topics) && !in_array($oTopic->getId(),$exclude)){					
					$aAllTopics1[] = $oTopic;
				}				
			}
			usort($aAllTopics1,"cmpTopicDate");
			$aTopics = array_slice(array_merge($aTopics,$aAllTopics1),0,$count_topics);
			//dump('count_topics:'.$count_topics);
		}
		//$aTopics = array_unique($aTopics);
		$this->Viewer_Assign('aTopics',$aTopics);
		$s = $this->Viewer_Fetch(Plugin::GetTemplatePath('featured').'featured.tpl');
        return $s;
   }
}
?>
