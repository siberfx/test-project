@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Categories</div>

                    <div class="card-body">
                        <form class="form form-group">
                            @csrf
                            <label>Company name</label>
                            <input class="form-control">

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
