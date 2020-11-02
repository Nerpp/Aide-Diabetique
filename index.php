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
  Router
};

$displayView = new TemplateAdmin();
$displayView->showTemplate();
