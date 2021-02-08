<?php

// List folders in directory
function listDirs($dir, $rec = 0) {
    $arr = array();
    $dir = new DirectoryIterator($dir);
    foreach ($dir as $d) {
        $pth = $d->getPathname();
        $d->isDir() && !$d->isDot()
        && array_push($arr, $pth) &&
        $rec && $arr = array_merge
        ($arr, listDirs($pth));
    } return $arr;
}

// List files in directory
function listFiles($dir, $rec = 0) {
    $arr = array();
    $dir = new DirectoryIterator($dir);
    foreach ($dir as $d) {
        $pth = $d->getPathname();
        $d->isFile()
        && array_push($arr, $pth);
        $d->isDir() && !$d->isDot()
        && $rec && $arr = array_merge
        ($arr, listFiles($pth));
    } return $arr;
}
