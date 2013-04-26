<?php
/**
 * PWEB WP Theme framework
 *
 * @package    PWEB WP Theme framework
 *
 * @version    1.0
 * @author     Louis-Michel Raynauld
 * @copyright  Louis-Michel Raynauld
 * @link       http://graphem.ca
 */
namespace pweb\wp_core;

/**
 *
 * @package     pweb
 * @subpackage  wp_core
 */

abstract class WPaction implements WPhook
{
  protected $tag;
  protected $priority;
  protected $argsCount;

  abstract public function action();

  public function __construct($tag, $priority = 10, $acceptedArgs = 1)
  {
    $this->tag       = $tag;
    $this->priority  = $priority;
    $this->argsCount = $acceptedArgs;
  }

  public function register()
  {
    add_action($this->tag, array($this,'action'),$this->priority,$this->argsCount);
  }

  public function remove()
  {
    remove_action($this->tag, array($this,'action'),$this->priority,$this->argsCount);
  }
}