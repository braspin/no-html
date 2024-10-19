<?php namespace Braspin\NoHtml;

class Attribute 
{
  const accept = 'accept';
  const accept_charset = 'accept-charset';
  const accesskey = 'accesskey';
  const action = 'action';
  const align = 'align';
  const allow = 'allow';
  const alt = 'alt';
  const as = 'as';
  const autoplay = 'autoplay';
  const autocapitalize = 'autocapitalize';
  const autocomplete = 'autocomplete';
  const background = 'background';
  const bgcolor = 'bgcolor';
  const border = 'border';
  const capture = 'capture';
  const charset = 'charset';
  const checked = 'checked';
  const cite = 'cite';
  const class_ = 'class';
  const color = 'color';
  const cols = 'cols';
  const colspan = 'colspan';
  const content = 'content';
  const contenteditable = 'contenteditable';
  const controls = 'controls';
  const coords = 'coords';
  const crossorigin = 'crossorigin';
  const csp = 'csp';
  const data = 'data';
  const data_ = 'data-';
  const datetime = 'datetime';
  const decoding = 'decoding';
  const default = 'default';
  const defer = 'defer';
  const dir = 'dir';
  const dirname = 'dirname';
  const disabled = 'disabled';
  const download = 'download';
  const draggable = 'draggable';
  const enctype = 'enctype';
  const enterkeyhint = 'enterkeyhint';
  const for = 'for';
  const form = 'form';
  const formaction = 'formaction';
  const formenctype = 'formenctype';
  const formmethod = 'formmethod';
  const formnovalidate = 'formnovalidate';
  const formtarget = 'formtarget';
  const headers = 'headers';
  const height = 'height';
  const hidden = 'hidden';
  const high = 'high';
  const href = 'href';
  const hreflang = 'hreflang';
  const http_equiv = 'http_equiv';
  const id = 'id';
  const integrity = 'integrity';
  const intrinsicsize = 'intrinsicsize';
  const inputmode = 'inputmode';
  const ismap = 'ismap';
  const itemprop = 'itemprop';
  const label = 'label';
  const lang = 'lang';
  const language = 'language';
  const loading = 'loading';
  const list = 'list';
  const loop = 'loop';
  const low = 'low';
  const max = 'max';
  const maxlength = 'maxlength';
  const minlength = 'minlength';
  const media = 'media';
  const method = 'method';
  const min = 'min';
  const multiple = 'multiple';
  const muted = 'muted';
  const name = 'name';
  const novalidate = 'novalidate';
  const open = 'open';
  const optimum = 'optimum';
  const pattern = 'pattern';
  const ping = 'ping';
  const placeholder = 'placeholder';
  const playsinline = 'playsinline';
  const poster = 'poster';
  const preload = 'preload';
  const property = 'property';
  const readonly = 'readonly';
  const referrerpolicy = 'referrerpolicy';
  const rel = 'rel';
  const required = 'required';
  const reversed = 'reversed';
  const role = 'role';
  const rows = 'rows';
  const rowspan = 'rowspan';
  const sandbox = 'sandbox';
  const scope = 'scope';
  const selected = 'selected';
  const shape = 'shape';
  const size = 'size';
  const sizes = 'sizes';
  const slot = 'slot';
  const span = 'span';
  const spellcheck = 'spellcheck';
  const src = 'src';
  const srcdoc = 'srcdoc';
  const srclang = 'srclang';
  const srcset = 'srcset';
  const start = 'start';
  const step = 'step';
  const style = 'style';
  const tabindex = 'tabindex';
  const target = 'target';
  const title = 'title';
  const translate = 'translate';
  const type = 'type';
  const usemap = 'usemap';
  const value = 'value';
  const width = 'width';
  const wrap = 'wrap';

  public static function add_attrs(array $attrs)
  {
    $result = "";

    foreach($attrs as $attr => $value)
    {
      if(gettype($value) === "array")
      {
        $result .= self::add_attr($attr, key($value), current($value)) . ' ';
      }
      else
      {
        $result .= self::add_attr($attr, $value) . ' ';
      }
    }
    
    return $result;
  }
  public static function add_attr(string $attr, string $values, bool $force = false)
  {
    if($force == false) 
    {
      if(empty($values))
      {
        return '';
      }
    }

    return $attr . '="' . $values . '"';
  }

}