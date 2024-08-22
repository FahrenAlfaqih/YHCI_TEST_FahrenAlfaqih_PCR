<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile(){
        return view('profile');
    }

    public function updateProfile(Request $request)
    
    /*
    * Injeksi $request sangat penting sebagai parameter function CRUD karena 
    * 1. Untuk mengakses dan memvalidasi input dari user ketika memanggil function 
    * 2. Untuk masalah keamanan menghindari serangan CSRF
    * Intinya injeksi $request mempermudah function untuk berinteraksi langsung dengan data HTTP
    */
    {
        $user = auth()->user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();
        return redirect()->back()->with('succes', 'Profile updated Succesfully');
        /*
        * Fitur Keamanan yang perlu ditambahkan yaitu exception atau try catch untuk memvalidasi data yang diterima
        * tetapi setiap injeksi $request itu harus divalidate terlebih dahulu dengan kriteria email maupun name yang sesuai
        * $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . auth()->id(),
        ]);

        try {
            $user = auth()->user();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->save();
        
            return redirect()->back()->with('success', 'Profile updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update profile');
        }

        */
        }
}
