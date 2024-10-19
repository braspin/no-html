<?php namespace Braspin\NoHtml;

include_once __DIR__ .'/Render.php';
include_once __DIR__ .'/Util/Tag.php';
include_once __DIR__ .'/Util/Attribute.php';
include_once __DIR__ .'/Tr.php';

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
  public function echo()
  {
    echo $this->render();
  }

}