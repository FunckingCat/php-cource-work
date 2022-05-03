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
{ // Возвращает список всех существующих в базе тегов
    $result = exec_query('SELECT name FROM Hashtags;');
    $res = [];
    while ($row = $result->fetch_assoc()) {
        $res[] = $row['name'];
    }

    return $res;
}

function getMessages($channel = '', $tag = '', $topic = '')
{


    $res = [];
    if (!$channel && !$tag && !$topic) { // Если пришел полностью пустой запрос - вывод всех имеющихся сообщений
        $result = exec_query(
            '
SELECT body, username, c.name AS channel, h.name AS hashtag, dispatch_time
    FROM Messages
         JOIN Hashtags H ON Messages.hashtag = H.id
         JOIN Users U ON Messages.owner = U.id
         JOIN Channels C ON Messages.channel = C.id
    ORDER BY dispatch_time DESC');
        while ($row = $result->fetch_assoc()) {
            $res[] = $row;
        }

    } elseif ($channel && !$tag && !$topic) { //Если пришел запрос на получение сообщений только с одного канала
        $result = exec_query(
            '
SELECT body, username, c.name AS channel, h.name AS hashtag, dispatch_time
    FROM Messages
         JOIN Hashtags H ON Messages.hashtag = H.id
         JOIN Users U ON Messages.owner = U.id
         JOIN Channels C ON Messages.channel = C.id
    WHERE C.id = ' . getChannelByName($channel)->fetch_assoc()['id'] . '
ORDER BY dispatch_time DESC');
        while ($row = $result->fetch_assoc()) {
            $res[] = $row;
        }

    } elseif ($channel && ($tag or $topic)) { //Если пришел запрос на получение сообщений только с одного канала с нужным тегом или топиком
        $mainRequset = '
SELECT body, username, c.name AS channel, h.name AS hashtag, title AS topic, t.id AS topic_id, dispatch_time
FROM Messages
         JOIN Hashtags H ON Messages.hashtag = H.id
         JOIN Users U ON Messages.owner = U.id
         JOIN Channels C ON Messages.channel = C.id
         JOIN TopicHashtags TH ON Messages.hashtag = TH.hashtag
         JOIN Topics T ON TH.topic = T.id ';

        if ($tag && $topic) { //Поиск по каналу, тегу и топику
            $result = exec_query($mainRequset .
                'WHERE C.id = ' . getChannelByName($channel)->fetch_assoc()['id'] . '
AND T.id = ' . getTopicByName($topic)->fetch_assoc()['id'] . '
AND H.id = ' . getTagByName($tag)->fetch_assoc()['id'] . '
     ORDER BY dispatch_time DESC');

        } elseif ($tag && !$topic) { //Поиск по каналу и тегу
            $result = exec_query('
SELECT body, username, c.name AS channel, h.name AS hashtag, dispatch_time
FROM Messages
         JOIN Hashtags H ON Messages.hashtag = H.id
         JOIN Users U ON Messages.owner = U.id
         JOIN Channels C ON Messages.channel = C.id ' .
                'WHERE C.id = ' . getChannelByName($channel)->fetch_assoc()['id'] .
                ' AND H.id = ' . getTagByName($tag)->fetch_assoc()['id'] . '
     ORDER BY dispatch_time DESC');

        } elseif (!$tag && $topic) { //Поиск по каналу и топику
            $result = exec_query($mainRequset .
                'WHERE C.id = ' . getChannelByName($channel)->fetch_assoc()['id'] . '
AND T.id = ' . getTopicByName($topic)->fetch_assoc()['id'] . '
     ORDER BY dispatch_time DESC');
        }


    } elseif ($tag && !$topic && !$channel) { //Поиск только по тегу
        $result = exec_query('SELECT body, username, c.name AS channel, h.name AS hashtag, dispatch_time
FROM Messages
         JOIN Hashtags H ON Messages.hashtag = H.id
         JOIN Users U ON Messages.owner = U.id
         JOIN Channels C ON Messages.channel = C.id
WHERE Messages.hashtag = ' . getTagByName($tag)->fetch_assoc()['id'] . ' 
ORDER BY dispatch_time DESC');

    } elseif (!$tag && $topic && !$channel) { //Поиск только по топику
        $result = exec_query('SELECT body, username, c.name AS channel, h.name AS hashtag, title AS topic, t.id AS topic_id, dispatch_time
FROM Messages
         JOIN Hashtags H ON Messages.hashtag = H.id
         JOIN Users U ON Messages.owner = U.id
         JOIN Channels C ON Messages.channel = C.id
         JOIN TopicHashtags TH ON Messages.hashtag = TH.hashtag
         JOIN Topics T ON TH.topic = T.id 
            WHERE T.id = ' . getTopicByName($topic)->fetch_assoc()['id'] .
            ' ORDER BY dispatch_time DESC');
    } elseif ($tag && $topic && !$channel) { //Поиск только по топику
        $result = exec_query('SELECT body, username, c.name AS channel, h.name AS hashtag, title AS topic, t.id AS topic_id, dispatch_time
FROM Messages
         JOIN Hashtags H ON Messages.hashtag = H.id
         JOIN Users U ON Messages.owner = U.id
         JOIN Channels C ON Messages.channel = C.id
         JOIN TopicHashtags TH ON Messages.hashtag = TH.hashtag
         JOIN Topics T ON TH.topic = T.id 
            WHERE T.id = ' . getTopicByName($topic)->fetch_assoc()['id'] .
            ' AND H.id = ' . getTagByName($tag)->fetch_assoc()['id'] .
            ' ORDER BY dispatch_time DESC');
    }
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $res[] = $row;
        }
    } else {
        return 0;
    }

    return $res;
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
function post_message($body, $hashtag, $owner, $channel, $private = false)
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

function getChannelByName($name)
{
    return exec_query(sprintf('SELECT * FROM Channels WHERE name = \'%s\'', $name));
}

function getTopicByName($name)
{
    return exec_query(sprintf('SELECT * FROM Topics WHERE title = \'%s\'', $name));
}

function getTagByName($name)
{
    return exec_query(sprintf('SELECT * FROM Hashtags WHERE name = \'%s\'', $name));
}


function createChannel($channel, $userId)
{
    $connection = get_connection();
    $prep = $connection->prepare('INSERT INTO Channels (name, description, owner) VALUES (?, ?, ?);');
    $str = 'Channel without description';
    $prep->bind_param('sss', $channel, $str, $userId);
    $prep->execute();
    $connection->close();
}

function createTag($tag)
{
    $connection = get_connection();
    $prep = $connection->prepare('INSERT INTO Hashtags (name) VALUES (?);');
    $prep->bind_param('s', $tag);
    $prep->execute();
    $connection->close();
}

?>