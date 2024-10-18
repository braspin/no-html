<?php
namespace NoHtml;

include_once __DIR__ .'/tag.php';
include_once __DIR__ .'/attribute.php';
include_once __DIR__ .'/head.php';
include_once __DIR__ .'/content.php';

class Html
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
}

