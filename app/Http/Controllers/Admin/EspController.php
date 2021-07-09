<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\EspsImport;
use App\Models\Esp;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Maatwebsite\Excel\Facades\Excel;

class EspController extends Controller
{
    public function index()
    {
        return inertia('Admin/Esp/Index', [
            'esps' => DB::table('esps')
            ->select('id', 'name', 'phone_no', 'profile_pic')
            ->orderBy('name')
            ->get()
        ]);
    }


    public function store()
    {
        Esp::create(
            Request::validate([
                'name' => 'required|max:30',
                'designation' => 'required|max:30',
                'cid_no' => 'required|digits:11|unique:users',
                'phone_no' => 'required|digits:8|unique:users',
                'address' => 'required|max:30',
                'joining_date' => 'required|date',
            ])
        );

        return redirect()->route('admin.esp.index')->with('message', __('message.user.store'));
    }


    public function edit(Esp $esp)
    {
        return inertia('Admin/Esp/Edit', [
            'esp' => [
                'id' => $esp->id,
                'name' => $esp->name,
                'designation' => $esp->designation,
                'phone_no' => $esp->phone_no,
                'cid_no' => $esp->cid_no,
                'address' => $esp->address,
                'joining_date' => $esp->joining_date
            ]
        ]);
    }


    public function update(Esp $esp)
    {
        $esp->update(
            Request::validate([
                'name' => 'required|max:30',
                'designation' => 'required|max:30',
                'cid_no' => 'required|digits:11|unique:esps,cid_no,'.$esp->id,
                'phone_no' => 'required|digits:8|unique:esps,phone_no,'.$esp->id,
                'address' => 'required|max:30',
                'joining_date' => 'required|date',
            ])
        );

        return redirect()->route('admin.esp.index')->with('message', __('message.user.update'));
    }


    public function delete(Esp $esp)
    {
        $esp->delete();
        return redirect()->route('admin.esp.index')->with('message', __('message.user.delete'));
    }


    public function uploadEsp()
    {
        Request::validate(['file' => 'required|max:1024|mimes:xlsx,xls']);
        
        Excel::import(new EspsImport, Request::file('file'));
        return back()->with('message', __('message.file.upload'));
    }
}
