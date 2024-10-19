<?php

include_once __DIR__ .'/html.php';

use NoHtml\Head as Head;
use NoHtml\Html as Html;
use NoHtml\Content as Content;
use NoHtml\Div as Div;
use NoHtml\Select as Select;
use NoHtml\Form as Form;

$head = new Head();
$head->title('Teste');
$head->script('https://localhost/no-html/script.js', false);
$head->css('https://localhost/no-html/style.css');

$content1 = new Content();
$content1->h1('Teste1');

$content2 = new Content();
$content2->h1('Teste2');

$div1 = new Div();
$div1->content($content1);
$div1->content($content2);

$div2 = new Div();
$div2->div($div1);
$div2->div($div1);

$body = new Content();
$body->div($div2);

$select = new Select("teste", "id_select");
$select->option("teste", "");
$select->option("teste2", "teste1");

$body->select($select);

$inputs = new Content();
$inputs->input('text', '', 'nome');
$inputs->input('text', '', 'sobrenome');
$inputs->input('submit', 'Enviar');
$inputs->button('Enviar', 'submit');
$form = new Form('index.php?test=nome', 'POST');
$form->content($inputs);

$body->form($form);

$html = new Html($head);
echo $html->doctype()
     ->html('pt-br')
     ->body($body)
     ->render(); 
