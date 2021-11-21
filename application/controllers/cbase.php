<?php

class cbase
{

    // SET MODEL
    public function setModel($modelName, $variable)
    {
        $path = models . $modelName . '.php';
        if (file_exists($path)) {
            require_once $path;
            $variable = new $modelName();
        }
        return $variable;
    }

    // 0: Get, 1: Post | name: Variable Name | whenError: Default value when error
    protected function getValue($method, $name, $whenError)
    {
        if ($method == 1) {
            return isset($_POST[$name]) ? $_POST[$name] : $whenError;
        } else if ($method == 0) {
            return isset($_GET[$name]) ? $_GET[$name] : $whenError;
        }
    }

    // 0: Get, 1: Post | name: Variable Name | whenError: Default value when error
    protected function getValueMulti($method, $name, $name2, $whenError)
    {
        if ($method == 1) {
            return isset($_POST[$name][$name2]) ? $_POST[$name][$name2] : $whenError;
        } else if ($method == 0) {
            return isset($_GET[$name][$name2]) ? $_GET[$name][$name2] : $whenError;
        }
    }
    
    protected function getFileNameUpload($HT_Icon)
    {
        $icon = 'null';
        if($HT_Icon != ''){
            $pos = strrpos($HT_Icon, '.');
            $ext = substr($HT_Icon, $pos);
            $simpleName = substr($HT_Icon, 0, $pos);
            $icon = $simpleName.'_'.time().$ext;
        }
        return $icon;
    }
    function phpAlert($msg) {
        echo '<script type="text/javascript">alert("' . $msg . '")</script>';
    }
    function phpAlertLocation($msg,$location) {
        echo    '<script type="text/javascript">
                    alert("' . $msg . '")
                    window.location.replace("' . $location . '");
                </script>';
    }
}
?>