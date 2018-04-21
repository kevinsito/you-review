<?php
/**
 * Created by PhpStorm.
 * User: kevinsito
 * Date: 2018-04-21
 * Time: 3:55 PM
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class User extends Model
{
    const CREATED_AT =  'created';
    const UPDATED_AT = 'modified';

    protected $fillable = ['email', 'firstname', 'middlename', 'lastname', 'country'];

    public static function getAllUsers() {
        $builder = self::query();

        return $builder->get();
    }

    public static function getUser($id) {
        $builder = self::query();

        return $builder->findOrFail($id);
    }

    public static function createUser(Request $request) {
        $req = $request->all();

        $data = new User([
            'email' => $request->has('email') ? $req['email'] : "",
            'firstname' => $request->has('firstname') ? $req['firstname'] : "",
            'middlename' => $request->has('middlename') ? $req['middlename'] : "",
            'lastname' => $request->has('lastname') ? $req['lastname'] : "",
            'country' => $request->has('country') ? $req['country'] : ""
        ]);
        $data->save();

        return $data;
    }
}
