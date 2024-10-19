<?php namespace Braspin\NoHtml;

include_once __DIR__ .'/render.php';
include_once __DIR__ .'/tag.php';
include_once __DIR__ .'/attribute.php';
include_once __DIR__ .'/content.php';

class P extends Render
{
  private $content = '';
  public function __construct(string $classes = '', array $attrs = []) 
  {
    $this->content = Tag::non_closing_tag(Tag::p, [
                      Attribute::class_ => $classes,
                    ],
                    $attrs);
  }

  public function div(P $p)
  {
    $this->content .= $p->render();
  }

  public function content(Content $content)
  {
    $this->content .= $content->render();
  }

  public function render()
  {
    $this->content .= Tag::close(Tag::p);
    return $this->content;
  }
}