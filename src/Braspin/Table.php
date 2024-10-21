<?php namespace Braspin\NoHtml;


include_once __DIR__ .'/Util/Render.php';
include_once __DIR__ .'/Util/Tag.php';
include_once __DIR__ .'/Util/Attribute.php';
include_once __DIR__ .'/Thead.php';
include_once __DIR__ .'/Tbody.php';

use Braspin\NoHtml\Util\Attribute as Attribute;
use Braspin\NoHtml\Util\Tag as Tag;
use Braspin\NoHtml\Util\Render as Render;

class Table extends Render
{
  private $thead = null;
  private $tbody = null;
  private $tfoot = null;
  private $caption = '';
  private $content = '';
  public function __construct(string $classes = '', array $attrs = []) 
  {
    $this->content .= Tag::non_closing_tag(Tag::table, [
                        Attribute::class_ => $classes
                      ], $attrs);
  }

  public function thead(THead $thead)
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
  public function echo()
  {
    echo $this->render();
  }

}