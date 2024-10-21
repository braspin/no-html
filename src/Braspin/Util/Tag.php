<?php namespace Braspin\NoHtml\Util;

include_once __DIR__ .'/Render.php';
include_once __DIR__ .'/Attribute.php';

class Tag
{
  const doctype = "!DOCTYPE html";
  const abbr = "abbr";
  const acronym = "acronym";
  const abbreviation = "abbreviation";
  const address = "address";
  const a = "a";
  const applet = "applet";
  const area = "area";
  const article = "article";
  const aside = "aside";
  const audio = "audio";
  const base = "base";
  const basefont = "basefont";
  const bdi = "bdi";
  const bdo = "bdo";
  const bgsound = "bgsound";
  const big = "big";
  const blockquote = "blockquote";
  const body = "body";
  const b = "b";
  const br = "br";
  const button = "button";
  const caption = "caption";
  const canvas = "canvas";
  const center = "center";
  const cite = "cite";
  const code = "code";
  const colgroup = "colgroup";
  const col = "col";
  const data = "data";
  const datalist = "datalist";
  const dd = "dd";
  const dfn = "dfn";
  const del = "del";
  const details = "details";
  const dialog = "dialog";
  const dir = "dir";
  const div = "div";
  const dl = "dl";
  const dt = "dt";
  const embed = "embed";
  const fieldset = "fieldset";
  const figcaption = "figcaption";
  const figure = "figure";
  const font = "font";
  const footer = "footer";
  const form = "form";
  const frame = "frame";
  const frameset = "frameset";
  const head = "head";
  const header = "header";
  const h1 = "h1";
  const h2 = "h2";
  const h3 = "h3";
  const h4 = "h4";
  const h5 = "h5";
  const h6 = "h6";
  const hgroup = "hgroup";
  const hr = "hr";
  const html = "html";
  const iframe = "iframe";
  const img = "img";
  const input = "input";
  const ins = "ins";
  const isindex = "isindex";
  const i = "i";
  const kbd = "kbd";
  const keygen = "keygen";
  const label = "label";
  const legend = "legend";
  const li = "li";
  const main = "main";
  const mark = "mark";
  const marquee = "marquee";
  const menuitem = "menuitem";
  const meta = "meta";
  const meter = "meter";
  const nav = "nav";
  const nobr = "nobr";
  const noembed = "noembed";
  const noscript = "noscript";
  const object = "object";
  const ol = "ol";
  const optgroup = "optgroup";
  const option = "option";
  const output = "output";
  const p = "p";
  const param = "param";
  const em = "em";
  const pre = "pre";
  const progress = "progress";
  const q = "q";
  const rp = "rp";
  const rt = "rt";
  const ruby = "ruby";
  const s = "s";
  const samp = "samp";
  const script = "script";
  const section = "section";
  const select = "select";
  const small = "small";
  const source = "source";
  const spacer = "spacer";
  const span = "span";
  const strike = "strike";
  const style = "style";
  const strong = "strong";
  const tagname = "tagname";
  const sub = "sub";
  const summary = "summary";
  const svg = "svg";
  const table = "table";
  const tbody = "tbody";
  const td = "td";
  const template = "template";
  const tfoot = "tfoot";
  const th = "th";
  const thead = "thead";
  const time = "time";
  const title = "title";
  const tr = "tr";
  const track = "track";
  const tt = "tt";
  const u = "u";
  const ul = "ul";
  const var = "var";
  const video = "video";
  const wbr = "wbr";
  const xmp = "xmp";

  public static function open(string $name)
  {
    return '<'. $name . '>';
  }

  public static function close(string $name)
  {
    return '</'. $name . '>';
  }

  public static function non_closing_tag(string $name, array $attrs = [], array $args = [], string $custom = '')
  {
    $result = '<'
              . $name
              . ' '
              . Attribute::add_attrs($attrs)
              . ' '
              . Attribute::add_attrs($args)
              . ' '
              . $custom
              . '>';
    return $result;
  }

  public static function tag(string $name, string|Render $content = '', array $attrs = [], array $args = [], string $custom = '')
  {
    $result = '<'
              . $name
              . ' '
              . Attribute::add_attrs($attrs)
              . ' '
              . Attribute::add_attrs($args)
              . ' '
              . $custom
              . '>';

    if(is_string($content)){
      $result .= $content;
    } else {
      $result .= $content->render();
    }

    $result .= self::close($name);
    return $result;
  }
}