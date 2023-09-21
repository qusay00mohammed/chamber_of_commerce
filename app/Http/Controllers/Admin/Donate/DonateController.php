<?php

namespace App\Http\Controllers\Admin\Donate;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DonateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $data = Payment::select('*')->orderBy('id', 'desc');

            return DataTables::of($data)
                ->addColumn('id', function ($row) {
                    static $count = 1;
                    return $count++;
                })
                ->addColumn('action', function ($row) {
                    $btn = '';
                        $btn .= '<a href=" ' . route("support-us.edit", $row->id) . '"><i class="text-info fas fa-edit"></i>&nbsp;&nbsp</a>';
                        $btn .= '<a onclick="performDestroy('.$row->id.', this)" style="cursor: pointer; font-size: 16px">
                                    <i class="text-danger fas fa-trash-alt"></i>
                                </a>';
                    return $btn;
                })
                ->addColumn('status', function ($row) {
                    return $row->status == 'paid' ? 'تمت عملية الدفع' : 'لم تتم عمليه الدفع';
                })
                ->addColumn('introducing_donor', function ($row) {
                    return $row->mention_my_name == 'yes' ? 'نعم' : "لا";
                })
                ->addColumn('payment_way', function ($row) {

                    if ($row->payment_way == 'bankPalestine') {
                        return "بنك فلسطين";
                    } elseif($row->payment_way == 'stripe') {
                        return "سترايب";
                    }
                })
                ->make(true);
        }

        return view('admin.donate.index');
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
        //
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
        $donate = Payment::findOrFail($id);
        return view('admin.donate.edit', compact('donate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $donate = Payment::findOrFail($id);
            $request->validate([
                'fullname' => 'required',
                'email' => 'required',
                'phone_number' => 'required',
                'amount' => 'required',
            ]);

            $update = $donate->update([
                'fullname' => $request->post('fullname'),
                'email' => $request->post('email'),
                'phone_number' => $request->post('phone_number'),
                'mention_my_name' => $request->post('mention_my_name') ?? 'no',
                'amount' => $request->post('amount'),
            ]);

            session()->flash('update');
            return redirect()->route('support-us.index');

        } catch(\Exception $e){
            return redirect()->back()->withError('not created successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Payment::findOrFail($id)->delete();
        return response()->json([
            'status' => 'success',
        ], 201);
    }
}
