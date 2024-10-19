<?php namespace Braspin\NoHtml;

include_once __DIR__ .'/render.php';
include_once __DIR__ .'/tag.php';
include_once __DIR__ .'/attribute.php';
include_once __DIR__ .'/content.php';

class Form extends Render
{
  private $content = '';
  public function __construct(string $action, string $method, string $classes = '', array $attrs = []) 
  {
    $this->content = Tag::non_closing_tag(Tag::form, [
                      Attribute::class_ => $classes,
                      Attribute::action => $action,
                      Attribute::method => $method
                    ],
                    $attrs);
  }

  public function content(Render $content)
  {
    $this->content .= $content->render();
  }

  public function render()
  {
    $this->content .= Tag::close(Tag::form);
    return $this->content;
  }
  public function echo()
  {
    echo $this->render();
  }
}
