<?php
namespace Bank2;

class Message {
    public static function add($text, $type)
    {
        $_SESSION['message'] = ['text' => $text, 'type' => $type];
    }

    public static function get()
    {
        //nuskaito message, jei nieko nera - null
        $message = $_SESSION['message'] ?? null;
        unset($_SESSION['message']);
        return $message;
    }
}