<?php
/**
 * *************************************************
 * JEEBLOG - create free blog zero configuration
 * @author JeeBlog Team.
 * @copyright 2024
 * *************************************************
 **/

 // Path : app/boot.php
 // "I'm not lazy. I'm just very good at efficiently managing my energy." — Unknown
 // This file is "boot" for our applications to load all dependecies and config or routings.

 // load constant
 require_once __DIR__.'/const.php';

 // Load all functions.
 require_once __DIR__ . '/fun.php';

 // LOAD ACTIVE THEME.
 $ACTIVE_THEME = config('theme') ?? 'default';
 if(file_exists(THEME_PATH . DIRECTORY_SEPARATOR . $ACTIVE_THEME . '/_main.php'))
 {
    require_once THEME_PATH. DIRECTORY_SEPARATOR . $ACTIVE_THEME .'/_main.php';
 }else{
    echo "[!] Theme not found !";
    die("THEME : " . $ACTIVE_THEME);
 }