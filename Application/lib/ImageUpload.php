<?php

namespace Application\lib;

Class ImageUpload{

  public $image = [];

  public function rules()
  {
    return array('image/jpg','image/jpeg','image/png','image/webp');
  }

  public function uploadFile($file, $currentImage = '')
  {
    $this->image = $file;

    if ($this->validateImage()) {
      $this->deleteCurrentImage($currentImage);
      return $this->saveImage();
    }
  }

  private function validateImage(){
    if (in_array($this->image['type'],$this->rules()) &&
        is_uploaded_file($this->image['tmp_name']) &&
        ($this->image['size'] / 1024) < 10*1024) 
        return true;

    return false;
  }

  private function getFolder()
  {
    return  'public/uploads/users/';
  }


  private function generateFilename()
  {
    return strtolower(md5(uniqid($this->image['name'])) . "." . $this->getExtension());
  }

  private function getExtension()
  {
   return pathinfo($this->image['name'], PATHINFO_EXTENSION);
  }

  private function deleteCurrentImage($currentImage)
  {
    if ($this->fileExists($currentImage)) unlink($currentImage);
  }

  private function fileExists($currentImage)
  {
    if (!empty($currentImage) && $currentImage != null)
      return file_exists($currentImage);
  }

  private function saveImage()
  {
    $filename = $this->generateFilename();
    if (move_uploaded_file($this->image['tmp_name'], $this->getFolder().$filename)) {
      return $this->getFolder().$filename;
    }
    return false;
  }

}



?>
