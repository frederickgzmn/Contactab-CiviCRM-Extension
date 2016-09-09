<?php
/**
 * Test Generated example demonstrating the Activity.get API.
 *
 * @return array
 *   API result array
 */
function activity_get_example() {
  $params = array(
    'contact_id' => 1,
  );

  try{
    $result = civicrm_api3('Personals', 'get', $params);
  }
  catch (CiviCRM_API3_Exception $e) {
    // Handle error here.
    $errorMessage = $e->getMessage();
    $errorCode = $e->getErrorCode();
    $errorData = $e->getExtraParams();
    return array(
      'error' => $errorMessage,
      'error_code' => $errorCode,
      'error_data' => $errorData,
    );
  }

  return $result;
}

/**
 * Function returns array of result expected from previous function.
 *
 * @return array
 *   API result array
 */
function activity_get_expectedresult() {

  $expectedResult = array(
    'is_error' => 0,
    'version' => 3,
    'count' => 1,
    'id' => 1,
    'values' => array(
      '0' => array(
        'source_contact_id' => '1',
        'id' => '1',
        'activity_type_id' => '51',
        'subject' => 'test activity type id',
        'location' => 'Pennsylvania',
        'activity_date_time' => '2011-06-02 14:36:13',
        'details' => 'a test activity',
        'status_id' => '2',
        'activity_name' => 'Test activity type',
        'status' => 'Completed',
        'custom_1' => 'custom string',
        'custom_1_1' => 'custom string',
      ),
    ),
  );

  return $expectedResult;
}