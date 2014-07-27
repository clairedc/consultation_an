<?php

include(__DIR__.'/../model/document.php');

$doc = get_document_from_name_and_formid($_GET['nom'], $_GET['partie']);
if (!$doc) {
  $cururl = "http://" . $_SERVER['HTTP_HOST']  . $_SERVER['REQUEST_URI'];
  $baseurl = preg_replace("#/[^/]*$#", "/", $cururl);
  header('Location: '.$baseurl, true, 301);
  die();
}
$nom = $doc['nom'];
$avatar = $doc['avatar'];
$img = $doc['img'];
$section = $doc['section'];
$partie = $doc['partie'];
$source = $doc['source'];

$menu_declaration = 1;

if ($doc['done'] || $_GET['showcontribs']) {
  $numerisations = get_document_tasks($doc['id']);
}

