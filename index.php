<?php
$directionFile = __DIR__ . "/vendor/autoload.php";
require_once $directionFile;

// pour ajouter de nouvelle classe à l\'autoload composer dump-autoload --optimize
use App\Module\AdministrationTemplates\{
    TemplateAdmin,
    MesExtensions
};

use App\Module\Security\{
    UrlTreatment,
    Filter
};

use App\Module\{
  Routeur
};


//$callRouteur = new Routeur;
//$path = $callRouteur->__getPath();
//$param = $callRouteur->__getParam();

new TemplateAdmin();




//// initialisation des objets
//$gestionRoute           = new \App\Module\Routeur;
//$displayView = new \App\Module\administration_template\TemplateAdmin;
////Routing
//$parametres             = array();
//
//// traitement des parametres
//if ($gestionRoute->traitementUrl() !== NULL) {
//    $parametres = $gestionRoute->traitementUrl();
//}
//$gestionRoute->traitementRoute($parametres);
//
//$displayView->adminView($gestionRoute->setPath(), $gestionRoute->setParam());