<?php
defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.caption');

if (method_exists('JHtml','core')) 
	JHtml::core();
else
	JHtml::_('behavior.framework');

Artx::load("Artx_Content");

$component = new ArtxContent($this, $this->params);
$article = $component->article('category', $this->item, $this->item->params);

if ($this->params->get('show_tags', 1) && !empty($this->category->tags->itemTags)) {
    $this->category->tagLayout = new JLayoutFile('joomla.content.tags');
    $article->tags = $this->category->tagLayout->render($this->category->tags->itemTags);
}

$params = $article->getArticleViewParameters();
if (strlen($article->title)) {
    $params['header-text'] = $this->escape($article->title);
    if (strlen($article->titleLink))
        $params['header-link'] = $article->titleLink;
}
// Change the order of ""if"" statements to change the order of article metadata header items.
if (strlen($article->created))
    $params['metadata-header-icons'][] = "<span class=\"postdateicon\">" . $article->createdDateInfo($article->created) . "</span>";
if (strlen($article->modified))
    $params['metadata-header-icons'][] = "<span class=\"postdateicon\">" . $article->modifiedDateInfo($article->modified) . "</span>";
if (strlen($article->published))
    $params['metadata-header-icons'][] = "<span class=\"postdateicon\">" . $article->publishedDateInfo($article->published) . "</span>";
if (strlen($article->author))
    $params['metadata-header-icons'][] = "<span class=\"postauthoricon\">" . $article->authorInfo($article->author, $article->authorLink) . "</span>";
if ($article->editIconVisible)
    $params['metadata-header-icons'][] = $article->editIcon();
if (strlen($article->hits))
    $params['metadata-header-icons'][] = $article->hitsInfo($article->hits);
// Build article content
$content = '';
if (!$article->introVisible)
    $content .= $article->event('afterDisplayTitle');
$content .= $article->event('beforeDisplayContent');
if (strlen($article->images['intro']['image']))
    $content .= $article->image($article->images['intro']);
$content .= $article->intro(artxBalanceTags($article->intro));
if (strlen($article->readmore))
    $content .= $article->readmore($article->readmore, $article->readmoreLink);
$content .= $article->event('afterDisplayContent');
$params['content'] = $content;

// Render article
echo $article->article($params);
