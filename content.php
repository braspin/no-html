<?php

namespace NoHtml;

include_once __DIR__ .'/tag.php';
include_once __DIR__ .'/attribute.php';
include_once __DIR__ .'/table.php';
include_once __DIR__ .'/div.php';
include_once __DIR__ .'/ul.php';
include_once __DIR__ .'/p.php';
include_once __DIR__ .'/form.php';
include_once __DIR__ .'/select.php';

class Content
{
  private $content = '';
  private $queue = [];
  public function __construct() 
  {
  }

  public function div(Div $div)
  {
    $this->content .= $div->render();
    return $this;
  }

  public function span(string $content, string $classes = '', array $attrs = [])
  {
    $this->queue[] = __FUNCTION__;
    $this->content .= Tag::tag(__FUNCTION__,$content, [
                      Attribute::class_ => $classes,
                    ], $attrs);
    return $this;
  }
  public function h1(string $content, string $classes = '', array $attrs = [])
  {
    $this->content .= Tag::tag(__FUNCTION__, $content, [
                      Attribute::class_ => $classes,
                    ], $attrs);
    return $this;
  }
  public function h2(string $content, string $classes = '', array $attrs = [])
  {
    $this->content .= Tag::tag(__FUNCTION__, $content, [
                      Attribute::class_ => $classes,
                    ], $attrs);
    return $this;
  }
  public function h3(string $content, string $classes = '', array $attrs = [])
  {
    $this->content .= Tag::tag(__FUNCTION__, $content, [
                      Attribute::class_ => $classes,
                    ], $attrs);
    return $this;
  }
  public function h4(string $content, string $classes = '', array $attrs = [])
  {
    $this->content .= Tag::tag(__FUNCTION__, $content, [
                      Attribute::class_ => $classes,
                    ], $attrs);
    return $this;
  }
  public function h5(string $content, string $classes = '', array $attrs = [])
  {
    $this->content .= Tag::tag(__FUNCTION__, $content, [
                      Attribute::class_ => $classes,
                    ], $attrs);
    return $this;
  }
  public function h6(string $content, string $classes = '', array $attrs = [])
  {
    $this->content .= Tag::tag(__FUNCTION__, $content, [
                      Attribute::class_ => $classes,
                    ], $attrs);
    return $this;
  }
 
  public function p(P $p)
  {
    $this->content .= $p->render();
    return $this;
  }
  public function a(string $content, string $href, string $target, string $classes = '', array $attrs = [])
  {
    $this->content .= Tag::tag(__FUNCTION__, $content, [
                      Attribute::class_ => $classes,
                      Attribute::href => $href,
                      Attribute::target => $target
                    ], $attrs);
    return $this;
  }
  public function b(string $content, string $classes = '', array $attrs = [])
  {
    $this->content .= Tag::tag(__FUNCTION__, $content, [
                      Attribute::class_ => $classes,
                    ], $attrs);
    return $this;
  }
  public function br(string $classes = '', array $attrs = [])
  {
    $this->content .= Tag::tag(__FUNCTION__, '', [
                      Attribute::class_ => $classes,
                    ], $attrs);
    return $this;
  }

  public function button(string $content, string $type, string $id, string $classes = '', array $attrs = [])
  {
    $this->content .= Tag::tag(__FUNCTION__, $content, [
                      Attribute::class_ => $classes,
                      Attribute::type => $type,
                      Attribute::id => $id,
                    ], $attrs);
    return $this;
  }

  public function input(string $content, string $type, string $id, string $classes = '', array $attrs = [])
  {
    $this->content .= Tag::tag(__FUNCTION__, $content, [
                      Attribute::class_ => $classes,
                      Attribute::type => $type,
                      Attribute::id => $id,
                    ], $attrs);
    return $this;
  }

  public function form(Form $form)
  {
    $this->content .= $form->render();
    return $this;
  }

  public function select(Select $select)
  {
    $this->content .= $select->render();
    return $this;
  }

  public function hr(array $attrs = [])
  {
    $this->content .= Tag::tag(__FUNCTION__, '', $attrs);
    return $this;
  }
  public function i(string $content, array $attrs = [])
  {
    $this->content .= Tag::tag(__FUNCTION__, $content, $attrs);
    return $this;
  }

  public function img(string $src, string $alt, string $classes, array $attrs = [])
  {
    $this->content .= Tag::tag(__FUNCTION__, '', [
                      Attribute::class_ => $classes,
                      Attribute::src => $src,
                      Attribute::alt => $alt,
                    ],$attrs);
    return $this;
  }

  public function label(string $for, string $content, string $classes, array $attrs = [])
  {
    $this->content .= Tag::tag(__FUNCTION__, $content, [
                      Attribute::for => $for,
                      Attribute::class_ => $classes
                    ],$attrs);
    return $this;
  }

  public function ul(Ul $ul)
  {
    $this->content .= $ul->render();
    return $this;
  }

  public function table(Table $table)
  {
    $this->content .= $table->render();
    return $this;
  }

  public function tag(string $tag, string $content, array $attrs = [])
  {
    $this->content .= Tag::tag($tag, $content, $attrs);
    return $this;
  }

  public function non_closing_tag(string $tag, string $content, array $attrs = [])
  {
    $this->queue[] = $tag;
    $this->content .= Tag::non_closing_tag($tag, $attrs);
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