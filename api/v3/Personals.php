<?php

/**
  *  Not implemented yet
 */
function civicrm_api3_personals_create($params) {
    //return civicrm_api3_create_success($personalsArray, $params, 'Entity', 'get', $personalsBAO);
}

/**
 * Gets a Personals data according to ID PCP.
 *
 * @param array $params
 *   Array per getfields documentation.
 *
 * @return array API result array
 *   API result array
 */
function civicrm_api3_personals_get($params) {
  //Getting the User id currently
  if (!empty($params['contact_id'])) {
    //System core PCP
    $pcp = new CRM_PCP_BAO_PCP();
    global $base_url;

    /* Getting pcp by user */
    $personalCamp = $pcp->getPcpDashboardInfo($params['contact_id']);

    //Formating data to show later
    $datapcp = array();
    $n = 0;
    foreach ($personalCamp[1] as $pcpdata) {
      /* Getting pcp info */
      $prms = array('id' => $pcpdata["pcpId"]);
      CRM_Core_DAO::commonRetrieve('CRM_PCP_DAO_PCP', $prms, $pcpInfo);

      $datapcp[$n]["pcpId"] = $pcpdata["pcpId"];
      $datapcp[$n]["pageTitle"] = $pcpdata["pageTitle"];
      $datapcp[$n]["pcpTitle"] = $pcpdata["pcpTitle"];
      $datapcp[$n]["pcpStatus"] = $pcpdata["pcpStatus"];
      $datapcp[$n]["pcpGoalAmount"] = $pcpInfo["goal_amount"];
      $datapcp[$n]["pcpAmount"] = $pcp->thermoMeter($pcpdata["pcpId"]);
      $datapcp[$n]["pcpLink"] = $base_url."/index.php?q=civicrm/pcp/info&reset=1&id=".$pcpdata["pcpId"];
      $datapcp[$n]["pcpEditLink"] = $base_url."/index.php?q=civicrm/pcp/info&action=update&reset=1&id=".$pcpdata["pcpId"]."&context=dashboard";
      $datapcp[$n]["contribPage"] = $pcp->getPcpPageTitle($pcpdata["pcpId"], "contribute");
      $datapcp[$n]["eventPage"] = $pcp->getPcpPageTitle($pcpdata["pcpId"], "event");
      $datapcp[$n]["idscontributions"] = array();
      foreach ($pcp->honorRoll($pcpdata["pcpId"]) as $coontrid => $contribs){
        $urlcontrib = $base_url."/index.php?q=civicrm/contact/view/contribution&reset=1&id=".$coontrid."&cid=34&action=view&context=search&selectedChild=contribute";
        $datapcp[$n]["idscontributions"][] = "<a target='_blank' href='".$urlcontrib."'>".$contribs["total_amount"]." ".$contribs["nickname"]."</a>";
      }

      /* If not found contributions, show notification */
      if (empty($datapcp[$n]["idscontributions"])) {
        $datapcp[$n]["idscontributions"][] = "Not Found Contributions";
      }

      $datapcp[$n]["noContribs"] = count($pcp->honorRoll($pcpdata["pcpId"]));
      $n++;
    }
  }else{
    throw new API_Exception(ts("Unable to return list, contact_id not exist."));
  }

  //legacy custom data get - so previous formatted response is still returned too
  return civicrm_api3_create_success($datapcp, $params, 'Personals', 'get');
}

/**
  *  Not implemented yet
 */
function civicrm_api3_personals_delete($params) {
  /*
  if (CRM_Activity_BAO_Activity::deletepersonals($params)) {
    return civicrm_api3_create_success(1, $params, 'Entity', 'delete');
  }
  else {
    throw new API_Exception('Could not delete Entity');
  }*/
}