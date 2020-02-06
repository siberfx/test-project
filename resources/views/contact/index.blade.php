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
                        <a href="{{ route('contacts.create') }}">Add new</a>
                        </span>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Photo</th>
                            <th scope="col">Name</th>
                            <th scope="col">Company Name</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Email</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($contacts as $contact)
                        <tr>
                            <th scope="row">{{ $contact->id }}</th>
                            <td>{{ $contact->photo }}</td>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->company->name }}</td>
                            <td>{{ $contact->phone }}</td>
                            <td>{{ $contact->email }}</td>
                            <td class="row">
                                <a href="{{ route('contacts.edit', ['contact' => $contact->id]) }}" class="btn btn-primary ml-2">Edit</a>
                                <form action="{{ url('/companies', ['id' => $contact->id]) }}" method="post">
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
