@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Create new category</div>

                    <div class="card-body">
                        <form class="form form-group" enctype="multipart/form-data" method="POST" action="{{ route('companies.store') }}">
                            @csrf
                            <div>
                                <label>Company name</label>
                                <input class="form-control" type="text" name="name" required>
                            </div>
                            <div>
                                <label>Company Address</label>
                                <input class="form-control" type="text" name="address">
                            </div>
                            <div>
                                <label>Company Website</label>
                                <input class="form-control" type="text" name="website">
                            </div>
                            <div>
                                <label>Company Logo</label>
                                <input class="form-control" type="file" name="logo">
                            </div>
                            <div>
                                <label>Company contact name</label>
                                <input class="form-control" type="text" name="contact_name">
                            </div>
                            <div>
                                <label>Company email</label>
                                <input class="form-control" type="email" name="email">
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
