<?php

function checkContent($content) {
    $contentChecked = htmlspecialchars($content);
    $contentChecked = stripcslashes($contentChecked);
    $contentChecked = strip_tags($contentChecked);
    return $contentChecked;
}