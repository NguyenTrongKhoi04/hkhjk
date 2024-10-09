<?php

require 'vendor/autoload.php';

use Symfony\Component\Yaml\Yaml;

// Dữ liệu mẫu
$jsonData = '[
  {
    "_id": "6705f8661028436da69b808a",
    "index": 0,
    "guid": "b46b0a07-4a00-495b-bd19-5e204cfb0e4d",
    "isActive": true,
    "balance": "$3,420.53",
    "picture": "http://placehold.it/32x32",
    "age": 25,
    "eyeColor": "blue",
    "name": "Simon Hendrix",
    "gender": "male",
    "company": "TERRAGEN",
    "email": "simonhendrix@terragen.com",
    "phone": "+1 (836) 597-3278",
    "address": "855 Croton Loop, Frizzleburg, Arkansas, 9344",
    "about": "Officia eu est Lorem eiusmod aute consequat irure est Lorem eu aute voluptate. Nostrud eu elit minim nulla. Ipsum nostrud Lorem excepteur incididunt adipisicing consequat sunt. Elit adipisicing culpa ipsum minim id culpa magna occaecat. Deserunt excepteur nisi dolore velit velit anim. Velit culpa cillum pariatur nostrud. Do ex reprehenderit nostrud officia est sunt pariatur commodo id consectetur ipsum do ex.\r\n",
    "registered": "2016-10-11T11:44:16 -07:00",
    "latitude": 42.475024,
    "longitude": 128.978168,
    "tags": [
      "commodo",
      "sit",
      "sunt",
      "sint",
      "tempor",
      "adipisicing",
      "ipsum"
    ],
    "friends": [
      {
        "id": 0,
        "name": "Cunningham Hunt"
      },
      {
        "id": 1,
        "name": "Patti Cross"
      },
      {
        "id": 2,
        "name": "Ayala Whitley"
      }
    ],
    "greeting": "Hello, Simon Hendrix! You have 7 unread messages.",
    "favoriteFruit": "strawberry"
  },
  {
    "_id": "6705f8667692c9d22b1b09e3",
    "index": 1,
    "guid": "606456d7-ecd2-4d85-a547-e4a5ccbb7847",
    "isActive": false,
    "balance": "$2,249.17",
    "picture": "http://placehold.it/32x32",
    "age": 22,
    "eyeColor": "blue",
    "name": "Hudson Buck",
    "gender": "male",
    "company": "CORIANDER",
    "email": "hudsonbuck@coriander.com",
    "phone": "+1 (998) 549-3788",
    "address": "527 Chestnut Avenue, Linwood, New Hampshire, 5050",
    "about": "Incididunt commodo sit irure eu eiusmod esse laboris pariatur consectetur. Consequat laborum ut consequat minim est veniam duis. Est consequat minim deserunt ex ullamco veniam quis nulla. Reprehenderit duis ipsum non sint laborum. Fugiat incididunt dolore aliqua dolore duis pariatur amet pariatur culpa est.\r\n",
    "registered": "2019-10-06T06:51:03 -07:00",
    "latitude": 54.623769,
    "longitude": -58.862212,
    "tags": [
      "ea",
      "magna",
      "aute",
      "aliquip",
      "laborum",
      "mollit",
      "id"
    ],
    "friends": [
      {
        "id": 0,
        "name": "Althea Sanders"
      },
      {
        "id": 1,
        "name": "Paulette Cannon"
      },
      {
        "id": 2,
        "name": "Maura Kinney"
      }
    ],
    "greeting": "Hello, Hudson Buck! You have 3 unread messages.",
    "favoriteFruit": "banana"
  },
  {
    "_id": "6705f866eba4d57ad0d8d426",
    "index": 2,
    "guid": "92322d31-8e3b-487f-99ee-5233c3ac40b2",
    "isActive": true,
    "balance": "$3,965.93",
    "picture": "http://placehold.it/32x32",
    "age": 31,
    "eyeColor": "blue",
    "name": "Margie Garcia",
    "gender": "female",
    "company": "ZYTREK",
    "email": "margiegarcia@zytrek.com",
    "phone": "+1 (806) 507-3247",
    "address": "203 Grand Avenue, Grazierville, Delaware, 2137",
    "about": "Excepteur non dolore irure fugiat aliquip laborum excepteur. Veniam enim et velit minim dolor laborum Lorem. Incididunt veniam Lorem veniam consequat sint eiusmod dolor elit aliquip ut irure incididunt. Consequat duis elit culpa minim nostrud. Excepteur commodo et incididunt quis eiusmod adipisicing tempor.\r\n",
    "registered": "2021-01-06T08:45:19 -07:00",
    "latitude": 57.744862,
    "longitude": 40.481782,
    "tags": [
      "nulla",
      "cupidatat",
      "adipisicing",
      "ex",
      "sint",
      "est",
      "pariatur"
    ],
    "friends": [
      {
        "id": 0,
        "name": "Angelica Gay"
      },
      {
        "id": 1,
        "name": "Allyson Orr"
      },
      {
        "id": 2,
        "name": "Elise Santiago"
      }
    ],
    "greeting": "Hello, Margie Garcia! You have 1 unread messages.",
    "favoriteFruit": "strawberry"
  },
  {
    "_id": "6705f866569a4f47ee33457d",
    "index": 3,
    "guid": "256c17b2-29d3-4ee8-ad39-58192d0d0c67",
    "isActive": false,
    "balance": "$1,928.07",
    "picture": "http://placehold.it/32x32",
    "age": 40,
    "eyeColor": "brown",
    "name": "Key Keith",
    "gender": "male",
    "company": "MAGNINA",
    "email": "keykeith@magnina.com",
    "phone": "+1 (952) 424-3384",
    "address": "119 Hamilton Walk, Wattsville, Tennessee, 8282",
    "about": "Reprehenderit duis tempor sunt qui occaecat est laborum duis. Cillum voluptate velit in excepteur nisi mollit anim est nulla aliquip mollit in nostrud. Ut cillum excepteur qui commodo consequat quis aliquip. Aliqua eiusmod consectetur eu aute officia esse sit.\r\n",
    "registered": "2021-10-21T11:42:24 -07:00",
    "latitude": 55.416039,
    "longitude": -71.176592,
    "tags": [
      "aliquip",
      "ullamco",
      "ipsum",
      "nostrud",
      "fugiat",
      "anim",
      "id"
    ],
    "friends": [
      {
        "id": 0,
        "name": "Hattie Benjamin"
      },
      {
        "id": 1,
        "name": "Grace Ware"
      },
      {
        "id": 2,
        "name": "Lakeisha Callahan"
      }
    ],
    "greeting": "Hello, Key Keith! You have 1 unread messages.",
    "favoriteFruit": "strawberry"
  },
  {
    "_id": "6705f866bbb050fb30adb09a",
    "index": 4,
    "guid": "4b488c7a-4be9-4d40-8579-4014babf9824",
    "isActive": false,
    "balance": "$2,020.28",
    "picture": "http://placehold.it/32x32",
    "age": 32,
    "eyeColor": "blue",
    "name": "Taylor Hubbard",
    "gender": "male",
    "company": "QUORDATE",
    "email": "taylorhubbard@quordate.com",
    "phone": "+1 (869) 555-2616",
    "address": "506 Vista Place, Yardville, Hawaii, 4623",
    "about": "Proident anim non deserunt consectetur laboris aliquip laboris qui. Ipsum velit sit cillum cupidatat ipsum dolor fugiat nostrud aute. Magna labore ipsum ad in ipsum proident commodo velit nulla Lorem. Culpa tempor aliquip nulla id non ullamco deserunt in quis ut voluptate Lorem.\r\n",
    "registered": "2023-08-31T08:12:18 -07:00",
    "latitude": -1.623352,
    "longitude": -47.486096,
    "tags": [
      "minim",
      "nulla",
      "ut",
      "aute",
      "Lorem",
      "amet",
      "laborum"
    ],
    "friends": [
      {
        "id": 0,
        "name": "Morgan Franklin"
      },
      {
        "id": 1,
        "name": "Webb Parks"
      },
      {
        "id": 2,
        "name": "Clayton Dickerson"
      }
    ],
    "greeting": "Hello, Taylor Hubbard! You have 10 unread messages.",
    "favoriteFruit": "strawberry"
  }
]';

$data = json_decode($jsonData, true);
// Chuyển đổi mảng thành YAML với định dạng mong muốn
$yaml = Yaml::dump($data, 4, 2, Yaml::DUMP_MULTI_LINE_LITERAL_BLOCK);

// In ra dữ liệu YAML
echo $yaml;
