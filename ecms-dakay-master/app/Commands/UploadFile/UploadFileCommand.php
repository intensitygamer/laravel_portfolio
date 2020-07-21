<?php

namespace App\Commands\UploadFile;

use Illuminate\Http\Request;
use Input;

class UploadFileCommand
{
    protected $request;
    protected $fileTag = 'file';

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function execute()
    {
        $data = $this->request;

        $file = $data->file;

        $destinationPath = 'uploads/tmp/'; // uploaded temp path

        $mimeType = $file->getMimeType();
        $extension = $file->guessExtension();
        $file_name = $file->getClientOriginalName();
        $file_url = $this->generateFileName($extension,$mimeType);

        $data->file->move($destinationPath, $file_url); // uploading file to given path

        return ['file_name' => $file_name, 'file_url' => $file_url, 'mimetype' => $mimeType];
    }


    /**
     * Auto generates the filenem
     * @param $extension string The file extension
     * @return string The autogenerated unique filename
     */
    public function generateFileName($extension='',$mimeType='')
    {
        if($mimeType)
        {
            if(isset($this->fileTypes[$mimeType]))
            {
                $this->fileTag = $this->fileTypes[$mimeType];
            }
        }

        return uniqid($this->fileTag.'_').'.'.$extension;
    }
}