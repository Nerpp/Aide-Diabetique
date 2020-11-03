<?php
namespace App\Module\Router;

use App\Controller\IndexController;
use App\Module\Security\Filter;

class Router{

    protected $_sPage           = '';
    protected $_sFolder         = '';
    protected $_aParam          = array();
    protected $_aCleanedUrl       = array();

    public function __construct()
    {
        $this->_aCleanedUrl = (new Filter())->__setParameters();
    }

    public function router()
    {

        $this->_sPage = (!isset($this->_aCleanedUrl['p'])) ? 'index' : $this->_aCleanedUrl['p'];

        switch ($this->_sPage){
            case 'index':
                $this->_sFolder = 'index';
                break;

            case'gestion':
                $this->_sFolder = 'gestion';
                break;

            case 'registration':
                $this->_sFolder = 'registration';
                break;

            default:
                $this->_sPage = '404';
                $this->_sFolder = '404';
                break;
        }
    }
}