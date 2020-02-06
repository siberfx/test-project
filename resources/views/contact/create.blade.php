@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Create new category</div>

                    <div class="card-body">
                        <form class="form form-group" enctype="multipart/form-data" method="POST" action="{{ route('contacts.store') }}">
                            @csrf
                            <div>
                                <label>contact name</label>
                                <input class="form-control" type="text" name="name">
                            </div>
                            <div>
                                <label>Photo</label>
                                <input class="form-control" type="file" name="photo">
                            </div>
                            <div>
                                <label>Company email</label>
                                <input class="form-control" type="email" name="email">
                            </div>
                            <div>
                                <label>Company</label>
                                <select name="company_id" class="form-control" required>
                                    @forelse($companies as $company)
                                        <option value="{{ $company->id }}"> {{ $company->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label>Company Phone</label>
                                <input class="form-control" type="text" name="phone">
                            </div>

                            <div class="mt-4">
                                <input class="btn btn-primary" type="submit" name="submit">
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
