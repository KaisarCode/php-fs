<?php

// List folders in directory
static function listDirs($dir) {
    $arr = array();
    $dir = new DirectoryIterator($dir);
    foreach ($dir as $d) {
        if ($d->isDir() && !$d->isDot()) {
            $pth = $d->getPathname();
            array_push($arr, $pth);
        }
    }
    return $arr;
}

// List files in directory
static function listFiles($dir) {
    $arr = array();
    $dir = new DirectoryIterator($dir);
    foreach ($dir as $d) {
        if ($d->isFile()) {
            $pth = $d->getPathname();
            array_push($arr, $pth);
        }
    }
    return $arr;
}