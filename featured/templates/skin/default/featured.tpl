{foreach from=$aTopics item=oTopic}
<div class="topic-slider">
<li class="topicshort news featured">
	<div class="inform">
		{if $oTopic->getPreviewImageWebPath('350crop')}
		<div class="topic-photo-preview">
			<img src="{$oTopic->getPreviewImageWebPath('350crop')}" alt="{$oTopic->getTitle()|escape:'html'}"></img>
		</div>
		{/if}
		<h3 class="title">
			<a href="{$oTopic->getUrl()}#cut" class="title-topic" title="{$oTopic->getTitle()|escape:'html'}">
				{$oTopic->getTitle()|escape:'html'}
			</a>
		</h3>
		{if !$oTopic->getPreviewImageWebPath('350crop')}
		<div class="content">
			{$oTopic->getTextShort()|strip_tags|truncate:260}
		</div>
		{/if}
	</div>
	<ul class="info">
		<li class="avatar">
			<a href="{$oTopic->getUser()->getUserWebPath()}" title="{$oTopic->getUser()->getLogin()}">
				<img src="{$oTopic->getUser()->getProfileAvatar()}" alt="{$oTopic->getUser()->getLogin()}"></a></li>
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
