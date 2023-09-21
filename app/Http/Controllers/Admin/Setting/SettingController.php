<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    public function informationPayment()
    {
        $informationPayment = Setting::where('type', 'information-payment')->get();
        return view('admin.settings.information-payment', compact('informationPayment'));
    }


    public function informationPaymentStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'secretkeystripe' => 'required',
            'publickeystripe' => 'required',
            'BOP_MERCHANT_ID' => 'required',
            'BOP_MERCHANT_PASSWORD' => 'required',
            'BOP_ACQUIRER_ID' => 'required',
            'BOP_CURRENCY_ISO_CODE' => 'required',
        ]);
        //Now check validation:
        if ($validator->fails()) {
            return Response::make(['errors' => $validator->errors()->first()], 400);
        }


        // dd($request->all());

        // start
        if($secret = Setting::where(['type' => 'information-payment', 'key' => 'secret-key-stripe'])->first())
        {
            $secret->update([
                'description' => $request->secretkeystripe,
            ]);
        }
        else
        {
            Setting::create([
                'description' => $request->secretkeystripe,
                'key' => 'secret-key-stripe',
                'type' => 'information-payment'
            ]);
        }
        // end

        // start
        if($public = Setting::where(['type' => 'information-payment', 'key' => 'public-key-stripe'])->first())
        {
            $public->update([
                'description' => $request->publickeystripe,
            ]);
        }
        else
        {
            Setting::create([
                'description' => $request->publickeystripe,
                'key' => 'public-key-stripe',
                'type' => 'information-payment'
            ]);
        }
        // end


        // start
        if($BOP_MERCHANT_ID = Setting::where(['type' => 'information-payment', 'key' => 'BOP_MERCHANT_ID'])->first())
        {
            $BOP_MERCHANT_ID->update([
                'description' => $request->BOP_MERCHANT_ID,
            ]);
        }
        else
        {
            Setting::create([
                'description' => $request->BOP_MERCHANT_ID,
                'key' => 'BOP_MERCHANT_ID',
                'type' => 'information-payment'
            ]);
        }
        // end

        // start
        if($BOP_MERCHANT_PASSWORD = Setting::where(['type' => 'information-payment', 'key' => 'BOP_MERCHANT_PASSWORD'])->first())
        {
            $BOP_MERCHANT_PASSWORD->update([
                'description' => $request->BOP_MERCHANT_PASSWORD,
            ]);
        }
        else
        {
            Setting::create([
                'description' => $request->BOP_MERCHANT_PASSWORD,
                'key' => 'BOP_MERCHANT_PASSWORD',
                'type' => 'information-payment'
            ]);
        }
        // end


        // start
        if($BOP_ACQUIRER_ID = Setting::where(['type' => 'information-payment', 'key' => 'BOP_ACQUIRER_ID'])->first())
        {
            $BOP_ACQUIRER_ID->update([
                'description' => $request->BOP_ACQUIRER_ID,
            ]);
        }
        else
        {
            Setting::create([
                'description' => $request->BOP_ACQUIRER_ID,
                'key' => 'BOP_ACQUIRER_ID',
                'type' => 'information-payment'
            ]);
        }
        // end


        // start
        if($BOP_CURRENCY_ISO_CODE = Setting::where(['type' => 'information-payment', 'key' => 'BOP_CURRENCY_ISO_CODE'])->first())
        {
            $BOP_CURRENCY_ISO_CODE->update([
                'description' => $request->BOP_CURRENCY_ISO_CODE,
            ]);
        }
        else
        {
            Setting::create([
                'description' => $request->BOP_CURRENCY_ISO_CODE,
                'key' => 'BOP_CURRENCY_ISO_CODE',
                'type' => 'information-payment'
            ]);
        }
        // end
        session()->flash('update');
        return redirect()->route('information-payment');

    }













    public function informationContacts()
    {
        $informationContacts = Setting::where('type', 'information-contacts')->get();
        return view('admin.settings.information-contacts', compact('informationContacts'));
    }

    public function informationContactsStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'facebook' => 'required',
            'instagram' => 'required',
            'youtube' => 'required',
            'twitter' => 'required',
            'telegram' => 'required',
            'email' => 'required',
            'telephone' => 'required',
            'phone' => 'required',
            'location' => 'required',
        ]);
        // dd($request->all());
        //Now check validation:
        if ($validator->fails()) {
            return Response::make(['errors' => $validator->errors()->first()], 400);
        }
        // start
        if($facebook = Setting::where(['type' => 'information-contacts', 'key' => 'facebook'])->first())
        {
            $facebook->update([
                'description' => $request->facebook,
            ]);
        }
        else
        {
            Setting::create([
                'description' => $request->facebook,
                'key' => 'facebook',
                'type' => 'information-contacts'
            ]);
        }
        // end
        // start
        if($facebook = Setting::where(['type' => 'information-contacts', 'key' => 'instagram'])->first())
        {
            $facebook->update([
                'description' => $request->instagram,
            ]);
        }
        else
        {
            Setting::create([
                'description' => $request->instagram,
                'key' => 'instagram',
                'type' => 'information-contacts'
            ]);
        }
        // end

        // start
        if($facebook = Setting::where(['type' => 'information-contacts', 'key' => 'twitter'])->first())
        {
            $facebook->update([
                'description' => $request->twitter,
            ]);
        }
        else
        {
            Setting::create([
                'description' => $request->twitter,
                'key' => 'twitter',
                'type' => 'information-contacts'
            ]);
        }
        // end

        // start
        if($facebook = Setting::where(['type' => 'information-contacts', 'key' => 'youtube'])->first())
        {
            $facebook->update([
                'description' => $request->youtube,
            ]);
        }
        else
        {
            Setting::create([
                'description' => $request->youtube,
                'key' => 'youtube',
                'type' => 'information-contacts'
            ]);
        }
        // end
        // start
        if($facebook = Setting::where(['type' => 'information-contacts', 'key' => 'telegram'])->first())
        {
            $facebook->update([
                'description' => $request->telegram,
            ]);
        }
        else
        {
            Setting::create([
                'description' => $request->telegram,
                'key' => 'telegram',
                'type' => 'information-contacts'
            ]);
        }
        // end

        // start
        if($facebook = Setting::where(['type' => 'information-contacts', 'key' => 'email'])->first())
        {
            $facebook->update([
                'description' => $request->email,
            ]);
        }
        else
        {
            Setting::create([
                'description' => $request->email,
                'key' => 'email',
                'type' => 'information-contacts'
            ]);
        }
        // end

        // start
        if($facebook = Setting::where(['type' => 'information-contacts', 'key' => 'telephone'])->first())
        {
            $facebook->update([
                'description' => $request->telephone,
            ]);
        }
        else
        {
            Setting::create([
                'description' => $request->telephone,
                'key' => 'telephone',
                'type' => 'information-contacts'
            ]);
        }
        // end

        // start
        if($facebook = Setting::where(['type' => 'information-contacts', 'key' => 'phone'])->first())
        {
            $facebook->update([
                'description' => $request->phone,
            ]);
        }
        else
        {
            Setting::create([
                'description' => $request->phone,
                'key' => 'phone',
                'type' => 'information-contacts'
            ]);
        }
        // end

        // start
        if($facebook = Setting::where(['type' => 'information-contacts', 'key' => 'location'])->first())
        {
            $facebook->update([
                'description' => $request->location,
            ]);
        }
        else
        {
            Setting::create([
                'description' => $request->location,
                'key' => 'location',
                'type' => 'information-contacts'
            ]);
        }
        // end


        session()->flash('update');
        return redirect()->route('information-contacts');
    }



    public function informationPublic()
    {
        $informationPublic = Setting::where('type', 'information-public')->get();
        return view('admin.settings.information-public', compact('informationPublic'));
    }


    public function informationPublicStore(Request $request)
    {

        // dd($request->all());

        $validator = Validator::make($request->all(), [
            'messageRoom' => 'required',
            'seeRoom' => 'required',
            'speech_of_the_chairman_of_the_council' => 'required',
            'speech_of_the_chairman_of_the_council_short' => 'required',
            'speech_of_the_chairman_of_the_council_image' => 'image|mimes:jpg,jpeg,png',
        ]);

        //Now check validation:
        if ($validator->fails()) {
            return Response::make(['errors' => $validator->errors()->first()], 400);
        }

        // start
        if($facebook = Setting::where(['type' => 'information-public', 'key' => 'messageRoom'])->first())
        {
            $facebook->update([
                'description' => $request->messageRoom,
            ]);
        }
        else
        {
            Setting::create([
                'description' => $request->messageRoom,
                'key' => 'messageRoom',
                'type' => 'information-public'
            ]);
        }
        // end

        // start
        if($facebook = Setting::where(['type' => 'information-public', 'key' => 'seeRoom'])->first())
        {
            $facebook->update([
                'description' => $request->seeRoom,
            ]);
        }
        else
        {
            Setting::create([
                'description' => $request->seeRoom,
                'key' => 'seeRoom',
                'type' => 'information-public'
            ]);
        }
        // end


        // start
        if($speech_of_the_chairman_of_the_council = Setting::where(['type' => 'information-public', 'key' => 'speech_of_the_chairman_of_the_council'])->first())
        {
            if ($file = $request->file('speech_of_the_chairman_of_the_council_image')) {
                $basicFileName = time() . $file->getClientOriginalName();
                $path = $file->storeAs('files/settings', $basicFileName, ['disk' => 'public']);
            }

            $speech_of_the_chairman_of_the_council->update([
                'description' => $request->speech_of_the_chairman_of_the_council,
                'short_description' => $request->speech_of_the_chairman_of_the_council_short,
                'image_url' => $path ?? $speech_of_the_chairman_of_the_council->image_url,
            ]);
        }
        else
        {

            $file = $request->file('speech_of_the_chairman_of_the_council_image');
            $basicFileName = time() . $file->getClientOriginalName();
            $path = $file->storeAs('files/settings', $basicFileName, ['disk' => 'public']);


            Setting::create([
                'description' => $request->speech_of_the_chairman_of_the_council,
                'short_description' => $request->speech_of_the_chairman_of_the_council_short,
                'key' => 'speech_of_the_chairman_of_the_council',
                'type' => 'information-public',
                'image_url' => $path,
            ]);
        }
        // end

        // start
        if($about_gaza = Setting::where(['type' => 'information-public', 'key' => 'about_gaza'])->first())
        {
            if ($file = $request->file('about_gaza_image')) {
                $basicFileName = time() . $file->getClientOriginalName();
                $path = $file->storeAs('files/settings', $basicFileName, ['disk' => 'public']);
            }

            $about_gaza->update([
                'description' => $request->about_gaza,
                'short_description' => $request->about_gaza_short,
                'image_url' => $path ?? $about_gaza->image_url,
            ]);
        }
        else
        {

            $file = $request->file('about_gaza_image');
            $basicFileName = time() . $file->getClientOriginalName();
            $path = $file->storeAs('files/settings', $basicFileName, ['disk' => 'public']);


            Setting::create([
                'description' => $request->about_gaza,
                'short_description' => $request->about_gaza_short,
                'key' => 'about_gaza',
                'type' => 'information-public',
                'image_url' => $path,
            ]);
        }
        // end

        // start
        if($establishment_of_the_chamber = Setting::where(['type' => 'information-public', 'key' => 'establishment_of_the_chamber'])->first())
        {
            if ($file = $request->file('establishment_of_the_chamber_image')) {
                $basicFileName = time() . $file->getClientOriginalName();
                $path = $file->storeAs('files/settings', $basicFileName, ['disk' => 'public']);
            }

            $establishment_of_the_chamber->update([
                'description' => $request->establishment_of_the_chamber,
                'image_url' => $path ?? $establishment_of_the_chamber->image_url,
            ]);
        }
        else
        {

            $file = $request->file('establishment_of_the_chamber_image');
            $basicFileName = time() . $file->getClientOriginalName();
            $path = $file->storeAs('files/settings', $basicFileName, ['disk' => 'public']);


            Setting::create([
                'description' => $request->establishment_of_the_chamber,
                'key' => 'establishment_of_the_chamber',
                'type' => 'information-public',
                'image_url' => $path,
            ]);
        }
        // end



        // start
        if($directly_to_the_chamber_board_of_directors = Setting::where(['type' => 'information-public', 'key' => 'directly_to_the_chamber_board_of_directors'])->first())
        {
            $directly_to_the_chamber_board_of_directors->update([
                'description' => $request->directly_to_the_chamber_board_of_directors,
                'image_url' => $request->directly_to_the_chamber_board_of_directors_link,
            ]);
        }
        else
        {
            Setting::create([
                'description' => $request->directly_to_the_chamber_board_of_directors,
                'key' => 'directly_to_the_chamber_board_of_directors',
                'type' => 'information-public',
                'image_url' => $request->directly_to_the_chamber_board_of_directors_link,
            ]);
        }
        // end


        session()->flash('update');
        return redirect()->route('information-public');
    }




}
