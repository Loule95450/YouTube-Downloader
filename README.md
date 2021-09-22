# YouTube-Downloader
The goal of project is to ease access to the YouTube videos link.

## 👩‍💻 Let's start by the API from Google

[Documentation of the YouTube API by Google](https://developers.google.com/youtube/v3)

## 🙌 Method used

### URL :
> https://www.youtube.com/youtubei/v1/player?key=`key`

### Content Type :

> JSON (application/json)

### Content :

```JSON
{
   "context":{
      "client":{
         "hl":"en",
         "clientName":"WEB",
         "clientVersion":"2.20210721.00.00",
         "clientFormFactor":"UNKNOWN_FORM_FACTOR",
         "clientScreen":"WATCH",
         "mainAppWebInfo":{
            "graftUrl": "/watch?v={Video ID}" // <- Change here (Delete this comment)
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
   "videoId":"{Video ID}", // <- Change here (Delete this comment)
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
}
```

## 💻 Add it to your PHP code

```PHP
<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://www.youtube.com/youtubei/v1/player?key={Key}',
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
            "graftUrl": "/watch?v={Video ID}" /* <- Change here */
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
   "videoId":"{Video ID}",  /* <- Change here */
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
echo $response;

```