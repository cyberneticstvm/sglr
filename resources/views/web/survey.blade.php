@extends("web.base")
@section("content")
<div class="content-wrapper">
    <div class="row">
        <div class="col-sm-12 mb-3">
            <h2>Get Assessment Rating</h2>
            <p>Select the button on left side of each question before marking your answer</p>
        </div>
        @php($q = 1)
        {{ html()->form('POST', route('survey.save'))->open() }}
        <div class="card">
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
                                    <input type="hidden" class="qid" name="qid[]" value="{{ $item->id }}" disabled />
                                    <td>
                                        {{ html()->radio('rad_'.$item->question_group)->class('rad')->attribute('id', 'rad_'.$item->id)->attribute('value', $item->mark) }}
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
            @if(in_array($question->id, [14, 25]))
        </div>
        <div class="card mt-5">
            @endif
            @empty
            @endforelse
        </div>
        <div class="col-sm-12 mt-3 text-end">
            <a class="btn btn-block btn-danger font-weight-medium auth-form-btn" href="{{ route('form.survey') }}">Reset</a>
            {{ html()->submit('submit')->class('btn btn-block btn-submit btn-primary font-weight-medium auth-form-btn') }}
        </div>
        {{ html()->form()->close() }}
    </div>
</div>
@endsection