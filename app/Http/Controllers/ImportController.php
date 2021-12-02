<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImportController extends Controller
{
    public function graduate_form_view()
    {
        return view('pages.import.degree');
    }

    public function graduate_import_data(Request $request)
    {
       
    }

function csvToArray($filename = '', $delimiter = ',')
{
    
    if (!file_exists($filename) || !is_readable($filename)){
        echo 'no file found';
        return false;
    }
    $header = null;
    $data = array();
    if (($handle = fopen($filename, 'r')) !== false)
    {
        echo 'jsdfjsfskdf';
        while (($row = fgetcsv($handle, 1000, $delimiter)) !== false)
        {
            if (!$header)
                $header = $row;
            else
                $data[] = array_combine($header, $row);
        }
        fclose($handle);
    }

    return $data;
}

public function importCsv(Request $request)
{
    $file = $request->file('import_graduate');
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

    $customerArr = $this->csvToArray($filepath);


    /*for ($i = 0; $i < count($customerArr); $i ++)
    {
        User::firstOrCreate($customerArr[$i]);
    }*/

    return dd( $customerArr);   
    } 
}

}
