<?php namespace Braspin\NoHtml;

include_once __DIR__ .'/Util/Render.php';
include_once __DIR__ .'/Util/Tag.php';
include_once __DIR__ .'/Util/Attribute.php';

use Braspin\NoHtml\Util\Attribute as Attribute;
use Braspin\NoHtml\Util\Tag as Tag;
use Braspin\NoHtml\Util\Render as Render;

class Ul extends Render
{
  private $content = '';

  public function __construct(string $classes = '', array $attrs = []) 
  {
    $this->content .= Tag::non_closing_tag(Tag::ul, [
                        Attribute::class_ => $classes
                      ], $attrs);
  }

  public function li(string|Ul $content, string $classes = '', array $attrs = []) : Ul
  {
    if(gettype($content) === 'string')
    {
      $this->content .= Tag::tag(__FUNCTION__, $content,[
                      Attribute::class_ => $classes,
                    ], $attrs);
    }
    else
    {
      $this->content .= Tag::tag(__FUNCTION__, $content->render(),[
                          Attribute::class_ => $classes,
                        ], $attrs);
    }

    return $this;
  }

  public function render() : string
  {
    $this->content .= Tag::close(Tag::ul);
    return $this->content;
  }
  public function echo()
  {
    echo $this->render();
  }
}