<?php

namespace NoHtml;

include_once __DIR__ .'/render.php';
include_once __DIR__ .'/tag.php';
include_once __DIR__ .'/attribute.php';

class Ol extends Render
{
  private $content = '';

  public function __construct() 
  {
    $this->content .= Tag::open(Tag::ol);
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
}