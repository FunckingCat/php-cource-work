<?php

include_once 'database.php';

function getChannels () { // Возвращает список всех существующих каналов
    $channelsList = ['channel name 1', 'channel name 2', 'channel name 3']; 
    return $channelsList; 
}


function getTags () { // Возвращает список всех существующих в базе тэгов
    $tagsList = ['tag1', 'tag2', 'tag3'];

    $sql = exec_query('SELECT');
    return $tagsList;
}

function getCurrentUsername () { // Возвращает имя пользователя текущей сессии (опционально, можно вырезать)
    $currentUsername = 'Богдан';
    return $currentUsername;
}

function getMessages($channelName = '', $tag = '')
{
    $message1 = [
        'body' => 'I\'m beginnin\' to feel like a Rap God',
        'hashtag' => 'songs_lyrics',
        'owner' => 'Eminem',
        'channel' => 'rap',
        'private' => 'true'
    ];
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