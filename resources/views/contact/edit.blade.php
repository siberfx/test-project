@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Categories</div>

                    <div class="card-body">
                        <form class="form form-group" enctype="multipart/form-data" method="POST" action="{{ route('contacts.update', ['company' => $company->id]) }}">
                            @csrf
                            @method('PATCH')
                            <div>
                                <label>Company name</label>
                                <input class="form-control" type="text" name="name" value="{{ $company->name }}" required>
                            </div>
                            <div>
                                <label>Company Address</label>
                                <input class="form-control" type="text" name="address" value="{{ $company->address }}">
                            </div>
                            <div>
                                <label>Company Website</label>
                                <input class="form-control" type="text" name="website" value="{{ $company->website }}">
                            </div>
                            <div>
                                <label>Company Logo</label>
                                <input class="form-control" type="file" name="logo">
                            </div>
                            <div>
                                <label>Company contact name</label>
                                <input class="form-control" type="text" name="contact_name" value="{{ $company->detail->contact_name }}">
                            </div>
                            <div>
                                <label>Company email</label>
                                <input class="form-control" type="email" name="email" value="{{ $company->detail->email }}">
                            </div>
                            <div>
                                <label>Company Phone</label>
                                <input class="form-control" type="text" name="phone" value="{{ $company->detail->phone }}">
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
