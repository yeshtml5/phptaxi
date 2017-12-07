<?php
/*
파일 폴더 강제삭제
해당폴더 상위에다가. del.php 실행 
*/
 function rmdir_ok($dir) {
      $dirs = dir($dir);
      while(false !== ($entry = $dirs->read())) {
          if(($entry != '.') && ($entry != '..')) {
              if(is_dir($dir.'/'.$entry)) {
                    rmdir_ok($dir.'/'.$entry);
              } else {
                    @unlink($dir.'/'.$entry);
              }
          }
      }
      $dirs->close();
      @rmdir($dir);
  }

rmdir_ok("test");
?>
