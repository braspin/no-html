<?php namespace Braspin\NoHtml;

include_once __DIR__ .'/Util/Render.php';
include_once __DIR__ .'/Util/Tag.php';
include_once __DIR__ .'/Util/Attribute.php';

use Braspin\NoHtml\Util\Attribute as Attribute;
use Braspin\NoHtml\Util\Tag as Tag;
use Braspin\NoHtml\Util\Render as Render;

class FieldSet extends Render
{
  private $content = '';

  public function __construct(string $legend = '', string $classes='', array $attrs=[]) 
  {
    $this->content .= Tag::open(Tag::fieldset);
    
    if(!empty($legend))
    {
      $this->content .= Tag::tag(Tag::legend, $legend, [
                          Attribute::class_ => $classes,
                        ], $attrs);
    }
  }

  public function content(Render $content, string $classes = '', array $attrs = []) : FieldSet
  {
    $this->content .= $content->render();
    return $this;
  }

  public function render() : string
  {
    $this->content .= Tag::close(Tag::fieldset);
    return $this->content;
  }
  public function echo()
  {
    echo $this->render();
  }
}