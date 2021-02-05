<?php
namespace KC;

// Filesystem
Class FS {
    
    // List folders in directory
    static function listDirs($dir, $rec = 0) {
        $arr = array();
        $dir = new \DirectoryIterator($dir);
        foreach ($dir as $d) {
            $pth = $d->getPathname();
            $d->isDir() && !$d->isDot()
            && array_push($arr, $pth) &&
            $rec && $arr = array_merge
            ($arr, self::listDirs($pth));
        }
        return $arr;
    }
    
    // List files in directory
    static function listFiles($dir) {
        $arr = array();
        $dir = new \DirectoryIterator($dir);
        foreach ($dir as $d) {
            $pth = $d->getPathname();
            $d->isFile() &&
            array_push($arr, $pth);
        }
        return $arr;
    }
}
