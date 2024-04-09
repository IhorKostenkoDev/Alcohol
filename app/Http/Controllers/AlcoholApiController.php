<?php

namespace App\Http\Controllers;

use App\Models\AlcoholModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AlcoholApiController extends Controller
{
    public function alcohol(Request $request)
    {
        $filters = $request->query();
        $alcohols = AlcoholModel::query();
        foreach ($filters as $field => $value) {
            if ($field !== 'sort_field' && $field !== 'sort_direction' && $value) {
                $alcohols->where($field, 'like', '%' . $value . '%');
            }
        }
        $sortField = $request->query('sort_field');
        $sortDirection = $request->query('sort_direction', 'asc');
        if ($sortField) {
            $alcohols->orderBy($sortField, $sortDirection);
        }
        $filteredAlcohols = $alcohols->get();
        dd($filteredAlcohols);
    }
    public function addalcohol()
    {
        $data = request()->validate([
            'name' => '',
            'brend' => '',
            'volume' => '',
            'provider' => '',
            'delivery_time' => '',
        ]);
        AlcoholModel::create($data);

    }

    public function updatealcohol($id)
    {
        $data = request()->validate([
            'name' => '',
            'brend' => '',
            'volume' => '',
            'provider' => '',
            'delivery_time' => '',
        ]);

        $alcohol = AlcoholModel::findOrFail($id);

        $alcohol ->update($data);

        return response()->json(['message' => 'Danni onovleno']);
    }
}

