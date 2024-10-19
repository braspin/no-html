<?php namespace Braspin\NoHtml;

include_once __DIR__ .'/Render.php';
include_once __DIR__ .'/Util/Tag.php';
include_once __DIR__ .'/Util/Attribute.php';

include_once __DIR__ .'/Head.php';
include_once __DIR__ .'/Content.php';

class Html extends Render
{
  private $queue = [];
  private $content = '';
  private $head = null;
  public function __construct(Head $head = null) {
    $this->head = $head;
  }
  
  public function doctype()
  {
    $this->content .= Tag::open(Tag::doctype);
    return $this;
  } 
  public function html(string $lang = '', string $classes = '', array $attrs = [])
  {
    $this->queue[] = __FUNCTION__;
    $this->content .= Tag::non_closing_tag(__FUNCTION__, [
                      Attribute::lang => $lang,
                      Attribute::class_ => $classes,
                    ], $attrs);

    if($this->head !== null)
    {
      $this->content .= $this->head->render();
    }
    
    return $this;
  }
  public function body(Content $content)
  {
    $this->queue[] = __FUNCTION__;
    $this->content .= Tag::open(Tag::body);
    $this->content .= $content->render(); 
    return $this;
  }
  public function render()
  {
    $index = count($this->queue);

    while($index) {
      $this->content .= Tag::close($this->queue[--$index]);
    }

    return $this->content;
  }
  public function echo()
  {
    echo $this->render();
  }
}

