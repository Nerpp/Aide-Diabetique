<?php
namespace App\Module\Security;

class Filter
{
    private $_aInputGet = array();
    private $_aInputPost = array();

    public function __setGet()
    {
        return $this->_aInputGet;
    }

    public function __setPost()
    {
        return $this->_aInputPost;
    }

    public function __construct()
    {
        $this->_aInputGet = filter_input_array(INPUT_GET);
        $this->_aInputPost = filter_input_array(INPUT_POST);
    }

    public function cleanValue($value){

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
}