
<?php

include './database.php';
//---------------------------------
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

///
/// USER
///
function getUserById($id)
{
    return exec_query(sprintf('SELECT * FROM Users WHERE id = %d', $id));
}

function getUserByName($name)
{
    return exec_query(sprintf('SELECT * FROM Users WHERE username = \'%s\'', $name));
}

function getChannels()
{ // Возвращает список всех существующих каналов
    $channelsList = ['channel name 1', 'channel name 2', 'channel name 3'];
    return $channelsList;
}


function getTags()
{ // Возвращает список всех существующих в базе тэгов
    $tagsList = ['tag1', 'tag2', 'tag3'];
    print_result('SELECT name FROM hashtags');
    $sql = print_result('SELECT name FROM hashtags');
    return $tagsList;
}

function getCurrentUsername()
{ // Возвращает имя пользователя текущей сессии (опционально, можно вырезать)
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

?>