<?php

defined('WYSIJA') or die('Restricted access');

class WYSIJA_control_back_cron_info extends WYSIJA_control_back {

  /**
   * Main view of this controller
   * @var string
   */
  public $view = 'cron_info';
  public $model = 'config';


  /**
   * Constructor
   */
  function __construct(){
    parent::__construct();
  }

  function defaultDisplay() {
  }
}
