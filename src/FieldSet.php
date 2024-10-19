<?php namespace Braspin\NoHtml;

include_once __DIR__ .'/Render.php';
include_once __DIR__ .'/Tag.php';
include_once __DIR__ .'/Attribute.php';

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