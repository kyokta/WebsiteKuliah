@extends('auth.layouts')

@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="text-align: center">No</th>
                        <th style="text-align: center">Nama</th>
                        <th style="text-align: center">Email</th>
                        <th style="text-align: center">Photo</th>
                        <th style="text-align: center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($user as $usr)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $usr->name }}</td>
                            <td>{{ $usr->email }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $usr->photo) }}" alt="{{ $usr->name }}" width="100">
                            </td>
                            <td>
                                <a href="{{ route('editUser', $usr->id) }}" class="btn btn-warning">Edit</a>
                                <a href="{{ route('deleteUser', $usr->id) }}" class="btn btn-danger"
                                    onclick="return confirm('Yakin hapus data user?')">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
