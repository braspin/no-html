<?php

namespace NoHtml;

include_once __DIR__ .'/tag.php';
include_once __DIR__ .'/tr.php';

class THead
{
  private $content = '';
  public function __construct() 
  {
    $this->content = Tag::open(Tag::thead);
  }

  public function tr(Tr $tr)
  {
    $this->content .= $tr->render();
  }

  public function render()
  {
    $this->content .= Tag::open(Tag::thead);
    return $this->content;
  }
}