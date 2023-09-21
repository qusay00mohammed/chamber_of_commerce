<?php

namespace App\Http\Controllers\Admin\Slider;

use App\Http\Controllers\Controller;
use App\Models\Slider\Slider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::orderBy('id', 'desc')->get();
        return view('admin.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slider.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(),[
                "title" => "bail|required|string|min:3|max:255",
                "description" => "bail|required|string|min:3",
                "file" => "bail|required|file|max:3072|mimes:png,jpg,jpeg,mp4"
            ],[
                'title.required' => "حقل العنوان مطلوب",
                'title.min' => "يجب ان يكون العنوان اكبر من ثلاث حروف",
                'title.max' => "العنوان كبير للغاية",

                'description.required' => "حقل الوصف مصلوب",
                'description.min' => "حقل الوصف مصلوب",
                'description.required' => "يجب ان يكون الوصف اكبر من ثلال حروف",
                'description.min' => "يجب ان يكون الوصف اكير من ثلاث حروف",

                'file.required' => "حقل الصورة مصلوب",
                'file.image' => "يجب ان يكون نوع الملف صورة",
                'file.mimes' => "يجب ادخال صورة بصيغة png او jpg او jpeg",
                'file.max' => "يجب ان يكون حجم الصورة اقل من 3 ميجا"
            ]);

            // start upload image
            $image = $request->file('file');
            $fileName = time() . $image->getClientOriginalName();
            $image->storeAs('files/slider', $fileName, ['disk' => 'public']);
            // end upload image

            $store = Slider::create([
                "title" => $request->post('title'),
                "description" => $request->post('description'),
                "file" => $fileName,
            ]);

            return response()->json([
                'status' => 'success',
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'faild',
                'errors' => $validator->errors()->first(),
            ], 400);
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
        $slider = Slider::findOrFail($id);
        return view('admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $slider = Slider::findOrFail($id);
        // dd($about);
        try {
            $request->validate([
                "title_ar" => "required",
                "title_en" => "required",
                "description_ar" => "required",
                "description_en" => "required",
            ],[
                'title_ar.required' => "حقل الاسم باللغة العربية مطلوب",
                'title_ar.min' => "يجب ان يكون الاسم اكبر من ثلاث حروف",
                'title_ar.max' => "الاسم كبير للغاية",

                'title_en.required' => "حقل الاسم باللغة العربية مطلوب",
                'title_en.min' => "يجب ان يكون الاسم اكبر من ثلاث حروف",
                'title_en.max' => "الاسم كبير للغاية",

                'description_ar.required' => "حقل الوصف مصلوب",
                'description_ar.min' => "حقل الوصف مصلوب",
                'description_en.required' => "يجب ان يكون الوصف اكبر من ثلال حروف",
                'description_en.min' => "يجب ان يكون الوصف اكير من ثلاث حروف",
            ]);

            // start upload image
            if ($image = $request->file('image')) {
                $request->validate([
                    'image'=>"required|image|max:3072|mimes:png,jpg,jpeg"
                ], [
                    'image.required' => "حقل الصورة مصلوب",
                    'image.image' => "يجب ان يكون نوع الملف صورة",
                    'image.mimes' => "يجب ادخال صورة بصيغة png او jpg او jpeg",
                    'image.max' => "يجب ان يكون حجم الصورة اقل من 3 ميجا"
                ]);

                $fileName = time() . $image->getClientOriginalName();
                $image->storeAs('images/slider', $fileName, ['disk' => 'public']);
                Storage::disk('public')->delete("images/slider/$slider->image");
//                unlink(public_path("storage/images/about-us/$about->image"));
            }
            // end upload image
            $store = $slider->update([
                "title_ar" => $request->post('title_ar'),
                "title_en" => $request->post('title_en'),
                "description_ar" => $request->post('description_ar'),
                "description_en" => $request->post('description_en'),
                "image" => $fileName ?? $slider->image,
            ]);
            session()->flash('update');
            return redirect()->route('slider.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        try {
            $delete = Slider::findOrFail($id);
            Storage::disk('public')->delete("images/slider/$delete->image");
            $delete->delete();
            // session()->flash('delete');
            return response()->json([
                'status' => 'success',
            ], 201);
            // return redirect()->route('slider.index');
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'faild',
                'error' => $e->getMessage(),
            ], 400);
            // return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }
}
