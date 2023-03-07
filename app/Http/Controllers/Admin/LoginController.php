<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected string $redirectTo = '/admin';

    public function __constructor() {
        $this->middleware('guest:admin')->except('logout');
    }

    /**
     * Display login page.
     *
     * @return Application|View|Factory
     */
    public function show(): Application|View|Factory
    {
        return view('admin.auth.login');
    }

    /**
     * Logs the authenticated admin user in.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function login(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::guard('admin')->attempt([
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ], $request->get('remember'))) {
            return redirect()->intended(route('admin-welcome'));
        }

        return back()->withInput($request->only('email', 'remember'));
    }

    /**
     * Logs the user out and redirect into the login page.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
