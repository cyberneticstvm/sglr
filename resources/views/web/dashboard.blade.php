@extends("web.base")
@section("content")
<div class="content-wrapper">
    <div class="row">
        <div class="col-sm-12">
            <div class="home-tab">
                <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="true">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ps-0" id="home-tab" data-bs-toggle="tab" href="#instruction" role="tab" aria-controls="instruction" aria-selected="true">Instructions</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Submitted</a>
                        </li>
                    </ul>
                    @if(in_array(Auth::user()->role, ['Public']))
                    <div>
                        <div class="btn-wrapper">
                            <a href="{{ route('form.survey') }}" class="btn btn-primary text-white me-0"><i class="icon-download"></i>Get Assessment Rating</a>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="tab-content tab-content-basic">
                    <div class="tab-pane active" id="dashboard" role="tabpanel" aria-labelledby="dashboard">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-body table-responsive">
                                        <h4 class="card-title">Dashboard</h4>
                                        <div class="row">
                                            @forelse($districts as $key => $district)
                                            <div class="col-md-3 mt-3">
                                                {{ $district->name }}
                                                <h5 class="fw-bold">0</h5>
                                            </div>
                                            @empty
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show" id="instruction" role="tabpanel" aria-labelledby="overview">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-body table-responsive">
                                        <h4>Assessment Instructions</h4>
                                        <a href="{{ asset('/assets/docs/brochure1.pdf') }}" target="_blank">Brochure</a>
                                        <div class="text-center mt-5">
                                            <img src="{{ asset('/assets/docs/1.jpeg') }}" class="img-fluid w-50" />
                                        </div>
                                        <div class="text-center mt-5">
                                            <img src="{{ asset('/assets/docs/2.jpeg') }}" class="img-fluid w-50" />
                                        </div>
                                        <div class="text-center mt-5">
                                            <img src="{{ asset('/assets/docs/3.jpeg') }}" class="img-fluid w-50" />
                                        </div>
                                        <div class="text-center mt-5">
                                            <img src="{{ asset('/assets/docs/4.jpeg') }}" class="img-fluid w-50" />
                                        </div>
                                        <div class="text-center mt-5">
                                            <img src="{{ asset('/assets/docs/5.jpeg') }}" class="img-fluid w-50" />
                                        </div>
                                        <div class="text-center mt-5">
                                            <img src="{{ asset('/assets/docs/6.jpeg') }}" class="img-fluid w-50" />
                                        </div>
                                        <div class="text-center mt-5">
                                            <img src="{{ asset('/assets/docs/7.jpeg') }}" class="img-fluid w-50" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="overview" role="tabpanel" aria-labelledby="overview">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-body table-responsive">
                                        <h4 class="card-title">Submitted Surveys</h4>
                                        <table class="table table-sm table-striped" id="order-listing">
                                            <thead>
                                                <tr>
                                                    <th>SL No</th>
                                                    <th>District</th>
                                                    <th>Localbody</th>
                                                    <th>Submitted By</th>
                                                    <th>Assessment Mark</th>
                                                    <th>Approved Mark</th>
                                                    <th>Submitted At</th>
                                                    <th>Approved At</th>
                                                    <th>Status</th>
                                                    <th>View</th>
                                                    <th>Edit</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($surveys as $key => $survey)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $survey->user->district->name }}</td>
                                                    <td>{{ $survey->user->localbody->name }}</td>
                                                    <td>{{ $survey->user->name }}</td>
                                                    <td>{{ $survey->total_score_survey }}</td>
                                                    <td>{{ $survey->total_score_approved }}</td>
                                                    <td>{{ $survey->created_at->format('d, M Y h:i a') }}</td>
                                                    <td>{{ $survey->approved_at }}</td>
                                                    <td><a href="{{ route('form.survey.approve', encrypt($survey->id)) }}">{{ $survey->status }}</a></td>
                                                    <td><a href="{{ route('form.survey.view', encrypt($survey->id)) }}">View</a></td>
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