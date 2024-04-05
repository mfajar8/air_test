<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\LuwesData;
use App\Models\User;

class ApiServicesController extends Controller
{
    public function getLuwesData(Request $request)
    {
        $requestData = $request->all();
        $model = new LuwesData();
        $builder = $model->select('*');

        // Mengatur pengurutan
        if (!empty($requestData['order'])) {
            $orderColumnIndex = $requestData['order'][0]['column'];
            $orderDirection = $requestData['order'][0]['dir'];
            $orderColumnName = $requestData['columns'][$orderColumnIndex]['data'];
            $builder->orderBy($orderColumnName, $orderDirection);
        } else {
            $builder->orderBy('no', 'DESC');
        }

        // Mengatur limit dan offset untuk pagination
        $builder->limit($requestData['length'])->offset($requestData['start']);

        $data = $builder->get()->toArray();

        $countTotal = $model->count();
        $countFiltered = $model->count();

        // Mengatur nomor baris
        foreach ($data as $key => $row) {
            $data[$key]['rowNumber'] = $requestData['start'] + $key + 1;
        }

        $response = [
            'draw' => $requestData['draw'],
            'recordsTotal' => $countTotal,
            'recordsFiltered' => $countFiltered,
            'data' => $data,
        ];

        return response()->json($response);
    }

    public function getLuwesChart()
    {
        $model = new LuwesData();
        $builder = $model->select('*');


        $data = $builder->get()->toArray();
        $response = [
            'data' => $data,
        ];

        return response()->json($response);
    }

    public function getUserData(Request $request)
    {
        $requestData = $request->all();
        $model = new User();
        $searchValue = $requestData['search']['value'];

        $builder = $model->select('id', 'name', 'email', 'role', 'position', 'status');

        // Mengatur pengurutan
        if (!empty($requestData['order'])) {
            $orderColumn = $requestData['columns'][$requestData['order'][0]['column']]['data'];
            $orderDirection = $requestData['order'][0]['dir'];
            $builder->orderBy($orderColumn, $orderDirection);
        } else {
            // Default pengurutan jika tidak ada pengurutan yang ditentukan
            $builder->orderBy('name', 'ASC');
        }

        // Proses Pencarian
        if (!empty($searchValue)) {
            $builder->where(function ($query) use ($searchValue) {
                $query->where('name', 'like', '%' . $searchValue . '%')
                    ->orWhere('email', 'like', '%' . $searchValue . '%')
                    ->orWhere('position', 'like', '%' . $searchValue . '%');
            });
        }

        $countFiltered = $builder->count();

        $builder->limit($requestData['length'])->offset($requestData['start']);
        $data = $builder->get()->toArray();

        // fungsi menampilkan filter
        $countTotal = $model->count();

        // Mengatur nomor baris
        foreach ($data as $key => $row) {
            $data[$key]['rowNumber'] = $requestData['start'] + $key + 1;
        }

        $response = [
            'draw' => $requestData['draw'],
            'recordsTotal' => $countTotal,
            'recordsFiltered' => $countFiltered,
            'data' => $data,
        ];

        return response()->json($response);
    }

    public function changeUserStatus(Request $request)
    {
        $loggedInUser = Auth::user();
        $id = $request->input('id');
        $status = $request->input('status');

        // Cek kalau yang diubah user yang lagi login, stop
        if ($loggedInUser->id == $id) {
            return response()->json([
                'status' => 'error',
                'message' => 'Anda tidak diizinkan mengubah status anda.'
            ], 403);
        }

        // Validasi input jika diperlukan
        $request->validate([
            'id' => 'required|exists:users,id',
            'status' => 'required|in:0,1',
        ]);

        $user = User::findOrFail($id);

        // Cek role yang mau diubah, superadmin(1) tidak boleh diubah
        if ($user->role == 1) {
            return response()->json([
                'status' => 'error',
                'message' => 'Anda tidak diizinkan mengubah status superadmin'
            ], 403);
        }
        // Cek role yang mau ngubah, admin boleh ubah admin, tapi gak boleh superadmin
        if ($loggedInUser->role > $user->role) {
            return response()->json([
                'status' => 'error',
                'message' => 'Anda tidak diizinkan mengubah status superadmin'
            ], 403);
        }

        // Ubah status pengguna
        $user->status = $status;
        $user->save();

        // Berikan respons sesuai kebutuhan Anda
        return response()->json([
            'status' => 'success',
            'title' => 'Berhasil!',
            'message' => 'Status pengguna berhasil diperbarui.'
        ]);
    }
}
