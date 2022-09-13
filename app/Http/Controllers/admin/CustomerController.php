<?php

namespace App\Http\Controllers\admin;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Storage;

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
            'fname' => 'required|unique:posts|max:255',
            'lname' => 'required|unique:posts|max:255',
            'fname' => 'required|unique:posts|max:255',
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        DB::beginTransaction();
        $customers= new  User();
        $customers->fname = $request->fname;
        $customers->lname = $request->lname;
        $customers->user_type = 'customer';
        $customers->password = $request->password;
        $customers->email = $request->email;
        $customers->second_email = $request->second_email;
        $customers->save();
        DB::commit();
        session()->flash('Add', 'تم اضافة العميل بنجاح ');
        return redirect('/customer');
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
            'user_type' => $request->user_type,
            'email' => $request->email,
            'second_email' => $request->second_email
        ]);
        session()->flash('edit','تم تعديل العميل بنجاج');
        return redirect('/customer');
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
