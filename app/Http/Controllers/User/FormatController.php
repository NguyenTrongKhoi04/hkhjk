<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\StoreFormat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class FormatController extends Controller
{
    public function __construct(protected StoreFormat $model)
    {
        $this->model = new StoreFormat();
    }

    public function save(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'title' => 'required|string|max:100',
            'tag' => 'nullable|string|max:50',
            'description' => 'nullable|string|max:500',
            'dataJson' => 'required|json',
        ]);

        $userId = Auth::check() ? Auth::id() : false;

        if (!Auth::check()) {
            return response()->json(['success' => false, 'message' => 'You must be logged in']);
        }

        if ($userId) {
            try {
                StoreFormat::create([
                    'id_user' => $userId,
                    'name' => $validated['name'],
                    'title' => $validated['title'],
                    'tag' => $validated['tag'] ?? '',
                    'description' => $validated['description'] ?? '',
                    'data' => json_encode($validated['dataJson']),
                    'date_store' => now()->timestamp,
                ]);
                return response()->json(['success' => true, 'message' => 'Data saved successfully!'], 201);
            } catch (\Exception $e) {
                Log::error('Error saving format: ' . $e->getMessage(), [
                    'exception' => $e,
                    'user_id' => $userId,
                    'request_data' => $request->all()
                ]);
                return response()->json(['success' => false, 'message' => 'Failed to save data.'], 500);
            }
        }
    }

    public function getPage($request)
    {
        $searchValue = $request->input('search.value');
        $length = $request->input('length', 10);
        $start = $request->input('start', 0);
        $query = $this->model->query();
        $arrFillable = $this->model->getFillable();

        $query->where('id_user',  Auth::id());

        $query = $this->applySearchCondition($query, $searchValue, $arrFillable);
        $totalRecords = $query->count();
        $query = $this->applyOrdering($request, $query, $arrFillable);
        $data = $query->offset($start)->limit($length)->get();

        return [
            "data" => $data,
            "totalRecords" => $totalRecords
        ];
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = $this->getPage($request);

            return response()->json([
                "draw" => intval($request->input('draw')),
                "recordsTotal" => $data["totalRecords"],
                "recordsFiltered" => $data["totalRecords"],
                "data" => $data['data']->map(
                    function ($row) {
                        return [
                            'id' => $row->id,
                            'name' => e($row->name),
                            'title' => e($row->title),
                            'tag' => e($row->tag),
                            'description' => e($row->description),
                            'data' => json_encode($row->data),
                            'date_store' => date('Y/m/d', $row->date_store),
                            'actions' => '<button class="btn btn-danger btn-circle btn-sm" data-id="' . $row->id . '" data-toggle="tooltip" data-placement="top" title="Delete">' .
                                '<i class="fas fa-trash"></i>' .
                                '</button>',
                        ];
                    }
                ),
            ]);
        }
    }

    public function create()
    {
        $html = "
            <form method='POST' id='storeForm'>
                <input type='hidden' name='_token' value='" . csrf_token() . "'>

                <div class='form-group'>
                    <label for='storeName'>Name <span class='text-danger'>*</span></label>
                    <input type='text' class='form-control' id='storeName' name='storeName'>
                    <span class='text-danger error-text flag_create name_error'></span>
                    <span class='text-danger error-text flag_update name_error_update'></span>
                </div>

                <div class='form-group'>
                    <label for='storeTitle'>Title <span class='text-danger'>*</span></label>
                    <input type='text' class='form-control' id='storeTitle' name='storeTitle'>
                    <span class='text-danger error-text flag_create title_error'></span>
                    <span class='text-danger error-text flag_update title_error_update'></span>
                </div>

                <div class='form-group'>
                    <label for='storeTag'>Tag <span class='text-danger'>*</span></label>
                    <input type='text' class='form-control' id='storeTag' name='storeTag'>
                    <span class='text-danger error-text flag_create tag_error'></span>
                    <span class='text-danger error-text flag_update tag_error_update'></span>
                </div>

                <div class='form-group'>
                    <label for='storeDescription'>Description</label>
                    <textarea class='form-control' id='storeDescription' name='storeDescription' rows='3'></textarea>
                    <span class='text-danger error-text flag_create description_error'></span>
                    <span class='text-danger error-text flag_update description_error_update'></span>
                </div>

                <div class='form-group'>
                    <label for='storeData'>Data JSON</label>
                    <textarea class='form-control' id='storeData' name='storeData' rows='4'></textarea>
                    <span class='text-danger error-text flag_create data_error'></span>
                    <span class='text-danger error-text flag_update data_error_update'></span>
                </div>
            </form>
        ";

        return response()->json(['html' => $html]);
    }

    public function applySearchCondition($query, $searchValue, $arrSearchableColumns)
    {
        $searchableColumns = $arrSearchableColumns;

        if (!empty($searchValue)) {
            $query->where(function ($query) use ($searchValue, $searchableColumns) {
                foreach ($searchableColumns as $column) {
                    $query->orWhere($column, 'LIKE', "%{$searchValue}%");
                }
            });
        }

        return $query;
    }

    public function applyOrdering($request, $query, $arrSearchableColumns)
    {
        $searchableColumns = $arrSearchableColumns;

        if ($request->has('order')) {
            $columnIndex = $request->input('order.0.column');
            $direction = $request->input('order.0.dir');
            $columns = $request->input('columns');
            $columnName = $columns[$columnIndex]['data'];

            if (in_array($columnName, $searchableColumns)) {
                $query->orderBy($columnName, $direction);
            }
        } else {
            $query->orderBy('id', 'desc');
        }

        return $query;
    }
}
