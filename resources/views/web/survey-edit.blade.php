@extends("web.base")
@section("content")
<div class="content-wrapper">
    <div class="row">
        <div class="col-sm-12">
            <h2>Update Survey</h2>
        </div>
        @php($q = 1)
        {{ html()->form('PUT', route('survey.update', $survey->id))->open() }}
        @forelse($questions as $key => $question)
        <div class="col-sm-12 mt-5">
            <div class="card">
                <div class="card-body table-responsive">
                    <h4>Q{{ $q++}}.</h4>
                    <table class="table">
                        <tbody>
                            @forelse($question->getQuestions($question->question_group) as $key1 => $item)
                            <tr>
                                <input type="hidden" class="qid" name="qid[]" value="{{ $item->id }}" {{ (!in_array($item->id, $survey->scores->pluck('question_id')->toArray())) ? 'disabled' : '' }} />
                                <td>
                                    <input type="radio" name="rad_{{ $item->question_group }}" id="rad_{{ $item->id }}" class="rad" value="{{ $item->mark }}" {{ (in_array($item->id, $survey->scores->pluck('question_id')->toArray())) ? 'checked' : '' }}>
                                </td>
                                <td width="85%">
                                    <h4 class="fw-bold">{{ $item->indicator }}</h4>
                                    <h5>{{ $item->question }}</h5>
                                    @forelse($item->details as $key2 => $sub)
                                    <p>{!! $sub->name !!}</p>
                                    @empty
                                    @endforelse
                                </td>
                                <td>
                                    <select name="answer[]" {{ (!in_array($item->id, $survey->scores->pluck('question_id')->toArray())) ? 'disabled' : '' }}>
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
        @empty
        @endforelse
        <div class="col-sm-12 mt-3 text-end">
            {{ html()->submit('Update')->class('btn btn-block btn-submit btn-primary font-weight-medium auth-form-btn') }}
        </div>
        {{ html()->form()->close() }}
    </div>
</div>
@endsection