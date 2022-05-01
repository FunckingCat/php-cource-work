<?php

include_once 'database.php';

function getChannels () { // Возвращает список всех существующих каналов
    $result = exec_query('SELECT name FROM Channels;');
    $res = [];
    while($row = $result->fetch_assoc()) {
        $res[] = $row['name'];
    }
    return $res;
}


function getTags () { // Возвращает список всех существующих в базе тэгов
    $result = exec_query('SELECT name FROM Hashtags;');
    $res = [];
    while($row = $result->fetch_assoc()) {
        $res[] = $row['name'];
    }
    return $res;
}

function getCurrentUsername () { // Возвращает имя пользователя текущей сессии (опционально, можно вырезать)
    return 'Богдан';
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

    return [$message1, $message2];
}

function addUser($username, $login, $password)
{
    $connection = get_connection();
    $prep = $connection->prepare('INSERT INTO Users (email, username, password) VALUES (?, ?, ?);');
    $prep->bind_param('sss', $login, $username, $password);
    $prep->execute();
    $connection->close();
}

/**
 * @throws Exception
 */
function post_message($body, $hashtag, $owner, $channel, $private=false)
{
    $datetime = (new DateTime("now", new DateTimeZone('Europe/Moscow')))->format('Y-m-d H:i:s');
    $connection = get_connection();
    $prep = $connection->prepare('INSERT INTO Messages (body, dispatch_time, private, hashtag, owner, channel) VALUES (?, ?, ?, ?, ?, ?);');
    $prep->bind_param('ssisss', $body, $datetime, $private, $hashtag, $owner, $channel);
    $prep->execute();
    $connection->close();
}

function getUserById($id)
{
    return exec_query(sprintf('SELECT * FROM Users WHERE id = %d', $id));
}

function getUserByName($name)
{
    return exec_query(sprintf('SELECT * FROM Users WHERE username = \'%s\'', $name));
}

?>