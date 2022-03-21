<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class DashboardController extends Controller {
    public function index() {
        return redirect('/dashboard/employees');
    }

    public function showProfile() {
        return view('dashboard.profile');
    }

    public function updateProfile(Request $request) {
        $validatedRequest = $request->validate([
            'name' => 'required',
            'email' => ['email:dns', 'unique:users,email,' . Auth::id()],
         ]);

        User::where('id', auth()->id())->update($validatedRequest);
        return redirect()->route('profile')->with('success', 'Profile updated successfully');
    }

    public function updatePassword(Request $request) {
        $validatedRequest = $request->validate([
            'current_password' => 'required|current_password',
            'password' => ['required', 'min:8', 'max:16', 'confirmed', Password::min(8)->letters()->mixedCase()->numbers()->symbols()->uncompromised()],
            'password_confirmation' => 'required|same:password',
        ]);
    
        User::where('id', Auth::id())->update(['password' => Hash::make($validatedRequest['password'])]);
    
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect('login')->with('success', 'Password berhasil diubah, silahkan login kembali');
    }
}
