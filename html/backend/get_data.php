<?php

include_once 'database.php';

function getTopics()
{ // Возвращает список всех существующих в базе "областей знаний"
    $result = exec_query('SELECT title FROM Topics;');
    $res = [];
    while ($row = $result->fetch_assoc()) {
        $res[] = $row['title'];
    }
    return $res;
}

function getChannels()
{ // Возвращает список всех существующих в базе каналов
    $result = exec_query('SELECT name from Channels;');
    $res = [];
    while ($row = $result->fetch_assoc()) {
        $res[] = $row['name'];
    }
    return $res;
}


function getTags()
{ // Возвращает список всех существующих в базе тэгов
    $result = exec_query('SELECT name FROM Hashtags;');
    $res = [];
    while ($row = $result->fetch_assoc()) {
        $res[] = $row['name'];
    }

    return $res;
}

function getMessages($channelName = '', $tag = '', $topic='')
{
    if (!$channelName && !$tag && !$topic) {
    $message1 = [
        'body' => 'I\'m beginnin\' to feeeel like a Rap God',
        'hashtag' => 'songs_lyrics',
        'owner' => 'Eminem',
        'channel' => 'rap',
        'private' => 'true'
    ];

} else {


    $message1 = [
        'body' => 'I\'m beginnin\' to feel like a Rap God',
        'hashtag' => 'songs_lyrics',
        'owner' => 'Eminem',
        'channel' => 'rap',
        'private' => 'true'
    ];
}
    $message2 = [
        'body' => 'usually i\'m drug-free, but shit i\'m with the homies ',
        'hashtag' => 'songs_lyrics',
        'owner' => 'Kendrick Lamar',
        'channel' => 'rap',
        'private' => 'false'
    ];

    $messages = [$message1, $message2];
    return $messages;
}

function addUser($username, $login, $password)
{
    $connection = get_connection();
    $prep = $connection->prepare('INSERT INTO Users (email, username, password) VALUES (?, ?, ?);');
    $prep->bind_param('sss', $login, $username, $password);
    $prep->execute();
    $connection->close();
}

?>