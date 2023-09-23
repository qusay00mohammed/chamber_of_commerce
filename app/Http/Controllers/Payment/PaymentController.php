<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Setting;
use App\Services\BankPalestineService;
use App\Services\StripeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{

    private StripeService $stripeService;
    private BankPalestineService $bankPalestineService;

    public function __construct(StripeService $stripeService, BankPalestineService $bankPalestineService)
    {
        $this->bankPalestineService = $bankPalestineService;
    }



    public function index()
    {
        return view('website.donate.supportUs');
    }


    public function store(Request $request)
    {


        try {

            $validator = Validator::make($request->all(), [
                'fullname' => 'required|string|min:3|max:70',
                'country' => 'required|string|min:3|max:70',
                'city' => 'required|string|min:3|max:70',
                'email' => 'required|email',
                'phone_number' => 'required',

                'amount' => 'required|int|min:1|max:999999',

            ], [
                'fullname.required' => 'حقل الاسم مطلوب',
                'fullname.min' => 'يجب ان يكون حقل الاسم اكبر من ثلاث حروف',
                'fullname.max' => 'يجب ان يكون حقل الاسم اصغر من 70 حرف',

                'country.required' => 'حقل الدولة مطلوب',
                'country.min' => 'يجب ان يكون حقل الاسم الدولة من ثلاث حروف',
                'country.max' => 'يجب ان يكون حقل الاسم الدولة من 70 حرف',

                'city.required' => 'حقل المدينة مطلوب',
                'city.min' => 'يجب ان يكون حقل الاسم المدينة من ثلاث حروف',
                'city.max' => 'يجب ان يكون حقل المدينة اصغر من 70 حرف',

                'email.required' => 'حقل البريد الالكتروني مطلوب',
                'email.email' => 'الرجاء ادخال بريد الكتروني صحيح',
                'phone_number.required' => 'حقل رقم الهاتف مطلوب',

                'amount.required' => 'حقل المبلغ مطلوب',
                'amount.int' => 'يجب ان يكون المبلغ رقم صحيح',
                'amount.min' => 'يجب ان يكون المبلغ اكبر من واحد دولار',
                'amount.max' => 'يجب ان يكون المبلغ اقل من مليون دولار',

            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors(['errors' => $validator->errors()->first()]);
            }

            $store = Payment::create([
                'fullname' => $request->post('fullname'),
                'email' => $request->post('email'),
                'phone_number' => $request->post('phone_number'),
                'country' => $request->post('country'),
                'city' => $request->post('city'),
                'payment_way' => $request->post('payment_way'),
                'amount' => $request->post('amount'),

                'mention_my_name' => $request->post('mention_my_name') ?? 'no',

                'payment_id' => $request->post('email') . $request->post('payment_way') . $request->post('amount')
            ]);



            if ($request->payment_way == 'bankPalestine') {

                return $this->bankPalestineService->palestine_bank($request->amount, $store->payment_id);

            } else if ($request->payment_way == 'stripe') {

                return $this->stripeService->stripe($store);

            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(new \Illuminate\Support\MessageBag(['errors' => $e->getMessage()]))->withInput();
        }
    }

}





