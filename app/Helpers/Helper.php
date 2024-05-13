<?php

use App\Models\Survey;
use App\Models\User;

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
    return Survey::whereIn('created_by', User::where('district_id', $district)->pluck('id'))->count('id');
}
