<?php

require'app.php';

function incluirTempleate(string $nombre, bool $inicio = false){

  include TEMPLATES_URL. "/{$nombre}.php";
     
}