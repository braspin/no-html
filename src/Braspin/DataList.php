<?php namespace Braspin\NoHtml;

include_once __DIR__ .'/Util/Render.php';
include_once __DIR__ .'/Util/Tag.php';
include_once __DIR__ .'/Util/Attribute.php';

use Braspin\NoHtml\Util\Attribute as Attribute;
use Braspin\NoHtml\Util\Tag as Tag;
use Braspin\NoHtml\Util\Render as Render;

class DataList extends Render
{
  private $content = '';

  public function __construct(string $name, string $id, string $classes = '', array $attrs = []) 
  {
    $this->content .= Tag::non_closing_tag(Tag::datalist, [
                        Attribute::name => $name,
                        Attribute::id => $id,
                        Attribute::class_ => $classes
                      ], $attrs);
  }

  public function option(string $content, string $value, string $classes = '', array $attrs = []) : DataList
  {
    $this->content .= Tag::tag(__FUNCTION__, $content,[
                        Attribute::class_ => $classes,
                        Attribute::value => [ $value => true ],
                      ], $attrs);
    return $this;
  }

  public function render() : string
  {
    $this->content .= Tag::close(Tag::datalist);
    return $this->content;
  }
  public function echo()
  {
    echo $this->render();
  }

}