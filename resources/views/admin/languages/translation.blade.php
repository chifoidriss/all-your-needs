@extends('admin.layouts.master')

@section('css')
    <style>
        .line-input {
            width: 100%;
            padding: 5px;
            border: 1px solid transparent;
            border-radius: 2px;
        }
        
        .line-input:focus, .line-input:hover {
            border-color: #8778a7;
        }
    </style>
@endsection

@section('content')
<div class="my-4 container">
    <div class="mx-auto">            
        <div class="">
            <h2 class="text-center border-bottom pb-3">
                @awt('Update Translation Text')
            </h2>

            <form class="form-contact" action="{{ route('admin.languages.translation.update', $target) }}" method="POST">
                @csrf

                <div class="table-responsive">
                    <table class="table table-sm table-hover">
                        <caption>
                            <a href="#" class="add-line text-primary">
                                <i class="fas fa-plus"></i>
                                @awt('Add new line')
                            </a>
                        </caption>
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">@awt('Original text') (EN)</th>
                                <th scope="col">@awt('Translated text') ({{ strtoupper($target) }})</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        @foreach ($lines as $line)
                        <tr>
                            <th role="row">
                                {{ $loop->index + 1 }}
                            </th>

                            <td>
                                <input type="text" name="words[]" readonly class="form-control- line-input" value="{{ $line['word'] }}">
                            </td>
    
                            <td>
                                <input type="text" name="translates[]" class="form-control- line-input" value="{{ $line['translate'] }}">
                            </td>
                            
                            <td>
                                <a class="remove-line text-danger" role="button">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach

                    </table>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        $('.remove-line').click(function (e) {
            e.preventDefault();
            $(this).parent().parent().remove();
        });

        $('.add-line').click(function (e) {
            e.preventDefault();

            var node = '';
            node =  '<tr>' +
                        '<th role="row">' +
                            '.' +
                        '</th>' +
                        '<td>' +
                            '<input type="text" name="words[]" class="form-control- line-input" placeholder="@awt("Type here to enter something")">' +
                        '</td>' +
                        '<td>' +
                            '<input type="text" name="translates[]" class="form-control- line-input" placeholder="@awt("Type here to enter something")">' +
                        '</td>' +
                        '<td>' +
                            '<a href="#" class="remove-line text-danger" role="button">' +
                                '<i class="fas fa-times"></i>' +
                            '</a>' +
                        '</td>' +
                    '</tr>';

            $(this).parent().parent().append(node);
        });
    </script>
@endsection