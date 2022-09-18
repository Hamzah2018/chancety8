<?php

namespace App\Http\Controllers\admin;
use App\Models\Setting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $settings = Setting::all();
        return view('admin.setting',compact( 'settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        DB::beginTransaction();
        $settings= new  Setting();
        $settings->direct_post = $request->direct_post;
        $settings->website_name = $request->website_name;
        $settings->website_descripe = $request->website_descripe;

        $settings->save();
        DB::commit();
        session()->flash('Add', 'تم اضافة البيانات بنجاح ');
        return redirect('admin/setting');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $id = $request->id;
        $setting = Setting::find($id);
        $setting->update([
            'direct_post' => $request->direct_post,
            'website_name' => $request->website_name,
            'website_descripe' => $request->website_descripe,
        ]);
        session()->flash('edit','تم تعديل البيانات بنجاج');
        return redirect('admin/setting');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request $request)
    {
        //
        $id = $request->id;
        Setting::find($id)->delete();
        session()->flash('delete','تم حذف البيانات بنجاح');
        return redirect('admin/setting');
        // back()
        // redirect('/home/dashboard');
    }
}
