@extends('admin.layouts.master')

@section('page-header', awt('Languages Files'))

@section('content')
<div class="container-md">
    <div class="card card-small mb-4">
        <div class="card-header border-bottom">
            <h6>@awt('Languages Files')</h6>
        </div>
        <div class="card-body p-0">
            <table class="table mb-0">
                <thead class="bg-light">
                    <tr>
                        <th scope="col" class="border-0">#</th>
                        <th scope="col" class="border-0">@awt('Code')</th>
                        <th scope="col" class="border-0">@awt('Name')</th>
                        <th scope="col" class="border-0"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($locales as $key => $value)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $key }}</td>
                        <td>{{ awt($value) }}</td>
                        <td>
                            <a href="{{ route('admin.languages.translation', $key) }}" class="btn btn-sm btn-outline-danger">
                                <i class="material-icons">more_vert</i>
                                <span class="d-md-inline d-none">@awt('Edit file')</span>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
