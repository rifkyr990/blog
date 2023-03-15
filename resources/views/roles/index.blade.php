@extends('layouts.admin')
@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<div class="container-fluid">
    <div class="row mt-4">
        <div class="col-xl-12 mb-5 mb-xl-0">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Role Management</h3>
                        </div>
                        <div class="col text-right">
                            @can('role-create')
                            <a class="btn btn-success btn-sm" href="{{ route('roles.create') }}"> Create New Role</a>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Name</th>
                                <th scope="col">Permission</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $key => $role)
                            <tr>
                                <th scope="row">
                                    {{++$i}}
                                </th>
                                <td>
                                    {{$role->name}}
                                </td>
                                <td>
                                    @foreach ($role->permissions as $data)
                                        <small href="" class="badge badge-primary">{{ $data->name }}</small>
                                    @endforeach
                                </td>
                                <td>
                                    <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}"><i
                                            class="bi bi-eye"></i></a>
                                    @can('role-edit')
                                    <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}"><i
                                            class="bi bi-pen"></i></a>
                                    @endcan
                                    @method('DELETE')
                                    @can('role-delete')
                                    <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
{!! $roles->render() !!}
@endsection
