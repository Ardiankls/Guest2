@extends('layouts.app')
@section('content')
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col">Edit Data</h1>
        </div>
        <div class="row">
            <div class="col">
                <form action="{{ route('student.update', $student) }}" method="post">
                    @csrf
                    <input type="hidden" name="_method" value="PATCH">
                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" class="form-control" name="name" value="{{ $student->name }}">
                    </div>
                    <div class="form-group">
                        <label>Nim:</label>
                        <input class="form-control" value="{{ $student->nim }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Email:</label>
                        <input class="form-control" value="{{ $student->email }}" disabled>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
