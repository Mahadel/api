<?php

namespace App\Http\Controllers;

use App\User;
use App\Utils;
use Carbon\Carbon;
use Config;
use Google_Client;
use Illuminate\Http\Request;


class AuthenticationController extends Controller
{
    public function generateToken(Request $request)
    {
        $token = $request->token;
        $client = new Google_Client(['client_id' => Config::get('client_id')]);
        $payload = $client->verifyIdToken($token);
        if ($payload) {
            $email = $payload['email'];
            $uuid = Utils::generateUUID();
            $user = new User();
            $user->uuid = $uuid;
            $user->email = $email;
            $user->first_name = '';
            $user->last_name = '';
            $user->gender = 0;
            $user->token = Utils::generateJWT([
                'uuid' => $uuid,
                'iat' => Carbon::now()->timestamp
            ]);
            $user->description = '';
            $user->user_type = 1;
            $user->is_active = 1;
            return $user->storeOrLogin($user);
        } else {
            return Utils::responseMessage("", "authentication failed", 'login', 403);
        }
    }
}
