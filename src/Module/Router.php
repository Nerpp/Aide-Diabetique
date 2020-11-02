<?php
namespace App\Module;

use App\Module\Security\Filter;

class Router{

    protected $_sPage           = '';
    protected $_sFolder         = '';
    protected $_aParam          = array();
    private $_aCleanedUrl       = array();


    public function __construct()
    {
        $this->_aCleanedUrl = (new Filter())->__setParameters();
        $this->router();
    }

    private function router()
    {
        $this->_sPage = (empty($this->_aCleanedUrl['p'])) ? 'index' : $this->_aCleanedUrl['p'];

        switch ($this->_sPage){
            case 'index':
                $this->_sFolder = 'index';
                break;

            default:
                $this->_sPage = '404';
                $this->_sFolder = '404';
                break;
        }
    }
}