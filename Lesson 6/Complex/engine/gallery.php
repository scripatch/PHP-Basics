<?php
function getGallery()
{
    $sql = "SELECT * FROM images ORDER BY likes DESC";
    $news = getAssocResult($sql);
    return $news;
}


function getOneImage($id)
{
    $id = (int)$id;

    $sql = "SELECT * FROM images WHERE id = {$id}";
    $news = getAssocResult($sql);

    $result = [];
    if (isset($news[0]))
        $result = $news[0];

    return $result;
}

function addLike($id)
{
    $sql = "UPDATE `images` SET likes=likes+1 WHERE id={$id}";
    executeQuery($sql);
}