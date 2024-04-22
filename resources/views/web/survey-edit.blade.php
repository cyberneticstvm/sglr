@extends("web.base")
@section("content")
<div class="content-wrapper">
    <div class="row">
        <div class="col-sm-12 mb-3">
            <h2>Update Assessment Rating for {{ Auth::user()->institution_name }}</h2>
            <p>Select the button on left side of each question before marking your answer</p>
        </div>
        @php($q = 1)
        {{ html()->form('PUT', route('survey.update', $survey->id))->open() }}
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <h2>Institution Name</h2>
                        <h5 class="fw-bold">{{ Auth::user()->institution_name }}</h5>
                    </div>
                    <div class="col-md-3">
                        <h2>Institution Type</h2>
                        <h5 class="fw-bold">{{ Auth::user()->itype?->name }}</h5>
                    </div>
                    <div class="col-md-3">
                        <h2>About Facility</h2>
                        <p class="fw-bold">{{ Auth::user()->about_institution }}</p>
                    </div>
                    <div class="col-md-3">
                        <h2>District / Localbody</h2>
                        <p class="fw-bold">{{ Auth::user()->district?->name }} / {{ $survey->user?->localbody?->name }}</p>
                    </div>
                </div>
            </div>
            @forelse($questions as $key => $question)
            <div class="col-sm-12">
                <div class="">
                    <div class="card-body table-responsive">
                        <h2><span class="text-success">{{ $question->management }}</span></h2>
                        <h4 class="text-primary">{{ $question->infrastructure }}</h4>
                        <h4>Q{{ $q++}}.</h4>
                        <table class="table">
                            <tbody>
                                @forelse($question->getQuestions($question->question_group) as $key1 => $item)
                                <tr>
                                    <input type="hidden" class="qid" name="qid[]" value="{{ $item->id }}" {{ (!in_array($item->id, $survey->scores->pluck('question_id')->toArray())) ? 'disabled' : '' }} />
                                    <td>
                                        <input type="radio" name="rad_{{ $item->question_group }}" id="rad_{{ $item->id }}" class="rad" value="{{ $item->mark }}" {{ (in_array($item->id, $survey->scores->pluck('question_id')->toArray())) ? 'checked' : '' }}>
                                    </td>
                                    <td width="75%">
                                        <h4 class="fw-bold">{{ $item->indicator }}</h4>
                                        <h5 class="text-wrap lh-base">{{ $item->question }} <span class="text-danger">({{ $item->mark }} Marks)</span></h5>
                                        @forelse($item->details as $key2 => $sub)
                                        <p class="text-wrap">{!! $sub->name !!}</p>
                                        @empty
                                        @endforelse
                                    </td>
                                    <td>
                                        <select name="answer[]" class="slct" data-qid="{{ $item->id }}" id="slct_{{ $item->id }}" {{ (!in_array($item->id, $survey->scores->pluck('question_id')->toArray())) ? 'disabled' : '' }}>
                                            <option value="No">No</option>
                                            <option value="Yes" {{ ($survey->scores?->where('question_id', $item->id)?->first()?->survey_answer == 'Yes') ? 'selected' : '' }}>Yes</option>
                                        </select>
                                    </td>
                                </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @if(in_array($question->id, [14, 25]))
        </div>
        <div class="card mt-5">
            @endif
            @empty
            @endforelse
        </div>
        <div class="col-sm-12 mt-3 text-end">
            {{ html()->submit('Update')->class('btn btn-block btn-submit btn-primary font-weight-medium auth-form-btn') }}
        </div>
        {{ html()->form()->close() }}
    </div>
</div>
@endsection