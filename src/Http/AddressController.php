<?php

namespace EniumCriacaoSites\GettingAddresses\Http;

use App\Http\Controllers\Controller;
use EniumCriacaoSites\GettingAddresses\Http\Resources\CityResource;
use EniumCriacaoSites\GettingAddresses\Models\City;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AddressController extends Controller
{
    public function getCidades(Request $request): JsonResponse
    {
        $sort = json_decode($request->get('sort', json_encode(['order' => 'desc', 'column' => 'created_at'], JSON_THROW_ON_ERROR)), true, 512, JSON_THROW_ON_ERROR);

        $query = City::query();

        if ($request->has('search')) {
            $query->where('name', 'LIKE', '%' . $request->get('search') . '%');
        }

        $items = $query->orderBy($sort['column'], $sort['order'])
            ->paginate((int) $request->get('perPage', 10));

        return response()->json([
            'items' => CityResource::collection($items->items()),
            'pagination' => [
                'currentPage' => $items->currentPage(),
                'perPage' => $items->perPage(),
                'total' => $items->total(),
                'totalPages' => $items->lastPage()
            ]
        ]);
    }
}