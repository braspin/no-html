<?php namespace Braspin\NoHtml;

include_once __DIR__ .'/render.php';
include_once __DIR__ .'/tag.php';
include_once __DIR__ .'/attribute.php';
include_once __DIR__ .'/table.php';
include_once __DIR__ .'/div.php';
include_once __DIR__ .'/ul.php';
include_once __DIR__ .'/ol.php';
include_once __DIR__ .'/p.php';
include_once __DIR__ .'/form.php';
include_once __DIR__ .'/select.php';
include_once __DIR__ .'/fieldset.php';

class Content extends Render
{
  private $content = '';
  private $queue = [];
  private $scripts = [];
  public function __construct() 
  {
  }

  public function div(Div $div)
  {
    $this->content .= $div->render();
    return $this;
  }

  public function span(string|Render $content, string $classes = '', array $attrs = [])
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
  public function a(string|Render $content, string $href, string $target, string $classes = '', array $attrs = [])
  {
    $this->content .= Tag::tag(__FUNCTION__, $content, [
                      Attribute::class_ => $classes,
                      Attribute::href => $href,
                      Attribute::target => $target
                    ], $attrs);
    return $this;
  }
  public function b(string|Render $content, string $classes = '', array $attrs = [])
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

  public function button(string $content, string $type, string $classes = '', string $id = '', array $attrs = [])
  {
    $this->content .= Tag::tag(__FUNCTION__, $content, [
                      Attribute::class_ => $classes,
                      Attribute::type => $type,
                      Attribute::id => $id,
                    ], $attrs);
    return $this;
  }

  public function input(string $type, string $value, string $placeholder = '', string $name = '', string $id = '', string $classes = '', array $attrs = [])
  {
    $this->content .= Tag::tag(__FUNCTION__, '', [
                      Attribute::class_ => $classes,
                      Attribute::type => $type,
                      Attribute::id => $id,
                      Attribute::name => $name,
                      Attribute::value => $value,
                      Attribute::placeholder => $placeholder,
                    ], $attrs);
    return $this;
  }

  public function textarea(string $content, string $id, string $name, string $rows, string $cols, string $classes = '', array $attrs = [])
  {
    $this->content .= Tag::tag(__FUNCTION__, $content, [
                      Attribute::class_ => $classes,
                      Attribute::id => $id,
                      Attribute::name => $name,
                      Attribute::cols => $cols,
                      Attribute::rows => $rows,
                    ], $attrs);
    return $this;
  }

  public function fieldset(FieldSet $fieldset)
  {
    $this->content .= $fieldset->render();
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
  public function i(string|Render $content, array $attrs = [])
  {
    $this->content .= Tag::tag(__FUNCTION__, $content, $attrs);
    return $this;
  }

  public function aside(string|Render $content, array $attrs = [])
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

  public function label(string $for, string $content, string $classes = '', array $attrs = [])
  {
    $this->content .= Tag::tag(__FUNCTION__, $content, [
                      Attribute::for => $for,
                      Attribute::class_ => $classes
                    ],$attrs);
    return $this;
  }

  public function small(string|Render $content, string $classes, array $attrs = [])
  {
    $this->content .= Tag::tag(__FUNCTION__, $content, [
                      Attribute::class_ => $classes
                    ],$attrs);
    return $this;
  }

  public function data(string $value, string $content, array $attrs = [])
  {
    $this->content .= Tag::tag(__FUNCTION__, $content, [
                      Attribute::value => $value
                    ],$attrs);
    return $this;
  }

  public function blockquote(string $cite, string|Render $content, array $attrs = [])
  {
    $this->content .= Tag::tag(__FUNCTION__, $content, [
                      Attribute::cite => $cite
                    ],$attrs);
    return $this;
  }

  public function abbr(string|Render $content, string $classes = '', array $attrs = [])
  {
    $this->content .= Tag::tag(__FUNCTION__, $content, [
                      Attribute::class_ => $classes
                    ],$attrs);
    return $this;
  }

  public function nav(string|Render $content, string $classes = '', array $attrs = []) : Content
  {
    $this->content .= Tag::non_closing_tag(__FUNCTION__, [
                        Attribute::class_ => $classes,
                      ], $attrs);

    if (is_string($content)) {
      $this->content .= $content;
    } else {
      $this->content .= $content->render();
    }
    
    $this->content .= Tag::close(__FUNCTION__);
    return $this;
  }

  public function ul(Ul $ul) : Content
  {
    $this->content .= $ul->render();
    return $this;
  }

  public function ol(Ol $ol) : Content
  {
    $this->content .= $ol->render();
    return $this;
  }

  public function table(Table $table) : Content
  {
    $this->content .= $table->render();
    return $this;
  }

  public function code(string|Render $content, string $classes = '', array $attrs = [])
  {
    $this->content .= Tag::tag(__FUNCTION__, $content, [
                        Attribute::class_ => $classes
                      ],$attrs);
    return $this;
  }

  public function unknown(string $tag, string|Render $content, array $attrs = [], array $args = [])
  {
    $this->content .= Tag::tag($tag, $content, $attrs, $args);
    return $this;
  }

  public function script(string $src, bool $async = false, string $id = '', array $attrs = []) : Content
  {
    $this->scripts[] = Tag::tag(Tag::script, '',  [
                        Attribute::type => 'text/javascript',
                        Attribute::id => $id,
                        Attribute::src => $src,
                      ], $attrs, $async ?? 'async');
    return $this;
  }

  public function render()
  {
    $index = count($this->queue);

    while($index) {
      $this->content .= Tag::close($this->queue[--$index]);
    }

    foreach($this->scripts as $row => $script)
    {
      $this->content .= $script;
    }

    return $this->content;
  }

}