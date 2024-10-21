<?php namespace Braspin\NoHtml;

include_once __DIR__ .'/Util/Render.php';
include_once __DIR__ .'/Util/Tag.php';
include_once __DIR__ .'/Util/Attribute.php';
include_once __DIR__ .'/Tr.php';

use Braspin\NoHtml\Util\Attribute as Attribute;
use Braspin\NoHtml\Util\Tag as Tag;
use Braspin\NoHtml\Util\Render as Render;
class THead extends Render
{
  private $content = '';
  public function __construct(string $classes = '', array $attrs = []) 
  {
    $this->content .= Tag::non_closing_tag(Tag::thead, [
                        Attribute::class_ => $classes
                      ], $attrs);
  }

  public function tr(Tr $tr)
  {
    $this->content .= $tr->render();
  }

  public function render()
  {
    $this->content .= Tag::open(Tag::thead);
    return $this->content;
  }
  public function echo()
  {
    echo $this->render();
  }
}