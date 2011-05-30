<?php
class Javascript
{
  private $_code;
  private $_isFile;
  private $_dependencies = array();
  private $_inFooter;
  private $_file;
  private $_isAdminJavascript;
  public function __construct($code, $dependencies, $isFile = true, $inFooter = false, $isAdminJavascript = false)
  {
    $this->_code = $code;
    $this->_isFile = $isFile;
    $this->_dependencies = $dependencies;
    $this->_inFooter = $inFooter;
    $this->_isAdminJavascript = $isAdminJavascript; // this will be used to refactor the way js is loaded in the admin
    $this->_init();
  }
  
  private function _init()
  {
    global $developer_tools;
    if( !IS_WP_ADMIN && !$this->_isAdminJavascript )
    {
      if( count($this->_dependencies) > 0 )
        add_action('init', array(&$this, 'ThemeInit'));
      if( $this->_isFile )
        $developer_tools['javascript']['theme']['header'] .= "\n/*" . $this->_code . "*/\n" .  file_get_contents( $this->_code );
    }
    //krumo( $developer_tools );
      
  }
  
  public function ThemeInit()
  {
    foreach( $this->_dependencies as $dependency )
      wp_enqueue_script( $dependency ); 
  }
}