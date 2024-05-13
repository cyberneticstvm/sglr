<?php

use App\Models\Survey;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

function roles()
{
    return array('Administrator' => 'Administrator', 'Staff' => 'Staff', 'Approver' => 'Approver', 'Public' => 'Public');
}

function statuses()
{
    return array('Pending' => 'Pending', 'Approved' => 'Approved');
}

function submittedAssessmentCount($district)
{
    return Survey::when(in_array(Auth::user()->role, ['Administrator', 'Staff', 'Approver']), function ($q) use ($district) {
        return $q->whereIn('created_by', User::where('district_id', $district)->pluck('id'));
    })->when(in_array(Auth::user()->role, ['Public']), function ($q) {
        return $q->where('created_by', Auth::user()->id);
    })->count('id');
}
