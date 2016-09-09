<?php

require_once 'CRM/Core/Page.php';

class CRM_Extension_Page_ContacTab extends CRM_Core_Page {
  public function run() {
    $userid = $_SESSION["CiviCRM"]["userID"];

    /* Getting resources */
    CRM_Core_Resources::singleton()->addScriptUrl('https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.min.js',10, 'html-header');
    CRM_Core_Resources::singleton()->addScriptFile('com.contact.extension', 'js/ContacTab.js');
    CRM_Core_Resources::singleton()->addVars('Contactab', array('userid' => $userid));

    // Example: Set the page-title dynamically; alternatively, declare a static title in xml/Menu/*.xml
    CRM_Utils_System::setTitle(ts('ContacTab'));
    parent::run();
  }
}
