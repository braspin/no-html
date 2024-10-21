<?php namespace Braspin\NoHtml;

include_once __DIR__ .'/Util/Render.php';
include_once __DIR__ .'/Util/Tag.php';
include_once __DIR__ .'/Util/Attribute.php';

include_once __DIR__ .'/Head.php';
include_once __DIR__ .'/Content.php';

use Braspin\NoHtml\Util\Attribute as Attribute;
use Braspin\NoHtml\Util\Tag as Tag;
use Braspin\NoHtml\Util\Render as Render;

class Html extends Render
{
  private $queue = [];
  private $content = '';
  private $exp = -1;
  private $endline = false;
  private $full_path = '';
  private $head = null;
  public function __construct(Head $head = null, string $path = '', string $filename = '', int $exp = -1) {
    $this->head = $head;
    $concat = str_ends_with($path, '/') ? '' : '/';
    $this->full_path = $path . $concat . $filename;
    $this->exp = $exp;
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
  public function echo()
  {
    echo $this->render();
  }

  public function save(bool $force = false) : void
  {
    $replace = false;

    if($this->exp > -1) 
    {
      if (file_exists($this->full_path))
      {
        $filemtime = filemtime($this->full_path);
        if(!$filemtime or (time() - $filemtime >= $this->exp))
        {
          $replace = true;
        }
      }
      else
      {
        $replace = true;
      }
    }
    else
    {
      $replace = true;
    }

    $replace |= $force;

    if($replace)
    {
      $file = fopen($this->full_path, "w") or die("Unable to open file!");
      fwrite($file, $this->content);
      fclose($file);
    }
  }

}

