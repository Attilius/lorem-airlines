<?php

namespace App\Http\Controllers\Admin;

use App\Events\CustomerCreated;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Customer;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\View\View;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|View|Factory
     */
    public function index(): Application|View|Factory
    {
        //Event::dispatch(new CustomerCreated());
        $admins = Cache::remember('admins', 3600, function () {
            return Admin::orderBy('created_at', 'desc')->get();
        });

        $customers = Cache::remember('customers-page-'. request('page', 1), 3600, function (){
           return Customer::orderBy('created_at')->paginate(10);
        });

        return view("admin.pages.user-management", [
            'admins' => $admins /*Admin::orderBy('created_at', 'desc')->get()*/,
            'customers' => $customers /*Customer::orderBy('created_at')->paginate(10)*/,
        ]);
    }

    /**`
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('admin.pages.profile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
       /* attributes = $request->validate([
            'username' => ['max:255', 'min:2'],
            'firstname' => ['max:100'],
            'lastname' => ['max:100'],
            'email' => ['required', 'email', 'max:255',  Rule::unique('admins')->ignore(auth()->user()->id),],
            'password' => ['required', 'min:8'],
            'address' => ['max:100'],
            'phone' => ['max:100'],
            'city' => ['max:100'],
            'country' => ['max:100'],
            'postal' => ['max:100'],
            'about' => ['max:255']
        ]); */

        Admin::create([
            'username' => $request->username,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'phone' => $request->phone,
            'city' => $request->city,
            'country' => $request->country,
            'postal' => $request->postal,
            'about' => $request->about
        ]);

        //return redirect(route('user-management'));
        return back();
}

    /**
     * Display the specified resource.
     *
     * @return View
     * Optional route parameter needs to have a default value eg: $id = 1
     */
    public function show($id): View
    {
        $admin = Admin::findOrFail($id);

        return view('admin.pages.profile.show', $admin);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return View
     */
    public function edit($id): View
    {
        $admin = Admin::where('id', $id)->get();

        return view('admin.pages.profile.edit', $admin);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int int $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        Admin::where('id', $id)->update([
            'username' => $request->get('username'),
            'firstname' => $request->get('firstname'),
            'lastname' => $request->get('lastname'),
            'email' => $request->get('email'),
            'address' => $request->get('address'),
            'phone' => $request->get('phone'),
            'city' => $request->get('city'),
            'country' => $request->get('country'),
            'postal' => $request->get('postal'),
            'about' => $request->get('about')
        ]);

        return redirect(route('profile.show', $id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        Admin::destroy($id);

        return redirect(route('profile.index'))->with('message', 'Profile has been deleted!');
    }
}
