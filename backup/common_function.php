<?php
function sanitizeInput($text)
{
    return preg_replace("/[^A-Za-z]/", '', $text);
}
