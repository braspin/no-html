<?php

namespace NoHtml;

include_once __DIR__ .'/tag.php';
include_once __DIR__ .'/tr.php';

class TFoot
{
  private $content = '';
  public function __construct() 
  {
    $this->content = Tag::open(Tag::tfoot);
  }

  public function tr(Tr $tr)
  {
    $this->content .= $tr->render();
  }

  public function render()
  {
    $this->content .= Tag::open(Tag::tfoot);
    return $this->content;
  }

}