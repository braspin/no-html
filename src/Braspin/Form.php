<?php namespace Braspin\NoHtml;

include_once __DIR__ .'/Render.php';
include_once __DIR__ .'/Util/Tag.php';
include_once __DIR__ .'/Util/Attribute.php';

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