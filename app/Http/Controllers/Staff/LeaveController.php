<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LeaveFormRequest;
use App\Models\Leave;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;


class LeaveController extends Controller
{
    public function index()
    {
        return inertia('Staff/Leave/Index', [
            'leaves' => auth()->user()->leaves()->latest()->get()
        ]);
    }


    public function store(LeaveFormRequest $request)
    {
        $fromDate = Carbon::parse($request->from_date);
        $toDate = Carbon::parse($request->to_date);
        $days = $fromDate->diffInDays($toDate);

        if($days === 0) {
            Leave::create([
                'user_id'   => auth()->id(),
                'leave_type'    => $request->leave_type,
                'from_date'     => $request->from_date,
                'to_date'       => $request->to_date,
                'leave_days'    => 1,
                'reason'        => $request->reason,
            ]);
        } else {
            Leave::create([
                'user_id'   => auth()->id(),
                'leave_type'    => $request->leave_type,
                'from_date'     => $request->from_date,
                'to_date'       => $request->to_date,
                'leave_days'    => $days + 1,
                'reason'        => $request->reason,
            ]);
        }

        return redirect()->route('staff.leaves.index')
        ->with('message', __('message.leave.store'));
    }


    public function show()
    {
        if(!Gate::allows('edit_leave')) {
            abort(403);
        }
        return inertia('Staff/Leave/Show', [
            'leaves' => Leave::getStaffName()->whereLeaveStatus('pending')->get()
        ]);
    }

    public function edit(Leave $leave)
    {
        if(!Gate::allows('edit_leave')) {
            abort(403);
        }
        return inertia('Staff/Leave/Edit', [
            'leave' => [
                'id' => $leave->id,
                'from_date' => $leave->from_date,
                'to_date' => $leave->to_date,
                'reason' => $leave->reason,
                'leave_type' => $leave->leave_type,
            ],
        ]);
    }

    public function update(Leave $leave, Request $request)
    {
        if(!Gate::allows('edit_leave')) {
            abort(403);
        }

       $leave->update(['leave_status' => $request->leave_status]);
       return redirect()->route('staff.leaves.show')->with('message', __('message.leave.update'));
    }
}
