<?php
namespace App\Helper;
class Helper
{
    public static function upload($file, $folderName)
    {
        $time = microtime();
        $time = str_replace(" ", "", $time);
        $filename = $time . $file->getClientOriginalName();
        $file->move($folderName, $filename);
        return $filename;
    }
}