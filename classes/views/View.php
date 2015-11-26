<?php
/**
 * Created by PhpStorm.
 * User: student
 * Date: 24/11/2015
 * Time: 11:21
 */

namespace classes\views;

class View {


    static function app_start()
    {
        if(!isset($_GET['action'])){
            $_GET['action']='inicio';
            make_v('app');
        }else{

            make_v('app');
        }
    }
    static function action(){
        if( isset($_GET['action'])){

                $action=$_GET['action'];
            if( in_array($action,conf('options.pages_auth'))){

                make_v('actions.'.$action);
            }else{
               make_v('errors.404');
            }

        }
    }

    static function make($template , $var='')
    {
        $vars = $var;

        require $template;

    }

} 