@extends("web.base")
@section("content")
<div class="content-wrapper">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body table-responsive">
                    <h4 class="card-title">User Register <a href="{{ route('form.user.create') }}">Add User</a></h4>
                    <table class="table table-sm table-striped" id="order-listing">
                        <thead>
                            <tr>
                                <th>SL No</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Mobile Number</th>
                                <th>District</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $key => $user)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->mobile }}</td>
                                <td>{{ $user->district->name }}</td>
                                <td class="text-center"><a href="{{ route('form.user.edit', encrypt($user->id)) }}">Edit</a></td>
                                <td class="text-center"><a class="dlt" href="{{ route('user.delete', encrypt($user->id)) }}">Delete</a></td>
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
@endsection