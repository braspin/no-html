<?php

namespace NoHtml;

include_once __DIR__ .'/render.php';
include_once __DIR__ .'/tag.php';
include_once __DIR__ .'/tr.php';

class TBody extends Render
{
  private $content = '';
  public function __construct(string $classes = '', array $attrs = []) 
  {
    $this->content .= Tag::non_closing_tag(Tag::tbody, [
                        Attribute::class_ => $classes
                      ], $attrs);
  }

  public function tr(Tr $tr)
  {
    $this->content .= $tr->render();
  }

  public function render()
  {
    $this->content .= Tag::open(Tag::tbody);
    return $this->content;
  }

}