<?php 

use Deline\Component\Security;

//export to global variable.
$GLOBALS["parameters"] = $parameters;
$GLOBALS["attributes"] = $attributes;
$GLOBALS["session"] = $session;

function deline_load_stylesheet($filename) {
    
}

function deline_load_script($filename) {
    
}
function deline_show_file($filename) {
    $parameters = $GLOBALS["parameters"];
    $attributes = $GLOBALS["attributes"];
    $session    = $GLOBALS["session"];
    require_once $filename;
}
function delien_show_template($template_name) {
    deline_show_file(getcwd()."/templates/tpl.".$template_name.".php");
}
function deline_show_html_head() {
    delien_show_template("html.head");
}
function deline_show_html_foot() {
    delien_show_template("html.foot");
}
function deline_show_header() {
    delien_show_template("header");
}

function deline_show_footer() {
    delien_show_template("footer");
}

function deline_show_text($text) {
    echo Security::escapeHTML($text);
}
