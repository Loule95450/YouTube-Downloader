<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://www.youtube.com/youtubei/v1/player?key=AIzaSyAO_FJ2SlqU8Q4STEHLGCilw_Y9_11qcW8',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
   "context":{
      "client":{
         "hl":"en",
         "clientName":"WEB",
         "clientVersion":"2.20210721.00.00",
         "clientFormFactor":"UNKNOWN_FORM_FACTOR",
         "clientScreen":"WATCH",
         "mainAppWebInfo":{
            "graftUrl": "/watch?v='. $_GET['video'] .'"
         }
      },
      "user":{
         "lockedSafetyMode":false
      },
      "request":{
         "useSsl":true,
         "internalExperimentFlags":[
            
         ],
         "consistencyTokenJars":[
            
         ]
      }
   },
   "videoId":"'. $_GET['video'] .'", 
   "playbackContext":{
      "contentPlaybackContext":{
         "vis":0,
         "splay":false,
         "autoCaptionsDefaultOn":false,
         "autonavState":"STATE_NONE",
         "html5Preference":"HTML5_PREF_WANTS",
         "lactMilliseconds":"-1"
      }
   },
   "racyCheckOk":false,
   "contentCheckOk":false
}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo "<pre> ".$response."</pre>";

