<?php
namespace App\Module\Security;

class Filter
{
    private $_aParameters = array();

    public function __setParameters()
    {
        return $this->_aParameters;
    }

    public function __construct()
    {
        $this->_aInputGet = filter_input_array(INPUT_GET);
        $this->_aInputPost = filter_input_array(INPUT_POST);
        $this->buildParameters();
    }

    public function cleanIndex($value){

        $value = trim($value);

        if (is_string($value)) {
            $value = filter_var($value, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
            return $value;
        }elseif(is_int($value)) {
            $value = filter_var($value, FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_LOW);
            return $value;
        }elseif (is_float($value)){
            $value = filter_var($value, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_STRIP_LOW);
            return $value;
        }
    }

    private function buildParameters()
    {
        if (isset($this->_aInputGet) && count($this->_aInputGet) > 0) {
            foreach ($this->_aInputGet as $index => $value) {
                $this->_aParameters[$index] = $this->cleanIndex($value);
            }
            return $this->_aParameters;
        } elseif (isset($this->_aInputPost) && count($this->_aInputPost) > 0) {
            foreach ($this->_aInputPost as $index => $value) {
                $this->_aParameters[$index] = $this->cleanIndex($value);
            }
            return $this->_aParameters;
        }
    }

}