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
    public function index() {
        $data = User::getAllUsers();
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
}
