<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\InstitutionType;
use App\Models\LocalBody;
use App\Models\Question;
use App\Models\Score;
use App\Models\Survey;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class WebController extends Controller
{
    public function loginForm()
    {
        return view('login');
    }

    public function signin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        try {
            $credentials = $request->only('username', 'password');
            if (Auth::attempt($credentials)) {
                /*Session::put('role', Auth::user()->role);*/
                return redirect()->route('dashboard')
                    ->with("success", 'User logged in successfully');
            }
            return redirect()->back()->with("error", "Invalid Credentials")->withInput($request->all());
        } catch (Exception $e) {
            return redirect()->back()->with("error", $e->getMessage())->withInput($request->all());
        }
    }

    public function signupForm()
    {
        $lbs = LocalBody::all();
        $districts = District::all();
        $itypes = InstitutionType::all();
        return view('signup', compact('lbs', 'districts', 'itypes'));
    }

    public function signup(Request $request)
    {
        $request->validate([
            'institution_name' => 'required',
            'institution_type' => 'required',
            'mobile' => 'required|numeric|digits:10|unique:users,mobile',
            'email' => 'required|email|unique:users,email',
            'local_body' => 'required',
            'district_id' => 'required',
            'username' => 'required|unique:users,username',
            'password' => 'required',
        ]);
        $input = $request->all();
        $input['name'] = $request->institution_name;
        $input['role'] = 'Public';
        $input['remember_token'] = Str::random(10);
        $input['password'] = Hash::make($request->password);
        User::create($input);
        return redirect()->route('login')->with("success", "User signedup successfully");
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with("success", "User logged out successfully");
    }

    public function dashboard()
    {

        $surveys = Survey::when(Auth::user()->role == 'Public', function ($q) {
            return $q->where('created_by', Auth::id());
        })->when(in_array(Auth::user()->role, ['Staff', 'Approver']), function ($q) {
            return $q->whereIn('created_by', User::where('role', 'Public')->where('district_id', Auth::user()->district_id)->pluck('id'));
        })->get();
        return view('web.dashboard', compact('surveys'));
    }

    public function survey()
    {
        $survey = Survey::where('created_by', Auth::id())->first();
        if ($survey) :
            return redirect()->route('dashboard')->with("error", "You have already submitted");
        else :
            $questions = Question::where('status', 1)->get()->unique('question_group');
        endif;
        return view('web.survey', compact('questions'));
    }

    public function surveySave(Request $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $survey = Survey::create([
                    'created_by' => $request->user()->id,
                    'status' => 'Pending',
                ]);
                $data = [];
                foreach ($request->qid as $key => $question) :
                    $q = Question::findOrFail($question);
                    $data[] = [
                        'survey_id' => $survey->id,
                        'question_id' => $q->id,
                        'survey_answer' => $request->answer[$key],
                        'survey_score' => $q->mark,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ];
                endforeach;
                Score::insert($data);
                $score = Score::where('survey_id', $survey->id)->where('survey_answer', 'Yes')->sum('survey_score');
                Survey::findOrFail($survey->id)->update([
                    'total_score_survey' => $score
                ]);
            });
        } catch (Exception $e) {
            return redirect()->back()->with("error", $e->getMessage())->withInput($request->all());
        }
        return redirect()->route('dashboard')->with("success", "Survey submitted successfully.");
    }

    public function surveyEdit(string $id)
    {
        try {
            $survey = Survey::where('id', decrypt($id))->where('status', 'Pending')->firstOrFail();
            $questions = Question::where('status', 1)->get()->unique('question_group');
        } catch (Exception $e) {
            return redirect()->back()->with("error", "Edit not allowed.");
        }
        return view('web.survey-edit', compact('questions', 'survey'));
    }

    public function surveyUpdate(Request $request, string $id)
    {
        try {
            DB::transaction(function () use ($request, $id) {
                $survey = Survey::findOrFail($id);
                $survey->update([
                    'updated_at' => Carbon::now(),
                ]);
                $data = [];
                foreach ($request->qid as $key => $question) :
                    $q = Question::findOrFail($question);
                    $data[] = [
                        'survey_id' => $survey->id,
                        'question_id' => $q->id,
                        'survey_answer' => $request->answer[$key],
                        'survey_score' => $q->mark,
                        'created_at' => $survey->created_at,
                        'updated_at' => Carbon::now(),
                    ];
                endforeach;
                Score::where('survey_id', $survey->id)->delete();
                Score::insert($data);
                $score = Score::where('survey_id', $survey->id)->where('survey_answer', 'Yes')->sum('survey_score');
                Survey::findOrFail($survey->id)->update([
                    'total_score_survey' => $score
                ]);
            });
        } catch (Exception $e) {
            return redirect()->back()->with("error", $e->getMessage())->withInput($request->all());
        }
        return redirect()->route('dashboard')->with("success", "Survey updated successfully.");
    }

    public function surveyApprove(string $id)
    {
        try {
            $survey = Survey::where('id', decrypt($id))->where('status', 'Pending')->firstOrFail();
            $questions = Question::where('status', 1)->get()->unique('question_group');
        } catch (Exception $e) {
            return redirect()->back()->with("error", "Edit not allowed.");
        }
        return view('web.survey-approve', compact('questions', 'survey'));
    }

    public function surveyApproveSave(Request $request, string $id)
    {
        try {
            DB::transaction(function () use ($request, $id) {
                $survey = Survey::findOrFail($id);
                $data = [];
                foreach ($request->qid as $key => $question) :
                    $q = Question::findOrFail($question);
                    $data[] = [
                        'survey_id' => $survey->id,
                        'question_id' => $q->id,
                        'survey_answer' => ($request->survey_answer[$key]) ?? 'No',
                        'approved_answer' => ($request->approved_answer[$key]) ?? 'No',
                        'survey_score' => $q->mark,
                        'approved_score' => $q->mark,
                        'created_at' => $survey->created_at,
                        'updated_at' => Carbon::now(),
                    ];
                endforeach;
                Score::where('survey_id', $survey->id)->delete();
                Score::insert($data);
                $score = Score::where('survey_id', $survey->id)->where('survey_answer', 'Yes')->sum('survey_score');
                $score1 = Score::where('survey_id', $survey->id)->where('approved_answer', 'Yes')->sum('approved_score');
                $survey->update([
                    'total_score_survey' => $score,
                    'total_score_approved' => $score1,
                    'status' => 'Approved',
                    'approved_by' => $request->user()->id,
                    'approved_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            });
        } catch (Exception $e) {
            return redirect()->back()->with("error", $e->getMessage())->withInput($request->all());
        }
        return redirect()->route('dashboard')->with("success", "Survey updated successfully.");
    }

    public function userRegister()
    {
        $users = User::when(Auth::user()->role == 'Administrator', function ($q) {
            return $q->where('role', 'Staff');
        })->when(Auth::user()->role == 'Staff', function ($q) {
            return $q->where('role', 'Approver');
        })->get();
        return view('web.user.index', compact('users'));
    }

    public function userForm()
    {
        $districts = District::all();
        $roles = [];
        if (Auth::user()->role == 'Administrator') :
            $roles = array('Staff' => 'Staff');
        else :
            $roles = array('Approver' => 'Approver');
        endif;
        return view('web.user.create', compact('districts', 'roles'));
    }

    public function userSave(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'mobile' => 'required|numeric|digits:10|unique:users,mobile',
            'email' => 'required|email|unique:users,email',
            'role' => 'required',
            'district_id' => 'required',
            'username' => 'required|unique:users,username',
            'password' => 'required',
        ]);
        $input = $request->all();
        $input['remember_token'] = Str::random(10);
        $input['password'] = Hash::make($request->password);
        User::create($input);
        return redirect()->route('user.register')->with("success", "User created successfully");
    }

    public function userEditForm(string $id)
    {
        $user = User::findOrFail(decrypt($id));
        $districts = District::all();
        $roles = [];
        if (Auth::user()->role == 'Administrator') :
            $roles = array('Staff' => 'Staff');
        else :
            $roles = array('Approver' => 'Approver');
        endif;
        return view('web.user.edit', compact('user', 'districts', 'roles'));
    }

    public function userUpdate(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'mobile' => 'required|numeric|digits:10|unique:users,mobile,' . $id,
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required',
            'district_id' => 'required',
            'username' => 'required|unique:users,username,' . $id,
        ]);
        $input = $request->all();
        if ($request->password) :
            $input['password'] = Hash::make($request->password);
        else :
            $input['password'] = User::findOrFail($id)->password;
        endif;
        User::findOrFail($id)->update($input);
        return redirect()->route('user.register')->with("success", "User updated successfully");
    }

    public function userDelete(string $id)
    {
        User::findOrFail(decrypt($id))->delete();
        return redirect()->route('user.register')->with("success", "User deleted successfully");
    }
}