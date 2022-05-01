<?php

function get_connection()
{
    $host = 'mysql';
    $user = 'root';
    $pswd = 'root';
    $db_name = 'sorter';

    $conn = new mysqli($host, $user, $pswd, $db_name);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

function exec_query($sql)
{
    $connection = get_connection();
    $result = $connection->query($sql);
    $connection->close();
    return $result;
}

function print_result($result)
{
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            print_r($row);
            echo('<br>');
        }
    } else {
        echo "0 results";
    }
}


/**
 * @throws Exception
 */
function post_message($body, $hashtag, $owner, $channel, $private=flase)
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