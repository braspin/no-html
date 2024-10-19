<?php namespace Braspin\NoHtml;

include_once __DIR__ .'/render.php';
include_once __DIR__ .'/tag.php';
include_once __DIR__ .'/attribute.php';

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
}