<?php

namespace App\Http\Controllers;

// load model
use App\Http\Requests\UserImageFormRequest;
use App\User;
use App\UserGroup;
use File;
use Image;
// load session
//use Intervention\Image\ImageManagerStatic as Image;
use Session;

use Illuminate\Http\Request;

// load validation
use App\Http\Requests\UserFormRequest;

class UserController extends Controller
{
	function __construct()
	{
		$this->middleware('auth');
		$this->middleware('admin', ['only' => ['create', 'store', 'destroy']]);
		$this->middleware('userown', ['only' => ['edit', 'update', 'show']]);
	}
	 /**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		// echo auth()->user()->id_group;
		$user = User::all();
		return view('user.index', compact('user'));
	}
	
	 /**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
		$us = User::all();
		$gr = UserGroup::all();
		// display form for adding user
		return view('user.index', compact(['us', 'gr']));
	}
	
	 /**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		User::create([
			'name' => request('name'),
			'username' => $request->username,
			'email' => strtolower(request('email')),
			'password' => bcrypt(request('password')),
			'id_group' => request('id_group'),
			'color' => request('color'),
			'bname' => request('bname'),
			'baddress' => request('baddress'),
			'baddress2' => request('baddress2'),
			'city' => request('city'),
			'county' => request('county'),
			'postcode' => request('postcode'),
			'businesspn' => request('businesspn'),
			'businessemail' => request('businessemail'),
			'vat' => request('vat'),
			'bownername' => request('bownername'),
			'bownernum' => request('bownernum'),
			]);
	
		// message to confirm storing data
		Session::flash('flash_message', 'Data successfully added!');
	
		// redirect back to original route
		return redirect()->back();
	}
	
	 /**
	 * Display the specified resource.
	 *
	 * @param  \App\User  $User
	 * @return \Illuminate\Http\Response
	 */
	public function show(User $user)
	{
		//
	}
	
	 /**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function edit(User $user)
	{
		$gr = UserGroup::all();
		//just show straight to the form
		return view('user.edit', compact(['user', 'gr']));
	}
	
	 /**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, User $user)
	{

        if($request->file('image') != ""){
            $requestData = $request->all();
            $mime = $request->file('image')->getMimeType();
            $fileName = time() . $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('/images/pdfimages', $fileName, 'public');

            User::where('id', $user->id)
                ->update([
                    'user_logo_image' => $fileName,
                    'user_logo_mime' => $mime,
                ]);
        }
//
//		 form process for id - update database
        if(auth()->user()->id_group == 1 ) {
            User::where('id', $user->id)
                ->update([
                    'name' => request('name'),
                    'username' => $request->username,
                    'email' => strtolower(request('email')),
                    'password' => bcrypt(request('password')),
                    'id_group' => request('id_group'),
                    'color' => request('color'),
                    'bname' => request('bname'),
                    'baddress' => request('baddress'),
                    'baddress2' => request('baddress2'),
                    'city' => request('city'),
                    'county' => request('county'),
                    'postcode' => request('postcode'),
                    'businesspn' => request('businesspn'),
                    'businessemail' => request('businessemail'),
                    'vat' => request('vat'),
                    'bownername' => request('bownername'),
                    'bownernum' => request('bownernum'),
                    'updated_at' => $request->updated_at
                ]);
        }else{
            User::where('id', $user->id)
                ->update([
                    'bname' => request('bname'),
                    'baddress' => request('baddress'),
                    'baddress2' => request('baddress2'),
                    'city' => request('city'),
                    'county' => request('county'),
                    'postcode' => request('postcode'),
                    'businesspn' => request('businesspn'),
                    'businessemail' => request('businessemail'),
                    'vat' => request('vat'),
                    'updated_at' => $request->updated_at
                ]);

        }

        // $user->touch();
		// info when update success
		Session::flash('flash_message', 'Data successfully edited!');

		return redirect(route('user.edit', $user->slug));      // redirect back to original route
	}
	
	 /**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(User $user)
	{
		//
		User::destroy($user->id);
		// info when update success
		// Session::flash('flash_message', 'Data successfully deleted!');

		// $user = User::all();
		// return view('user.index', compact('user'));
		return redirect(route('user.index'));		// redirect back to original route
	}
}
