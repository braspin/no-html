<?php

namespace NoHtml;

include_once __DIR__ .'/tag.php';
include_once __DIR__ .'/attribute.php';
include_once __DIR__ .'/content.php';

class Div
{
  private $content = '';
  public function __construct(string $classes = '', array $attrs = []) 
  {
    $this->content = Tag::non_closing_tag(Tag::div, [
                      Attribute::class_ => $classes,
                    ],
                    $attrs);
  }

  public function div(Div $div)
  {
    $this->content .= $div->render();
  }

  public function content(Content $content)
  {
    $this->content .= $content->render();
  }

  public function render()
  {
    $this->content .= Tag::close(Tag::div);
    return $this->content;
  }
}
