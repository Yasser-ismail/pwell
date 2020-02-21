<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Place;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use ApiResponseTrait;

    public function index()
    {
        $categories = Category::all();
        $sliders = Slider::all();

        $data = [
            'categories' => $categories,
            'sliders' => $sliders,
        ];
        return $this->apiResponse($data, null, 200);
    }

    public function showCategory($id)
    {
        $data = [];
        $category = Category::find($id);
        $data['category'] = $category;

        if (empty($category)) {
            return $this->apiResponse(null, null, 404);
        }

        $places = Place::where('category_id', $category->id)->paginate(10);

        $data['places'] = $places;


        return $this->apiResponse($data, null, 200);
    }


    public function showPlace($id)
    {
        $place = Place::where('id', $id)->with('category', 'photos')->first();
        if ($place) {
            $data = [
                'place' => $place,
            ];
            return $this->apiResponse($data, null, 200);
        }

        return $this->apiResponse(null, null, 404);
    }
}
