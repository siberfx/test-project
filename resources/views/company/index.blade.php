@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row mr-auto">
                        <span>Categories</span>
                        <span class="ml-4">
                        <a href="{{ route('companies.create') }}">Add new</a>
                        </span>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Logo</th>
                            <th scope="col">Company</th>
                            <th scope="col">Contact Name</th>
                            <th scope="col">Phone/Email</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($companies as $company)
                        <tr>
                            <th scope="row">{{ $company->id }}</th>
                            <td>{{ $company->logo }}</td>
                            <td>{{ $company->name }}</td>
                            <td>{{ $company->contact_name }}</td>
                            <td>{{ $company->phone }} / {{ $company->email }}</td>
                            <td class="row">
                                <a href="{{ route('companies.edit', ['company' => $company->id]) }}" class="btn btn-primary ml-2">Edit</a>
                                <form action="{{ url('/companies', ['id' => $company->id]) }}" method="post">
                                    <input class="btn btn-danger ml-2" type="submit" value="Delete" />
                                    @method('delete')
                                    @csrf
                                </form>
                            </td>
                        </tr>
                        @empty
                            <td colspan="6">
                                <div class="text-center">
                                    <span>
                                        No data found
                                    </span>
                                </div>
                            </td>

                        @endforelse

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
