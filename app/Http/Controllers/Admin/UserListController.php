<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use PHPUnit\Framework\Exception;
use Yajra\DataTables\Facades\DataTables;

class UserListController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if($user->tipe != 1)
            $user->delete();
    }

    public function users()
    {
        $user = User::query();
        return DataTables::of($user)
            ->addColumn('action', function($user){
                return view('admin._action-user', [
                    'user'       => $user,
                    'url_destroy' => route('admin.users.delete', $user->id),
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
