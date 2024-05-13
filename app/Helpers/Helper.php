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
    return Survey::where('created_by', 3)->count('id');
}
