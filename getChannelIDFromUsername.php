<?php
    $username = $_GET['username'];
    $connect = file_get_contents("https://www.youtube.com/" . $username);
    $channeli = explode('<meta property="og:site_name" content="YouTube"><meta property="og:url" content="', $connect);
    $channeli = explode('">', $channeli[1]);
    $channelidurl = "$channeli[0]";
    $channelid = explode('channel/', $channelidurl);
    $channelid = explode('/', $channelid[1]);
    $channelid = "$channelid[0]";
    echo $channelid;
