<?php

use Civi\Test\HeadlessInterface;
use Civi\Test\HookInterface;
use Civi\Test\TransactionalInterface;

/**
 * Simple API Test ContacTab Extension - Testing extension.
 *
 */
class CRMUnit_ContacTab_Test extends \PHPUnit_Framework_TestCase implements HeadlessInterface, HookInterface, TransactionalInterface {

  /**
   * Example: Test that we're using a fake CMS.
   */
  public function testApiPersonals() {
    $result = civicrm_api3('Personals', 'get', array(
      'sequential' => 1,
      'contact_id' => 168,
    ));
    print_r($result);
  }

}
