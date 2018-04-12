<?php
$shellCommand=
curl -v -X POST "https://kapi.kakao.com/v2/api/talk/memo/default/send" \
-H "Authorization:  Bearer gLV32YwNjQa7TJ7ONSyjVJdRjVDCDonbWlmqcwo8BdgAAAFiuRXenQ" \
-d 'template_object= {
  "object_type": "feed",
  "content": {
    "title": "Banklist",
    "description": "테스트 테스트",
    "image_url": "http://211.253.30.86/images/siba.jpg",
    "image_width": 360,
    "image_height": 360,
    "link": {
      "web_url": "http://www.daum.net",
      "mobile_web_url": "http://m.daum.net",
      "android_execution_params": "contentId=100",
      "ios_execution_params": "contentId=100"
    }
  }
}'
shell_exec($shellCommand);
?>