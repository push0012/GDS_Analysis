<?php

namespace App\Services;

use Auth;

class FileOpen {

    function csvToArray($file, $delimiter = ',')
    {

        if ($file) {
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension(); //Get extension of uploaded file
            $tempPath = $file->getRealPath();
            $fileSize = $file->getSize(); //Get size of uploaded file in bytes

            //Where uploaded file will be stored on the server 
            $location = 'uploads'; //Created an "uploads" folder for that
            // Upload file
            $file->move($location, $filename);
            // In case the uploaded file path is to be stored in the database
            $filepath = public_path($location . "/" . $filename);
            //$file = public_path($filename);


        if (!file_exists($filepath) || !is_readable($filepath)) {
            echo 'no file found';
            return false;
        }
        $header = null;
        $data = array();
        if (($handle = fopen($filepath, 'r')) !== false) {
            
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false) {
                if (!$header)
                    $header = $row;
                else
                    $data[] = array_combine($header, $row);
            }
            fclose($handle);
        }
    }
        return $data;
    }

}