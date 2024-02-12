<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PlacesController extends Controller
{
    public function getAll()
    {
        $places = Place::all();

        if (count($places) > 0)
            return response()->json([
                "status" => "success",
                "places" => $places
            ], 200);

        return response()->json([
            "status" => "error",
            "message" => "None place was found"
        ], 404);
    }

    public function findOne($id) {
        $place = Place::find($id);

        if(!$place) return response()->json([
            "status" => "error",
            "message" => "None place was found"
        ], 404);

        return response()->json($place, 200);
    }

    public function findByFilter(Request $request) {
        $name = $request->query('name');

        $query = Place::query();

        if (!empty($name)) {
            $query->where('name', 'like', '%' . $name . '%');
        }

        $places = $query->paginate(10);

        return response()->json($places, 200);
    }
    public function create(Request $request)
    {
        $place = new Place;

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|alpha_dash|max:255|unique:places',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                $validator->errors()
            ], 403);
        }

        $place_exists = Place::where("slug", $request->slug)->first();

        if (!$place_exists) {

            $place->name = $request->name;
            $place->slug = $request->slug;
            $place->city = $request->city;
            $place->state = $request->state;
            $place->save();

            $new_place = Place::where("slug", $request->slug)->first();

            return response()->json([
                $new_place
            ], 201);
        }

        return response()->json([
            "message" => "User already exists"
        ], 403);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $place = Place::find($id);

        if(!$place) return response()->json([
            "status" => "error",
            "message" => "None place was found"
        ], 404);

        $place->name = $request->input('name');
        $place->save();

        return response()->json([
            "message" => "Updated Successfully",
            "place" => $place
        ], 201);
    }

}
