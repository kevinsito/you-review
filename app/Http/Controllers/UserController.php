<?php
/**
 * Created by PhpStorm.
 * User: kevinsito
 * Date: 2018-04-21
 * Time: 3:54 PM
 */

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request) {
        $params = $request->input();
        $data = User::getAllUsers($params);
        return $data;
    }

    public function create(Request $request) {
        $data = User::createUser($request);
        return $data;
    }

    public function get($userId) {
        $data = User::getUser($userId);
        return $data;
    }

    public function update(Request $request, $userId) {
        $data = User::updateUser($request, $userId);
        return $data;
    }

    public function delete($userId) {
        $data = User::deleteUser($userId);
        return $data;
    }
}
