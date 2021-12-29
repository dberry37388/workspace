<?php

if (! function_exists('projectKeyGenerator')) {
    function projectKeyGenerator($words): string
    {
        if (! is_array($words)) {
            $words = preg_split("/(\s|-|\.)/", $words);
        }

        $key = '';
        foreach($words as $w) {
            if (! empty($w)) {
                $key .= substr($w,0,1);
            }
        }

        return strtoupper($key);
    }
}
