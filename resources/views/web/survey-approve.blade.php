@extends("web.base")
@section("content")
<div class="content-wrapper">
    <div class="row">
        <div class="col-sm-12">
            <h2>Update Survey</h2>
        </div>
        @php($q = 1)
        {{ html()->form('PUT', route('survey.approve', $survey->id))->open() }}
        @forelse($questions as $key => $question)
        <div class="col-sm-12 mt-5">
            <div class="card">
                <div class="card-body table-responsive">
                    <h4>Q{{ $q++}}.</h4>
                    <table class="table">
                        <tbody>
                            @forelse($question->getQuestions($question->question_group) as $key1 => $item)
                            <tr>
                                <input type="hidden" name="qid[]" value="{{ $item->id }}" />
                                <td width="85%">
                                    <h4 class="fw-bold">{{ $item->indicator }}</h4>
                                    <h5>{{ $item->question }}</h5>
                                    @forelse($item->details as $key2 => $sub)
                                    <p>{!! $sub->name !!}</p>
                                    @empty
                                    @endforelse
                                </td>
                                <td>
                                    <select name="answer[]" disabled>
                                        <option value="No">No</option>
                                        <option value="Yes" {{ ($survey->scores?->where('question_id', $item->id)?->first()?->survey_answer == 'Yes') ? 'selected' : '' }}>Yes</option>
                                    </select>
                                    <input type="hidden" name="survey_answer[]" value="{{ $survey->scores?->where('question_id', $item->id)?->first()?->survey_answer }}" />
                                </td>
                                <td>
                                    <select name="approved_answer[]">
                                        <option value="No">No</option>
                                        <option value="Yes">Yes</option>
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
            {{ html()->submit('Approve')->class('btn btn-block btn-submit btn-primary font-weight-medium auth-form-btn') }}
        </div>
        {{ html()->form()->close() }}
    </div>
</div>
@endsection