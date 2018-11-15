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
        return $request;
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
        $connection_send = Connection::with('userTo')->where('user_uuid_from', $uuid)->get();
        $connection_receive = Connection::with('userFrom')->where('user_uuid_to', $uuid)->get();
        $connections = array();
        $connections['connection_send'] = $connection_send;
        $connections['connection_receive'] = $connection_receive;
        return $connections;
    }
    public function delete($uuid, $connection_uuid)
    {
        $user = new User();
        $user = $user->getUserWithUUID($uuid);
        //TODO check for owner of connection before remove.
        if ($user) {
            $connection = new Connection();
            $connection = $connection->getConnectionWithUUID($connection_uuid);
            if ($connection) {
                $connection->delete();
                return Utils::responseMessage('success', 'delete connection', 200);
            } else {
                return Utils::responseMessage('connection not found.', 'delete connection', 404);
            }
        } else {
            return Utils::responseMessage('user not found.', 'delete connection', 404);
        }
    }

    public function editConnection($uuid, $connection_uuid, Request $request)
    {
        $user = new User();
        $user = $user->getUserWithUUID($uuid);
        //TODO check for owner of connection before remove.
        if ($user) {
            $connection = new Connection();
            $connection = $connection->getConnectionWithUUID($connection_uuid);
            if ($connection) {
                if ($request->is_accept == 1) {
                    $connection->email_to = $user->email;
                    $connection->is_accept = 1;
                } else {
                    $connection->email_to = null;
                    $connection->is_accept = 0;
                }
                $connection->save();
                return $connection;
            } else {
                return Utils::responseMessage('connection not found.', 'edit connection', 404);
            }
        } else {
            return Utils::responseMessage('user not found.', 'edit connection', 404);
        }
    }
}