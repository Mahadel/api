<?php

namespace App;

use Config;
use Firebase\JWT\JWT;

class Utils
{

    public static function responseMessage($uuid, $message, $operation_type, $status_code)
    {
        return response()->json([
            'message' => $message,
            'type' => $operation_type
        ], $status_code, ['Content-type' => 'application/json; charset=utf-8']);
    }

    public static function returnToken($uuid, $token, $message, $operation_type, $status_code)
    {
        return response()->json([
            'uuid' => $uuid,
            'message' => $message,
            'token' => $token,
            'type' => $operation_type
        ], $status_code, ['Content-type' => 'application/json; charset=utf-8']);
    }

    public static function generateJWT($data)
    {
        return JWT::encode($data, Config::get('constants.private_key'), 'RS256');
    }

    public static function isValidJWT($token)
    {
        try {
            JWT::decode($token, Config::get('constants.public_key'), array('RS256'));
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public static function generateUUID()
    {

        try {
            return \Ramsey\Uuid\Uuid::uuid4()->toString();
        } catch (\Exception $e) {
            return nullValue();
        }
    }

    public static function getDataJWT($token)
    {
        try {
            return JWT::decode($token, Config::get('constants.public_key'), array('RS256'));
        } catch (\Exception $e) {
            return nullValue();
        }
    }

}