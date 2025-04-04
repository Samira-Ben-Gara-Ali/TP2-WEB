<?php
class Session{
  private static $phpsessid=null;
  private function __construct()
  {
    if (session_status() !== PHP_SESSION_ACTIVE) {
      session_start();
  } 
  }

  public function increment(){
    if (isset($_SESSION['nbVisite'])){
    $_SESSION['nbVisite']++;
    }
    else{
      $_SESSION['nbVisite']=1;
    }
  }

  public function getNbVisite(){
    return isset($_SESSION['nbVisite']) ? $_SESSION['nbVisite'] : 0;
  }
 
  public static function getInstance(){
  if (!self::$phpsessid){
    self::$phpsessid=new Session();
  }
    return self::$phpsessid;
}
  public function destroy() {
    session_unset(); 
    session_destroy();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit; 
  }
}
?>