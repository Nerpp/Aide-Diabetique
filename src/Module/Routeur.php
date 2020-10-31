<?php
namespace App\Module;

use App\Module\Security\UrlTreatment;

class Routeur{

    private $_sPage    = '';
    private $_sFolder = '';
    private $_aCleanedUrl       = array();
    private $_aParam = array();

    public function __construct()
    {
        $this->_aCleanedUrl = (new UrlTreatment())->getParametres();
        $this->router();
    }

    public function __setPage()
    {
      return  $this->_sPage;

    }

    public function __setFolder()
    {
        return $this->_sFolder;
    }

    public function __setParam()
    {
        return $this->_aParam;
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