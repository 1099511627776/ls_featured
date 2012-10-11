{foreach from=$aTopics item=oTopic}
<div class="topic-slider">
<li class="topicshort news">
	<div class="inform">
		<h3 class="title">
			<a href="{$oTopic->getUrl()}#cut" class="title-topic" title="{$oTopic->getTitle()|escape:'html'}">
				{$oTopic->getTitle()|escape:'html'}
			</a>
		</h3>
		<div class="content">
			{$oTopic->getTextShort()}
		</div>
	</div>
	<ul class="info">
		<li class="avatar">
			<a href="{$oTopic->getUser()->getUserWebPath()}" title="{$oTopic->getUser()->getLogin()}">
				<img src="{$oTopic->getUser()->getProfileAvatarPath(24)}" alt="{$oTopic->getUser()->getLogin()}"></a></li>
		<li class="username">
			<a href="{$oTopic->getUser()->getUserWebPath()}">{$oTopic->getUser()->getLogin()}</a><br />
		</li>
		<li class="comments-link">
			<a href="{$oTopic->getUrl()}#comments">{$oTopic->getCountComment()}</a>
		</li>
	</ul>
</li>
</div>
{/foreach}
