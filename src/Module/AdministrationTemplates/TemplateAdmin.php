<?php
namespace App\Module\AdministrationTemplates;

use App\Module\Routeur;


class TemplateAdmin
{

    public function __construct()
    {
        $callRouteur = new Routeur;
        $page = $callRouteur->__setPage();
        $param = $callRouteur->__setParam();
        $folder = $callRouteur->__setFolder();

        $loader = new \Twig\Loader\FilesystemLoader('templates');

        $twig = new \Twig\Environment($loader, [
            'cache' => FALSE, //'tmp',
            'debug' => true,
        ]);

        $twig->addExtension(new \Twig\Extension\DebugExtension());
        $twig->addExtension(new MesExtensions());

//        $twig->addGlobal('session', $_SESSION);
        $twig->addGlobal('current_page', $page);

        echo $twig->render($folder."\\".$page.'.view.twig', $param);
    }

}
