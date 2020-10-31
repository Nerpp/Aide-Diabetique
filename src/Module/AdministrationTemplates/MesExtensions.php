<?php
namespace App\Module\AdministrationTemplates;

use Twig\Extension\AbstractExtension;

class MesExtensions extends AbstractExtension
{
    public function getFunctions()
    {
        return [
            new \Twig\TwigFunction('activeClass', [$this, 'activeClass'], ['needs_context' => true])
        ];
    }

    public function activeClass(array $context, $page){

        if (isset($context['current_page']) && $context['current_page'] === $page ) {
            return ' active ';
        }

    }
}
