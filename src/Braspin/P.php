<?php namespace Braspin\NoHtml;

include_once __DIR__ .'\Util\Render.php';
include_once __DIR__ .'\Util\Tag.php';
include_once __DIR__ .'\Util\Attribute.php';

use Braspin\NoHtml\Util\Attribute as Attribute;
use Braspin\NoHtml\Util\Tag as Tag;
use Braspin\NoHtml\Util\Render as Render;

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

  public function content(Render $content)
  {
    $this->content .= $content->render();
  }

  public function render()
  {
    $this->content .= Tag::close(Tag::p);
    return $this->content;
  }
  public function echo()
  {
    echo $this->render();
  }
}