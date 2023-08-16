<?php

function hideSensitiveData($data, $visibleChars = 4, $hideChar = '*')
{
    $length = strlen($data);
    if ($length <= $visibleChars) {
        return $data;
    } else {
        $visiblePart = substr($data, -$visibleChars);
        $hiddenPart = str_repeat($hideChar, $length - $visibleChars);
        return $hiddenPart . $visiblePart;
    }
}
