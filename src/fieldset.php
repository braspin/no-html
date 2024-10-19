<?php namespace Braspin\NoHtml;

include_once __DIR__ .'/render.php';
include_once __DIR__ .'/tag.php';
include_once __DIR__ .'/attribute.php';

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

  public function li(string $content, string $classes = '', array $attrs = []) : FieldSet
  {
    $this->content .= Tag::tag(__FUNCTION__, $content,[
                    Attribute::class_ => $classes,
                  ], $attrs);
    return $this;
  }

  public function render() : string
  {
    $this->content .= Tag::close(Tag::fieldset);
    return $this->content;
  }
}