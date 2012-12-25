{foreach from=$aTopics item=oTopic}
<div class="topic-slider">
<li class="topicshort news featured">
	<div class="inform">
		{if $oTopic->getPreviewImageWebPath('350crop')}
		<div class="topic-photo-preview">
			<img src="{$oTopic->getPreviewImageWebPath('290crop')}" alt="{$oTopic->getTitle()|escape:'html'}"></img>
		</div>
		{/if}
		<h3 class="title">
			<a href="{$oTopic->getUrl()}" class="title-topic" title="{$oTopic->getTitle()|escape:'html'}">
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
			<a href="{$oTopic->getUser()->getUserWebPath()}">
       			{if $oTopic->getUser()->getProfileName() ne ""}
       				{$oTopic->getUser()->getProfileName()}
				{else}
	       			{$oTopic->getUser()->getLogin()}       				
				{/if}
			</a><br />
            {date_format date=$oTopic->getDateAdd() format="d.m.Y"}
		</li>
		{if $oTopic->getCountComment()}
		<li class="comments-link">
			<a href="{$oTopic->getUrl()}#comments">{$oTopic->getCountComment()}</a>
		</li>
		{/if}
	</ul>
</li>
</div>
{/foreach}
