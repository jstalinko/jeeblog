<?php

/**
 * *************************************************
 * JEEBLOG - create free blog zero configuration
 * @author JeeBlog Team.
 * @copyright 2024
 * *************************************************
 **/

// Path : app/fun.php
// "Lazy programmers solve problems twice: once when they create the bug and once when they fix it." — Unknown
// This file declare all functions needed in our systems.

/**
 * ALLOW AUTO REGISER FUNCTION FILE 
 */
$fun_allow_auto_register = false;


/** 
 * REGISTER FUNCTIONS FILE MANUALLY  HERE.
 * @note : this is useless when $fun_allow_auto_register is true
 */
$registerFun = [
    'client',
    'http',
    'server',
    'common',
    'data'
];

if ($fun_allow_auto_register) {
    // define fun path
    $fun_path =  __DIR__ . '/fun';

    //scan path
    $fun_files = glob($fun_path . '/*.fun.php');

    // require each file.
    array_map(function ($file) {
        if (file_exists($file)) {
            require_once($file);
        } else {
            throw new Exception($file . " Not found ");
        }
    }, $fun_files);
} else {

    array_map(function ($namedFile) {
        $fun_file = __DIR__ . '/fun/' . $namedFile . '.fun.php';
        if (file_exists($fun_file)) {
            require_once($fun_file);
        } else {
            throw new Exception($fun_file . " Not found ");
        }
    }, $registerFun);
}
