<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Connection;
use App\Utils;
use App\User;
use App\Skill;

class ConnectionController extends Controller
{

    public function index()
    {
        return Connection::all();
    }
    public function store(Request $request)
    {
        if (User::isUserExistWithUUID($request->user_uuid_from)
            && User::isUserExistWithUUID($request->user_uuid_to)
            && Skill::isSkillExistWithUUID($request->learn_skill_uuid_from)
            && Skill::isSkillExistWithUUID($request->teach_skill_uuid_from)) {
            $connection = new Connection([
                'uuid' => Utils::generateUUID(),
                'user_uuid_from' => $request->user_uuid_from,
                'user_uuid_to' => $request->user_uuid_to,
                'learn_skill_uuid_from' => $request->learn_skill_uuid_from,
                'teach_skill_uuid_from' => $request->teach_skill_uuid_from,
                'description' => $request->description
            ]);
            $connection->save();
            return Utils::responseMessage('Request for connection created.', 'store connection', 200);
        } else {
            return Utils::responseMessage('user or skill not found.', 'create connection', 404);
        }
    }
    public function getConnection($uuid)
    {
        $connection_send = Connection::with('userReceive')->where('user_uuid_from', $uuid)->get();
        $connection_receive = Connection::with('userSend')->where('user_uuid_to', $uuid)->get();
        $connections = array();
        $connections['connection_send'] = $connection_send;
        $connections['connection_receive'] = $connection_receive;
        return $connections;
    }
}