<?php
/**
 * Created by PhpStorm.
 * User: student
 * Date: 24/11/2015
 * Time: 11:21
 */

namespace classes\views;

class View {
    protected   $vars;

    /**
     * @return mixed
     */
    public function getVars()
    {
        return $this->vars;
    }

    /**
     * @param mixed $vars
     */
    public function setVars($vars)
    {
        $this->vars = $vars;
    }




    static function make($template , $vars='')
    {
        $vars = $vars;
        require $template;

    }
} 