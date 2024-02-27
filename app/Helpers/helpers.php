<?php

define('SUCCESS', 200);	            // The service call has completed successfully.
define('ERROR', 400);
define('VALIDATION_FAILED', 422);
define('UNAUTHORIZED', 401);

function error($code = '0', $message = 'Something went wrong!', $status = 400, $errors = [],  $headers = ['Content-Type'=>'application/json'])

{

    $error = array();
    $error['status'] = $code;
    $error['message'] = $message;
    // $error['data'] = [];
   $error['data'] = new \stdClass();

    if (!empty($errors)){
        $error['errors'] = $errors;
    }

   // return response()->json($error, $status, $headers);
    return response()->json($error);
}

function success($code = '1',$message = 'Success',$data = [], $status = 200, $headers = ['Content-Type'=>'application/json'])
{
  ini_set('memory_limit', '512M');
	$success = array();
	$success['status'] = $code;

    //  $a = new \stdClass();

    if(isset($data) || is_array($data)){
        // if ($data instanceof Illuminate\Database\Eloquent\Collection) {
        //    $data = (object)$data;
        // }

        // if(is_object($data)){
        //     $data = $data->toArray();
        // }

        // $success['data'] = $data;

        // $data = array_to_object($data);
        $data = (object)$data;
    }
    $success['data'] = $data;
    $success['message'] = $message;

    return response()->json($success);

    
}

function phoneFormat($phone)
{
    $characters = ["-", "(", ")"," "];
    $characters_replace_with = ["", "", "",""];

    $newPhone = str_replace($characters, $characters_replace_with, $phone);

    return $newPhone;
}

function phoneDisplayFormat($phone)
{
    $result = '';
    if(  preg_match( '/(\d{3})(\d{3})(\d{4})$/', $phone,  $matches ) ){
        $result = $matches[1] . '-' .$matches[2] . '-' . $matches[3];
    }

    return $result;
}

function array_to_object($array) {
  $obj = new \stdClass;
  // dd($array);
  if($array  !== true && $array !== false){
        if(count($array) > 0){
          foreach($array as $k => $v) {

            // if(is_object($v)){
            //     $v = $v->toArray();
            // }

            // if ($v instanceof Illuminate\Database\Eloquent\Collection) {
            //     $v = $v->toArray();
            // }

            if(strlen($k)) {
                if(is_array($v)) {
                   $obj->{$k} = array_to_object($v); //RECURSION
                } else {
                   $obj->{$k} = $v;
                }
             }
          }
      }
  }



  return $obj;
} 

function distance($lat1, $lon1, $lat2, $lon2, $unit) {

  if (($lat1 == $lat2) && ($lon1 == $lon2)) {
    return 0;
  }
  else {
    $theta = $lon1 - $lon2;
    $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
    $dist = acos($dist);
    $dist = rad2deg($dist);
    $miles = $dist * 60 * 1.1515;
    $unit = strtoupper($unit);

    if ($unit == "K") {
      return round(($miles * 1.609344));
    } else if ($unit == "N") {
      return round(($miles * 0.8684));
    } else {
      return round($miles);
    }
  }
}


