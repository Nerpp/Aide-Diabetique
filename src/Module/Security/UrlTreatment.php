<?php
namespace App\Module\Security;

use App\Module\Security\Filter;


class UrlTreatment
{
    protected $_aParametres = array();

    /**
     * @return array
     */
    public function getParametres(): array
    {
        return $this->_aParametres;
    }

    public function __construct()
    {
        $this->_aFilter = new Filter;

        $securiteGet = $this->_aFilter->__setGet();
        $securitePost = $this->_aFilter->__setPost();

        if (isset($securiteGet) && count($securiteGet) > 0) {
            foreach ($securiteGet as $index => $value) {
                $this->_aParametres[$index] = $this->_aFilter->cleanValue($value);
            }
        } elseif (isset($securitePost) && count($securitePost) > 0) {
            foreach ($securitePost as $index => $value) {
                $this->_aParametres[$index] = $this->_aFilter->cleanValue($value);
            }
        }
    }

}