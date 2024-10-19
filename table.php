<?php

namespace NoHtml;

include_once __DIR__ .'/render.php';
include_once __DIR__ .'/tag.php';
include_once __DIR__ .'/thead.php';
include_once __DIR__ .'/tbody.php';

class Table extends Render
{
  private $thead = null;
  private $tbody = null;
  private $tfoot = null;
  private $caption = '';
  private $content = '';
  public function __construct() 
  {
    $this->content = Tag::open(Tag::table);
  }

  public function thread(THead $thead)
  {
    $this->thead = $thead;
  }

  public function tbody(TBody $tbody)
  {
    $this->tbody = $tbody;
  }

  public function tfoot(TFoot $tfoot)
  {
    $this->tfoot = $tfoot;
  }

  public function caption(string $content, string $classes = '', array $attrs=[]){
    $this->caption = Tag::tag(__FUNCTION__,$content, [
                        Attribute::class_ => $classes,
                      ], $attrs);
    return $this;
  }

  public function render()
  {
    $this->content .= $this->caption;

    if($this->thead != null) {
      $this->content .= $this->thead->render();
    }

    if($this->tbody != null) {
      $this->content .= $this->tbody->render();
    }

    if($this->tfoot != null) {
      $this->content .= $this->tfoot->render();
    }

    $this->content .= Tag::open(Tag::table);
    return $this->content;
  }

}