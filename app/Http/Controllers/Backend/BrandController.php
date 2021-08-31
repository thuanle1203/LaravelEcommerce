<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Image;

class BrandController extends Controller
{
    public function BrandView() {
        $brands = Brand::latest()->get();

        return view('backend.brand.brands_view', compact('brands'));
    }

    public function BrandStore(Request $request) {
        $request->validate([
            'brand_name_en' =>'required',
            'brand_name_vi' =>'required',
            'brand_img' =>'required',
        ], [
            'brand_name_en.required' => 'Input Brand English Name',
            'brand_name_vi.required' => 'Input Brand VietNamese Name',
        ]);

        $image = $request->file('brand_img');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300, 200)->save('uploads/brand/'.$name_gen);
        $save_url = 'uploads/brand/'.$name_gen;

        Brand::insert([
            'brand_name_en' => $request->brand_name_en,
            'brand_name_vi' => $request->brand_name_vi,
            'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_name_en)),
            'brand_slug_vi' => str_replace(' ', '-', $request->brand_name_vi),
            'brand_img' => $save_url,
        ]);

        $notification = array(
            'message' => 'Brand Insert Successfully',
            'alert_type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function BrandEdit($id) {
        $brand = Brand::findOrFail($id);

        return view('backend.brand.brand_edit', compact('brand'));
    }

    public function BrandUpdate(Request $request) {
        $old_img = $request->old_img;
        $brand_id = $request->id;

        if ($request->file('brand_img')) {
            unlink($old_img);
            $image = $request->file('brand_img');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300, 200)->save('uploads/brand/'.$name_gen);
            $save_url = 'uploads/brand/'.$name_gen;

            Brand::findOrFail($brand_id)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_vi' => $request->brand_name_vi,
                'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_name_en)),
                'brand_slug_vi' => str_replace(' ', '-', $request->brand_name_vi),
                'brand_img' => $save_url,
            ]);

            $notification = array(
                'message' => 'Brand Updated Successfully',
                'alert_type' => 'infor'
            );

            return redirect()->route('all.brand')->with($notification);
        } else {
            Brand::findOrFail($brand_id)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_vi' => $request->brand_name_vi,
                'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_name_en)),
                'brand_slug_vi' => str_replace(' ', '-', $request->brand_name_vi),
            ]);

            $notification = array(
                'message' => 'Brand Updated Successfully',
                'alert-type' => 'infor'
            );

            return redirect()->route('all.brand')->with($notification);
        }
    }
    public function BrandDelete($id) {
        $brand = Brand::findOrFail($id);
        unlink($brand->brand_img);

        Brand::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Brand Deleted Successfully',
            'alert_type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
