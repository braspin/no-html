<?php

include_once __DIR__ .'/../src/html.php';

use Braspin\NoHtml\Head as Head;
use Braspin\NoHtml\Html as Html;
use Braspin\NoHtml\Content as Content;
use Braspin\NoHtml\Form as Form;
use Braspin\NoHtml\Fieldset as Fieldset;
use Braspin\NoHtml\Render as Render;
use Braspin\NoHtml\Div as Div;
use Braspin\NoHtml\Attribute as Attribute;

class FormGroup extends Render
{
  private $div;
  private $content;
  public function __construct() {
    $this->div = new Div('form-group');
    $this->content = new Content();
  }

  public function label(string $for, string $content, string $classes = '')
  {
    $this->content->label($for, $content, $classes);
  }

  public function input(string $type, string $id, string $placeholder, string $classes = 'form-control', array $attrs = [])
  {
    $this->content->input($type, '', $placeholder, '', $id, $classes, $attrs);
  }

  public function small(string $id, $content)
  {
    $this->content->small($content, 'form-text text-muted', [
      Attribute::id => $id
    ]);
  }

  public function render() {
    $this->div->content($this->content);
    return $this->div->render();
  }
}

$head = new Head();
$head->title('Contact');
$head->charset('utf-8');
$head->viewport('width=device-width, initial-scale=1, shrink-to-fit=no');
$head->css('https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css', [
  'integrity' => 'sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T',
  'crossorigin' => 'anonymous'
]);

$body = new Content();
$body->h1('Contact Form');
$body->script('https://code.jquery.com/jquery-3.3.1.slim.min.js', false, '', [
  'integrity' => 'sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo',
  'crossorigin' => 'anonymous'
]);
$body->script('https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js',false, '', [
  'integrity' => 'sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1',
  'crossorigin' => 'anonymous'
]);
$body->script('https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js',false, '', [
  'integrity' => 'sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM',
  'crossorigin' => 'anonymous'
]);

$email = new FormGroup();
$email->label('exampleInputEmail1', 'Email address');
$email->input('email', 'exampleInputEmail1', 'Enter email', 'form-control',[
  'aria-describedby' => 'emailHelp'
]);
$email->small('emailHelp', 'We\'ll never share your email with anyone else.');

$password = new FormGroup();
$password->label('exampleInputPassword1', 'Password');
$password->input('password', 'exampleInputPassword1', 'Password');

$checkme = new FormGroup();
$checkme->input('checkbox', 'exampleCheck1', '', 'form-check-input');
$checkme->label('exampleCheck1', 'Check me out', 'form-check-label');

$button = new Content();
$button->button('Submit', 'submit', 'btn btn-primary');

$form = new Form('contact.php', 'POST');
$form->content($email);
$form->content($password);
$form->content($checkme);
$form->content($button);

$fieldset = new Fieldset('Legend');
$fieldset->content($form);

$body->fieldset($fieldset);

$html = new Html($head);
echo $html->doctype()
     ->html('pt-br')
     ->body($body)
     ->render(); 
