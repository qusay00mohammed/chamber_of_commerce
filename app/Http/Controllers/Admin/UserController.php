<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LoginLog;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('id', 'desc')->get();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                "name"   => "required|min:3|max:70",
                "email"   => "required",
                "password"   => "required",
            ]);

            $store = User::create([
                "name" => $request->name,
                "email" => $request->email,
                "password" => Hash::make($request->password),
            ]);
            session()->flash('add');
            return redirect()->route('users.index');
        } catch(\Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($request->user_id);
        try {
            $request->validate([
                "name"   => "required|min:3|max:70",
                "email"   => "required",
                "oldPassword"   => "required",
                "password"   => "required",
                "confirmPassword"   => "required",
            ]);

            if(!Hash::check($request->oldPassword, $user->password))
            {
                return redirect()->back()->withErrors(['errors' => 'كلمة المرور القديمة خاطئة']);
            }

            if(!($request->password == $request->confirmPassword))
            {
                return redirect()->back()->withErrors(['errors' => 'كلمة المرور غير متطابقة']);
            }



            $update = $user->update([
                "name" => $request->name,
                "email" => $request->email,
                "password" => Hash::make($request->password),
            ]);
            session()->flash('update');
            return redirect()->route('users.index');
        } catch(\Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = User::findOrFail($id);
        $delete->delete();
        return response()->json([
            'status' => 'success',
        ], 201);
    }

    public function logUser(Request $request)
    {
        if($request->ajax()) {

            $data = LoginLog::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('user_id', function ($row) {
                    return $row->user->name;
                })
                ->addcolumn('created_at', function ($row) {
                    Carbon::setLocale('ar');
                    return Carbon::parse($row->created_at)->diffForHumans();

                })->escapeColumns([])
                ->make(true);
        }
        return view('admin.users.logUser');
    }
}
