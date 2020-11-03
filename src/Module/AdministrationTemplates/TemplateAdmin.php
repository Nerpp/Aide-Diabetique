<?php
namespace App\Module\AdministrationTemplates;

use App\Controller\IndexController;
use App\Module\Router;


class TemplateAdmin extends Router
{

    public function showTemplate()
    {
        $loader = new \Twig\Loader\FilesystemLoader('templates');

        $twig = new \Twig\Environment($loader, [
            'cache' => FALSE, //'tmp',
            'debug' => true,
        ]);

        $twig->addExtension(new \Twig\Extension\DebugExtension());
        $twig->addExtension(new MesExtensions());

//        $twig->addGlobal('session', $_SESSION);
        $twig->addGlobal('current_page', $this->_sPage);

        echo $twig->render($this->_sFolder."\\".$this->_sPage.'.view.twig', $this->_aParam);
    }

}
