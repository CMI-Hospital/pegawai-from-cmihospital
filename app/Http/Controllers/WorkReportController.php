<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkReport;
use App\Models\Pegawai;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class WorkReportController extends Controller
{
    public function create()
    {
        return view('work_reports.create');
    }

    public function store(Request $request)
    {
     //   $request->validate([
       //     'start_time' => 'required|regex:/^(2[0-3]|[01][0-9]):([0-5][0-9])$/',
       //     'end_time' => 'required|regex:/^(2[0-3]|[01][0-9]):([0-5][0-9])$/',
      //      'work_description' => 'required|string',
       //     'work_date' => 'required|date',
       // ]);

        $user = Auth::user();

        $workReport = new WorkReport([
            'pegawai_id' => $user->id,
            'start_time' => $request->input('start_time'),
            'end_time' => $request->input('end_time'),
            'work_description' => $request->input('work_description'),
            'work_date' => $request->input('work_date'),
        ]);

        $workReport->save();

        return redirect()->route('work-reports.index')->with('success', 'Work report created successfully!');
    }

    public function edit(WorkReport $workReport)
    {
        // Authorize the update action
        $this->authorize('update', $workReport);

        return view('work_reports.edit', compact('workReport'));
    }

    public function update(Request $request, WorkReport $workReport)
    {
        // Authorize the update action
        $this->authorize('update', $workReport);

//        $request->validate([
//            'start_time' => 'required|regex:/^(2[0-3]|[01][0-9]):([0-5][0-9])$/',
//            'end_time' => 'required|regex:/^(2[0-3]|[01][0-9]):([0-5][0-9])$/',
//            'work_description' => 'required|string',
//            'work_date' => 'required|date',
//        ]);

        $workReport->update([
            'start_time' => $request->input('start_time'),
            'end_time' => $request->input('end_time'),
            'work_description' => $request->input('work_description'),
            'work_date' => $request->input('work_date'),
        ]);

        return redirect()->route('work-reports.index')->with('success', 'Work report updated successfully!');
    }

    public function index(Request $request)
    {
        // Check if there is an authenticated user
        if (auth()->check()) {
            $user = auth()->user();
            $role_id = $user->id_role;
            $pegawaiList = Pegawai::all();

            // Fetch the work reports based on the submitted filters
            $query = WorkReport::query();

            if ($request->filled('nama_pegawai')) {
                $query->where('pegawai_id', $request->input('nama_pegawai'));
            }

            if ($request->filled('work_date')) {
                $query->whereDate('work_date', $request->input('work_date'));
            }
            
            $query->orderBy('work_date', 'desc');





            // Check user roles for authorization based on role ID
            if ($user->id_role == 1) {
                $workReports = $query->get();
            } elseif ($user->id_role == 2) {
                $workReports = $query->get();
            } else {
                // Handle other roles as needed
                $workReports = WorkReport::where('pegawai_id', $user->id)->get();
            }

            return view('work_reports.index', compact('workReports', 'role_id', 'pegawaiList'));
        }

        // Redirect to login or handle as needed when there is no authenticated user
        return redirect()->route('login2');
    }
    public function destroy(WorkReport $workReport)
    {
        // Delete the work report
        $workReport->delete();
    
        // Redirect to a relevant page
        return redirect()->route('work-reports.index')
            ->with('success', 'Work report deleted successfully');
    }
    
    public function manage(Request $request)
    {
        // Check if there is an authenticated user
        if (auth()->check()) {
            $user = auth()->user();
            $role_id = $user->id_role;
            $pegawaiList = Pegawai::whereIn('id_role', [2, 3])
                      ->orderBy('nama', 'asc')
                      ->get();

            // Fetch the work reports based on the submitted filters
            $query = WorkReport::query()->with('pegawai');

            if ($request->filled('nama_pegawai')) {
                $query->where('pegawai_id', $request->input('nama_pegawai'));
            }

            if ($request->filled('work_date')) {
                $query->whereDate('work_date', $request->input('work_date'));
            }
            
            $query->orderBy('work_date', 'desc');





            // Check user roles for authorization based on role ID
            if ($user->id_role == 1) {
                $workReports = $query->get();
            } elseif ($user->id_role == 2) {
                $workReports = $query->get();
            } else {
                // Handle other roles as needed
                $workReports = WorkReport::where('pegawai_id', $user->id)->get();
            }

            return view('work_reports.manage', compact('workReports', 'role_id', 'pegawaiList'));
        }

        // Redirect to login or handle as needed when there is no authenticated user
        return redirect()->route('login2');
    }
}
