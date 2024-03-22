
@extends('layout.base')

@section('content')
    <div class="container">
        <h1>Menejemen Artikel</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-success">
                eee{{ session('error') }}
            </div>
        @endif
        @if($errors->has('error'))
            <div class="alert alert-danger">
                aaa{{ $errors->first('error') }}
            </div>
        @endif
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Date</th>
                <th>Author</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @php $rowNumber = 1; @endphp
            @foreach ($articles as $article)
                <tr>
                    <td>{{ $rowNumber }}</td>
                    <td>{{ $article->title }}</td>
                    <td>{{ $article->created_at->format('M d, Y') }}</td>
                    <td>{{ $article->pegawai->nama }}</td>
                    <td>
                        <form action="{{ route('articles.approve', $article->id) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-primary">Approve</button>
                        </form>
                    </td>
                </tr>
                @php $rowNumber++; @endphp
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
