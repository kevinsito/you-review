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

    public static function getAllUsers($params) {
        $builder = self::query();

        if(isset($params['sort'])) {
            $builder->orderBy($params['sort']);
        }

        if(isset($params['search'])) {
            $builder->where('email', 'LIKE', '%'.$params['search'].'%')
                ->orWhere('firstname', 'LIKE', '%'.$params['search'].'%')
                ->orWhere('middlename', 'LIKE', '%'.$params['search'].'%')
                ->orWhere('lastname', 'LIKE', '%'.$params['search'].'%')
                ->orWhere('country', 'LIKE', '%'.$params['search'].'%');;
        }

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

    public static function updateUser(Request $request, $id) {
        $builder = self::query();
        $user = $builder->findOrFail($id);

        $req = $request->all();

        if ($request->has('email')) {
            $user->email = $req['email'];
        }

        if ($request->has('firstname')) {
            $user->firstname = $req['firstname'];
        }

        if ($request->has('middlename')) {
            $user->middlename = $req['middlename'];
        }

        if ($request->has('lastname')) {
            $user->lastname = $req['lastname'];
        }

        if ($request->has('country')) {
            $user->country = $req['country'];
        }

        $user->save();

        return $user;
    }

    public static function deleteUser($id) {
        $builder = self::query();

        $user = $builder->findOrFail($id);

        $user->delete();
    }
}
