<?php

namespace App\Http\Controllers\admin;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //           ::select('name','surname')->where('id', 1)->get();
        $customers = User::where('user_type','customer' )->get();
        return view('admin.customer',compact( 'customers'));
        // return view('welcome',compact( 'customers'));
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
        $validated = $request->validate([
            // 'id' =>'numeric',
            // 'fname' => 'required|unique:posts|max:255',
            // 'lname' => 'required|unique:posts|max:255',
            'fname' => ['required', 'string', 'max:255','min:3'],
            'lname' => ['required', 'string', 'max:255','min:3'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', ],
        ]);
        // 'confirmed'
        DB::beginTransaction();
        $customers= new  User();
        $customers->fname = $request->fname;
        $customers->lname = $request->lname;
        $customers->user_type = 'customer';
        $customers->password = $request->password;
        $customers->email = $request->email;
        $customers->second_email = $request->second_email;
        $customers->save();

        if($request->hasFile('image')){

            $file = $request->file('image');
                $name = $file->getClientOriginalName();
                // $file->storeAs('');
                $file->storeAs('attachments/users/'.$customers->user_type.'/'.$customers->name,$file->getClientOriginalName(),'upload_attachments');
            $image = new Image();
            $image->filename = $name;
            $image->imageable_id = $customers->id;
            $image->imageable_type = 'App\Models\user';
            $image->save();

    }
        DB::commit();
        session()->flash('Add', 'تم اضافة العميل بنجاح ');
        return redirect('admin/customer');
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
        $customers = User::find($id);
        $customers->update([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'user_type' => 'customer',
            'email' => $request->email,
            'second_email' => $request->second_email
        ]);
        session()->flash('edit','تم تعديل العميل بنجاج');
        return redirect('admin/customer');
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
        User::find($id)->delete();
        session()->flash('delete','تم حذف العميل بنجاح');
        return redirect('customer');
        // back()
        // redirect('/home/dashboard');
    }
}
