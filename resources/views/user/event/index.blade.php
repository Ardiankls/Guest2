@extends('user.layouts.app')

@section('content')
    <div class="shadow-lg p-3 mb-5 bg-white rounded-lg">
    @include('user.event.modal.add')
    @auth
        <div class="shadow-lg header mt-5 mb-5 rounded-lg">
            <h1>List Data</h1>
            {{-- <a class="mx-3 px-5 mb-3 btn btn-primary float-right" href="" role="button">Tambah</a> --}}
            <button type="button" class="mx-3 px-5 mb-3 btn btn-primary float-right" data-toggle="modal"
                    data-target="#addmodal">
                Join Event
            </button>
        </div>
    @endauth
    @if(count($attends) > 0)
        <table class="table table-bordered" id="table" width="100%" cellspacing="0">
            <thead>
            <tr class="text-center">
                <th>Event Id</th>
                <th>Event Title</th>
                <th>Event Description</th>
                <th>Event Date</th>
                <th>Application Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($attends as $event)
                <tr class="text-center">
                    <td>{{$event->id}}</td>
                    <td>{{$event->title}}</td>
                    <td><a type="button" class="text-primary" data-toggle="modal"
                           data-target="#showModal-{{$event->id}}">Read</a></td>
                    @include('user.event.modal.show_description')
                    <td>{{ \Carbon\Carbon::parse($event->event_date)->format('d F Y') }}</td>
                    <td>@if($event->pivot->is_approved == 0) <p class="text-warning">Pending</p>
                        @elseif($event->pivot->is_approved == 1) <p class="text-success">Approved</p>
                        @else <p class="text-danger">Rejected</p> @endif </td>
                    <td width="150px">
                        <div class="row no-gutters">
                            <div class="col-md-12">
                                <form action="{{route('user.guests.destroy', $event->id)}}" method="POST">
                                    {{ csrf_field() }}
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button class="btn btn-danger btn-circle"
                                            title="Withdrawal from application"
                                            type="submit"
                                            @if($event->pivot->is_approved != 0) disabled @endif>
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <h1 class="h4 mb-0 font-weight-bold text-primary">No Records</h1>
    @endif
    </div>
@endsection
