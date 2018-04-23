<?php
/**
 * Created by PhpStorm.
 * User: kevinsito
 * Date: 2018-04-23
 * Time: 6:37 PM
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Restaurant extends Model
{
    const CREATED_AT =  'created';
    const UPDATED_AT = 'modified';

    protected $fillable = ['name', 'description', 'country', 'state', 'zip', 'city', 'address', 'phone', 'cuisine'];

    public static function getAllRestaurants() {
        $builder = self::query();

        return $builder->get();
    }

    public static function createRestaurant(Request $request) {
        $req = $request->all();

        $data = new Restaurant([
            'name' => $request->has('name') ? $req['name'] : "",
            'description' => $request->has('description') ? $req['description'] : "",
            'country' => $request->has('country') ? $req['country'] : "",
            'state' => $request->has('state') ? $req['state'] : "",
            'zip' => $request->has('zip') ? $req['zip'] : "",
            'city' => $request->has('city') ? $req['city'] : "",
            'address' => $request->has('address') ? $req['address'] : "",
            'phone' => $request->has('phone') ? $req['phone'] : "",
            'cuisine' => $request->has('cuisine') ? $req['cuisine'] : ""
        ]);
        $data->save();

        return $data;
    }
}