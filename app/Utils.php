<?php

namespace App;

use Config;
use Firebase\JWT\JWT;

class Utils
{

    /*
        | Return message to client with message, type of operation and status code of result.
     */
    public static function responseMessage($message, $operation_type, $status_code)
    {
        return response()->json([
            'message' => $message,
            'type' => $operation_type
        ], $status_code, ['Content-type' => 'application/json; charset=utf-8']);
    }

    /*
        | Return generated token to the user.
     */
    public static function returnToken($uuid, $token, $message, $operation_type, $is_fill_info, $status_code)
    {
        return response()->json([
            'uuid' => $uuid,
            'message' => $message,
            'token' => $token,
            'type' => $operation_type,
            'fill_info' => $is_fill_info
        ], $status_code, ['Content-type' => 'application/json; charset=utf-8']);
    }

    /*
        | Generate JWT token
     */
    public static function generateJWT($data)
    {
        return JWT::encode($data, Config::get('constants.private_key'), 'RS256');
    }

    /*
        | Check for valid JWT token.
     */
    public static function isValidJWT($token)
    {
        try {
            JWT::decode($token, Config::get('constants.public_key'), array('RS256'));
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    /*
        | Generate UUID as String
     */
    public static function generateUUID()
    {

        try {
            return \Ramsey\Uuid\Uuid::uuid4()->toString();
        } catch (\Exception $e) {
            return nullValue();
        }
    }

    /*
        | Decode and get data of JWT token
     */
    public static function getDataJWT($token)
    {
        try {
            return JWT::decode($token, Config::get('constants.public_key'), array('RS256'));
        } catch (\Exception $e) {
            return nullValue();
        }
    }

    /*
        | Check for exist JWT token in user table
     */
    public static function isJWTExist($token)
    {
        $decoded = Utils::getDataJWT($token);
        $user = new User();
        if ($user->isExist($decoded->uuid, $token)) {
            return true;
        } else {
            return false;
        }
    }

    /*
        | Check for exist JWT token in user table & type of user is admin
     */
    public static function isJWTExistAndAdmin($token)
    {
        $decoded = Utils::getDataJWT($token);
        $user = new User();
        if ($user->isExistAndAdmin($decoded->uuid, $token)) {
            return true;
        } else {
            return false;
        }
    }
}