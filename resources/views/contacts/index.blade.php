@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="col-12">
                <a href="contact/create" class="btn btn-primary mb-2">Add Contact</a>
                <a href="contact/create" class="btn btn-primary mb-2">Contacts</a>
                <br>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Company</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contacts as $contact)
                        <tr>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->company }}</td>
                            <td>{{ $contact->phone }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>
                            <a href="contact/{{$contact->id}}" class="btn btn-primary">Show</a>
                            <a href="contact/{{$contact->id}}/edit" class="btn btn-primary">Edit</a>
                            <form action="contact/{{$contact->id}}" method="post" class="d-inline">
                                {{ csrf_field() }}
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- Pagination --}}
                {!! $contacts->appends(['sort' => 'name'])->links() !!}
            </div> 
    </div>
</div>
@endsection