<?php

use App\Kernel;

require_once dirname(__DIR__).'/vendor/autoload_runtime.php';

return function (array $context) {
    return new Kernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);

};


/* Front controller: dans l'appli toutes les requetes http vont passer par ce fichier
et en fonction de la requete on fera appelle aux differents controllers */