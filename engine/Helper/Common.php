<?php

namespace Engine\Helper;

class Common
{
    static public function getUri()
    {
        return $_SERVER['REQUEST_URI'];
    }

    static public function getPostBody()
    {
        $postData = json_decode(file_get_contents('php://input'), true);
        $returnData = [];

        foreach ($postData as $key => $value) {
            $returnData[$key] = htmlspecialchars($value);
        }

        return $returnData;
    }
}