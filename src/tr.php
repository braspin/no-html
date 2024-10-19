<?php

namespace NoHtml;

include_once __DIR__ .'/render.php';
include_once __DIR__ .'/tag.php';
include_once __DIR__ .'/attribute.php';

class Tr extends Render
{
  private $content = '';

  public function __construct(string $classes = '', array $attrs = []) 
  {
    $this->content .= Tag::non_closing_tag(Tag::tr, [
                        Attribute::class_ => $classes
                      ], $attrs);
  }

  public function th(string $content, string $scope, string $classes = '', array $attrs = [])
  {
    $this->content .= Tag::tag(__FUNCTION__, $content,[
                      Attribute::class_ => $classes,
                      Attribute::scope => $scope,
                    ], $attrs);
    return $this;
  }

  public function td(string $content, string $classes = '', array $attrs = [])
  {
    $this->content .= Tag::tag(__FUNCTION__, $content,[
                      Attribute::class_ => $classes,
                    ], $attrs);
    return $this;
  }

  public function render()
  {
    $this->content .= Tag::close(Tag::tr);
    return $this->content;
  }
}