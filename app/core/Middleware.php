<?php

class Middleware {
    public static function auth() {
        Db::read(['email' => 'email']);
    }
}