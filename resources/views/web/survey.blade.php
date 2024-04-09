@extends("web.base")
@section("content")
<div class="content-wrapper">
    <div class="row">
        <div class="col-sm-12">
            <h2>Take Survey</h2>
        </div>
        @php($q = 1)
        {{ html()->form('POST', route('survey.save'))->open() }}
        @forelse($questions as $key => $question)
        <div class="col-sm-12 mt-5">
            <div class="card">
                <div class="card-body table-responsive">
                    <h4>Q{{ $q++}}.</h4>
                    <table class="table">
                        <tbody>
                            @forelse($question->getQuestions($question->question_group) as $key1 => $item)
                            <tr>
                                <input type="hidden" class="qid" name="qid[]" value="{{ $item->id }}" disabled />
                                <td>
                                    {{ html()->radio('rad_'.$item->question_group)->class('rad')->attribute('id', 'rad_'.$item->id)->attribute('value', $item->mark) }}
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
                                    {{ html()->select('answer[]', array('Yes' => 'Yes', 'No' => 'No'), 'No')->class('')->disabled() }}
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
            <a class="btn btn-block btn-danger font-weight-medium auth-form-btn" href="{{ route('form.survey') }}">Reset</a>
            {{ html()->submit('submit')->class('btn btn-block btn-submit btn-primary font-weight-medium auth-form-btn') }}
        </div>
        {{ html()->form()->close() }}
    </div>
</div>
@endsection