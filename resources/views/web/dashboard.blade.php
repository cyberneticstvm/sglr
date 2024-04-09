@extends("web.base")
@section("content")
<div class="content-wrapper">
    <div class="row">
        <div class="col-sm-12">
            <div class="home-tab">
                <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Submitted</a>
                        </li>
                    </ul>
                    <div>
                        <div class="btn-wrapper">
                            <a href="{{ route('form.survey') }}" class="btn btn-primary text-white me-0"><i class="icon-download"></i>Get Assessment Rating</a>
                        </div>
                    </div>
                </div>
                <div class="tab-content tab-content-basic">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-body table-responsive">
                                        <h4 class="card-title">Submitted Surveys</h4>
                                        <table class="table table-sm table-striped" id="order-listing">
                                            <thead>
                                                <tr>
                                                    <th>SL No</th>
                                                    <th>Submitted By</th>
                                                    <th>Score Provided</th>
                                                    <th>Score Approved</th>
                                                    <th>Submitted At</th>
                                                    <th>Approved At</th>
                                                    <th>Status</th>
                                                    <th>Edit</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($surveys as $key => $survey)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $survey->user->name }}</td>
                                                    <td>{{ $survey->total_score_survey }}</td>
                                                    <td>{{ $survey->total_score_approved }}</td>
                                                    <td>{{ $survey->created_at->format('d, M Y h:i a') }}</td>
                                                    <td>{{ $survey->approved_at->format('d, M Y h:i a') }}</td>
                                                    <td><a href="{{ route('form.survey.approve', encrypt($survey->id)) }}">{{ $survey->status }}</a></td>
                                                    <td class="text-center"><a href="{{ route('form.survey.edit', encrypt($survey->id)) }}">Edit</a></td>
                                                </tr>
                                                @empty
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection