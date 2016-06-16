<?php 

namespace App\Repository;
use File;

class Upload{
    
    private $name;
    private $filePath;
    
    public function __construct()
    {
        
        $this->filePath = public_path().'/img/upload/';
    }
    
    private function hashName($fileName)
    {
        $ex = explode('.', $fileName);
        $type = $ex[count($ex)-1];
        $newName = md5(microtime().$fileName).'.'.$type;
        return $newName;
    }
    
    public function setFilePath($filePathName)
    {
        $this->filePath .= $filePathName;
    }
    
    public function getFilePath()
    {
        return $this->filePath;
    }
    
    private function isImage($type)
    {
        $imgTypes = [
            'image/jpeg',
            'image/png'
        ];
        
        return in_array($type, $imgTypes);
    
    }
    
    public function unlink($link){
        if(File::exists($this->filePath.$link)){
            unlink($this->filePath.$link);
        }
    }
    
    public function uploadBase64Image($base64){
        $typeFormat = explode(":", explode(";", $base64)[0])[1];
        if($this->isImage($typeFormat)){
            $data = explode(',', $base64);
            $image = base64_decode($data[1]);
            $imageName = uniqid().".".explode("/", $typeFormat)[1];
            $this->getFilePath();
            file_put_contents($this->filePath.$imageName, $image);
            
            return $imageName;
        }else{
            
            return false;
        }
    }
}