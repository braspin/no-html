<?php namespace Braspin\NoCss;

include_once __DIR__ .'/Cascate.php';
include_once __DIR__ .'/Attribute.php';

class Css 
{
  private $content = "";
  private $full_path = "";
  private $exp = -1;
  private $endline = false;
  public function __construct(string $path, string $filename, bool $endline = false, int $exp = -1) {

    $concat = str_ends_with($path, '/') ? '' : '/';
    $this->full_path = $path . $concat . $filename;
    $this->exp = $exp;
    $this->endline = $endline;
  }

  private function code(string $name, array $properties = []) : string
  {
    $result = $name . ' { ' . ($this->endline ? PHP_EOL : '');

    foreach($properties as $property => &$value)
    {
      $result .= $property . ': ' . $value . ';' . ($this->endline ? PHP_EOL : '');
    }

    $result .= '} ' . ($this->endline ? PHP_EOL : '');

    return $result;
  }

  public function class(string $name, array $properties = []) : Css
  {
    $this->content = '.' . $this->code($name, $properties) . ($this->endline ? PHP_EOL : '');
    return $this;
  }

  public function tag(string $name, array $properties = []) : Css
  {
    $this->content = $this->code($name, $properties) . ($this->endline ? PHP_EOL : '');
    return $this;
  }

  public function cascate(Cascate $cascate, array $properties = []) : Css
  {
    $this->content .= $this->code($cascate->render(), $properties) . ($this->endline ? PHP_EOL : '');
    return $this;
  }
  public function save(bool $force = false) : void
  {
    $replace = false;

    if($this->exp <= -1) 
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

    $replace |= $force;

    if($replace)
    {
      $file = fopen($this->full_path, "w") or die("Unable to open file!");
      fwrite($file, $this->content);
      fclose($file);
    }
  }
  public function render() : string
  {
    return $this->content;
  }

  public function echo() : void
  {
    echo $this->render();
  }
}