@extends('creator.layouts.app')
@section('content')
    <div class="container" style="margin-top: 20px;">
        <div class="shadow-lg p-3 mb-5 bg-white rounded-lg">
            <div class="py-3">
                <h1 class="h4 mb-0 font-weight-bold text-primary text-center">Event {{$event->title}} Detail's</h1>
            </div>
        </div>

        <div class="container shadow-lg p-3 mb-5 bg-white rounded">
            <a class="btn btn-primary " role="button"
               aria-pressed="true" href="@auth {{ route('creator.event.edit', $event) }} @endauth"  > Edit </a>

            <fieldset>
                <legend><b>Attendee List</b></legend>
                <div class="row">
                    @include('creator.event.details.guest_list')
                </div>
            </fieldset>
        </div>

{{--        <div class="row">--}}
{{--            <h1 class="col">Detail Event</h1>--}}
{{--        </div>--}}
{{--        <div class="row">--}}
{{--            @auth--}}
{{--                <div class="col-md-2 offset-md-10">--}}
{{--                    <a href="{{ route('creator.event.create') }}" class="btn btn-primary btn-block" role="button"--}}
{{--                       aria-pressed="true">Tambah</a>--}}
{{--                </div>--}}
{{--            @endauth--}}
{{--        </div>--}}
{{--        <div class="row" style="margin-top: 30px;">--}}
{{--            <table class="table table-striped">--}}
{{--                <thead>--}}
{{--                <tr>--}}
{{--                    <th scope="col">Title</th>--}}
{{--                    <th scope="col">Description</th>--}}
{{--                    <th scope="col">Status</th>--}}
{{--                    <th scope="col">Owned by</th>--}}
{{--                    <th scope="col">Updated At</th>--}}
{{--                    <th scope="col">Created At</th>--}}
{{--                    <th scope="col">Action</th>--}}
{{--                </tr>--}}
{{--                </thead>--}}
{{--            </table>--}}
{{--        </div>--}}
    </div>
@endsection
