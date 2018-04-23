<?php
/**
 * Created by PhpStorm.
 * User: kevinsito
 * Date: 2018-04-23
 * Time: 6:36 PM
 */

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index() {
        $data = Restaurant::getAllRestaurants();
        return $data;
    }

    public function create(Request $request) {
        $data = Restaurant::createRestaurant($request);
        return $data;
    }
}