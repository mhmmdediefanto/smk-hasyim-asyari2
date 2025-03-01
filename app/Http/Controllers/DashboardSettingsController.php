<?php

namespace App\Http\Controllers;

use App\Models\SettingsFront;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DashboardSettingsController extends Controller
{

    public function settingShow()
    {
        $settingsFront =  SettingsFront::first();
    //   dd($settingsFront);
        return view('dashboard.settings.index', compact('settingsFront'));
    }


    public function addFront(Request $request)
    {
        // dd($request->all());
        try {
            DB::beginTransaction();
            $validatedData = $request->validate([
                'title' => 'required|max:225',
                'width' => 'required',
                'image_header' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
                'image_footer' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            ]);
            // dd($validatedData);

            if ($request->image_header) {
                $validatedData['image_header'] = $request->file('image_header')->store('images/setttings-front', 'public');
            }

            if ($request->image_footer) {
                $validatedData['image_footer'] = $request->file('image_footer')->store('images/setttings-front', 'public');
            }

            SettingsFront::create($validatedData);

            DB::commit();
            return back()->with('success', 'Settings Front Berhasil Ditambahkan');
        } catch (\Throwable $th) {

            DB::rollBack();
            return back()->with('error', $th->getMessage());
        }
    }

    public function updateFront(Request $request, $id)
    {

        try {
            DB::beginTransaction();
            $frontSettings = SettingsFront::find($id);

            if (
                !$frontSettings
            ) {
                return back()->with('error', 'Settings Front tidak ditemukan');
            }

            $rules = [
                'title' => 'required|max:225',
                'width' => 'required',
            ];

            // cek apakah ada request gambar
            if ($request->image_header) {
                $rules['image_header'] = 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048';

                // cek apakah ditemukan gambar lama
                if ($frontSettings->image_header) {
                    // hapus gambar lama
                    Storage::disk('public')->delete($frontSettings->image_header);
                }
            }

            if ($request->image_footer) {
                $rules['image_footer'] = 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048';
                if ($frontSettings->image_footer) {
                    Storage::disk('public')->delete($frontSettings->image_footer);
                }
            }

            // validasi
            $validatedData = $request->validate($rules);


            if ($request->image_header) {
                $validatedData['image_header'] = $request->file('image_header')->store('images/setttings-front', 'public');
            }

            if ($request->image_footer) {
                $validatedData['image_footer'] = $request->file('image_footer')->store('images/setttings-front', 'public');
            }

            // update data
            $frontSettings->update($validatedData);

            DB::commit();
            return back()->with('success', 'Settings Front Berhasil Diupdate');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function destroyFront($id)
    {
        try {
            DB::beginTransaction();
            $frontSettings = SettingsFront::find($id);

            if (
                !$frontSettings
            ) {
                return back()->with('error', 'Settings Front tidak ditemukan');
            }

            if ($frontSettings->image_header) {
                Storage::disk('public')->delete($frontSettings->image_header);
            }

            if ($frontSettings->image_footer) {
                Storage::disk('public')->delete($frontSettings->image_footer);
            }

            // update data
            $frontSettings->delete();

            DB::commit();
            return back()->with('success', 'Settings Front Berhasil Dihapus');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
