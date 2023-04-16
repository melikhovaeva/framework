<?php
function debug($str) {
  echo '<pre>';
  echo var_dump($str);
  echo '<pre>';
  exit;
}