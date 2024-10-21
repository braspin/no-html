<?php

include_once __DIR__ .'/../src/Braspin/Html.php';

use Braspin\NoHtml\Head as Head;
use Braspin\NoHtml\Html as Html;
use Braspin\NoHtml\Content as Content;
use Braspin\NoHtml\Form as Form;
use Braspin\NoHtml\Div as Div;
use Braspin\NoHtml\Select as Select;
use Braspin\NoHtml\Util\Tag as Tag;

Tag::$endline = true;

$head = new Head();
$head->title('Contact');

$content = new Content();
$content->h1('Contact');

$div = new Div();
$div->content($content);

$body = new Content();
$body->div($div);

$select = new Select("teste", "id_select");
$select->option("teste", "");
$select->option("teste2", "teste1");

$inputs = new Content();
$inputs->input('text', '', 'nome');
$inputs->input('text', '', 'sobrenome');
$inputs->select($select);
$inputs->input('submit', 'Enviar');
$form = new Form('index.php?test=nome', 'POST');
$form->content($inputs);

$body->form($form);

$html = new Html($head, './cache', 'index.html', 1800);
$html->doctype()
     ->html('pt-br')
     ->body($body)
     ->echo();
