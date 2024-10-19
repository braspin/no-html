<?php namespace Braspin\NoHtml;

include_once __DIR__ .'/Render.php';
include_once __DIR__ .'/Util/Tag.php';
include_once __DIR__ .'/Util/Attribute.php';

class Ol extends Render
{
  private $content = '';

  public function __construct(string $classes = '', array $attrs = []) 
  {
    $this->content .= Tag::non_closing_tag(Tag::ol, [
                        Attribute::class_ => $classes
                      ], $attrs);
  }

  public function li(string $content, string $classes = '', array $attrs = []) : Ol
  {
    $this->content .= Tag::tag(__FUNCTION__, $content,[
                    Attribute::class_ => $classes,
                  ], $attrs);
    return $this;
  }

  public function render() : string
  {
    $this->content .= Tag::close(Tag::ol);
    return $this->content;
  }
  public function echo()
  {
    echo $this->render();
  }
}