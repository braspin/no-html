<?php namespace Braspin\NoHtml;

include_once __DIR__ .'/render.php';
include_once __DIR__ .'/attribute.php';
include_once __DIR__ .'/tag.php';

class Head extends Render
{
  private $title = '';
  private $metas = [];
  private $links = [];
  private $scripts = [];

  public function __construct() {
    $this->metas = [];
    $this->links = [];
    $this->scripts = [];
  }

  public function render() : string {
    $content = Tag::open(Tag::head);

    $content .= Tag::tag(Attribute::title, $this->title);

    foreach($this->metas as $row => $meta)
    {
      $content .= $meta;
    }

    foreach($this->links as $row => $link)
    {
      $content .= $link;
    }

    foreach($this->scripts as $row => $script)
    {
      $content .= $script;
    }

    $content .= Tag::close(Tag::head);
    
    return $content;
  }
  public function title(string $value): Head
  {
    $this->title = $value;
    return $this;
  }
  public function script(string $src, bool $async = false, string $id = '', array $attrs = []) : Head
  {
    $this->scripts[] = Tag::tag(Tag::script, '',  [
                        Attribute::type => 'text/javascript',
                        Attribute::id => $id,
                        Attribute::src => $src,
                      ], $attrs, $async ?? 'async');
    return $this;
  }
  public function css(string $href, array $attrs = []) : Head
  {
    $this->link(
      $href, 
      '',  
      '', 
      '',
      'stylesheet', 
      '', 
      'text/css', 
      $attrs
    );

    return $this;
  }

  public function icon(string $type, string $size, string $href, array $attrs= []) : Head
  {
    $this->link(
      $href, 
      '', 
      '', 
      '', 
      'icon', 
      $size, 
      $type, 
      $attrs
    );

    return $this;
  }

  public function link(string $href, string $hreflang, string $media, string $referrerpolicy, string $rel, string $sizes, string $type, array $attrs = []) : Head
  {
    $this->links[] = Tag::non_closing_tag(__FUNCTION__, [
                      Attribute::href => $href,
                      Attribute::hreflang => $hreflang,
                      Attribute::media => $media,
                      Attribute::referrerpolicy => $referrerpolicy,
                      Attribute::rel => $rel,
                      Attribute::sizes => $sizes,
                      Attribute::type => $type
                    ], $attrs);
    return $this;
  }

  public function charset(string $value, array $attrs = []) : Head
  {
    $this->meta('', '', '', $value, '', '',$attrs);
    return $this;
  }

  public function viewport(string $content, array $attrs = []) : Head
  {
    $this->meta('', $content, '', '', '', '', $attrs);
    return $this;
  }

  public function itemprop(string $itemprop, string $content, array $attrs = []) : Head
  {
    $this->meta('', $content, '', '', $itemprop, '', $attrs);
    return $this;
  }

  public function property(string $property, string $content, array $attrs = []) : Head
  {
    $this->meta('', $content, '', '', '', $property, $attrs);
    return $this;
  }

  public function meta(string $name, string $content, string $http_equiv, string $charset, string $itemprop, string $property, array $attrs = []) : Head
  {
    $this->metas[] = Tag::non_closing_tag(__FUNCTION__, [
                      Attribute::name => $name,
                      Attribute::http_equiv => $http_equiv,
                      Attribute::charset => $charset,
                      Attribute::itemprop => $itemprop,
                      Attribute::property => $property,
                      Attribute::content => $content,
                    ], $attrs);
    return $this;
  }
}
