<?php


  class FileExistException extends Exception{}
  class FileReadException extends Exception{}
  class FileWriteException extends Exception{}

  echo "Testing Exception Handling, <br>";

  $test_file = 'test.csv';
  try{
    try{
      $file = file_get_contents($test_file);
      if($file === false){
        throw new Exception();
        }
      }
  catch(Exception $e){
    if(!file_exists($test_file)){
      throw new FileExistException($test_file."<br>The file has not been created!");
    }
    elseif(!is_writable($test_file)){
      throw new FileWriteException($test_file." You cannot write this file");
    }
    else{
      throw new Exception("Error");
    }
  }
}
  catch(FileExistException $x){
    echo $x->getMessage();
      error_log($x->getTraceAsString());
  }
  
  catch(FileReadException $xr){
    echo $xr->getMessage();
      error_log($xr->getTraceAsString());
  }
  
  catch(FileWriteException $xy){
    echo $xy->getMessage();
      error_log($xy->getTraceAsString());
  }
?>
