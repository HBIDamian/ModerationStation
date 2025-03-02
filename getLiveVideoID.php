<?php
function getLiveVideoID($channelId)
{
    $videoId = null;
    $url = 'https://www.youtube.com/embed/live_stream?channel=' . $channelId;
    $data = file_get_contents($url);

    if ($data !== false) {
        if (preg_match('/"VIDEO_ID":"(.*?)"/', $data, $matches)) {
            $videoId = $matches[1];
        } else {
            throw new Exception('Couldn\'t find video ID');
        }
    } else {
        throw new Exception('Couldn\'t fetch data');
    }
    return $videoId;
}

try {
    $channelId = $_GET['channelId'];
    $videoId = getLiveVideoID($channelId);
    echo $videoId;
} catch (Exception $e) {
    echo "ERROR: " . $e->getMessage();
}

?>

