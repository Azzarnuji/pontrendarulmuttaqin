<?php
class pengurus_db extends Connection{
   public function test(){
       return "BErhaisl";
   }
   public function posting($name){
       return "Post Berhasil $name";
   }

   public function Login($user,$pass){
    //    var_dump($user,$pass);
    if ($user == "Azzarnuji"){
        return "Ok";
    }else{
        return "gagal";
    }
   }
}