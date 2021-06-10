@extends('adminlte::page')

@section('title', 'Settings | Common')

@section('content_header')

@stop

@section('content')
    <div class="wrapper">
        <h2>About</h2>
        <hr>
        @include('includes.alerts')
        <form
            action="{{ route('admin.settings.services.update') }}"
            method="POST"
        >
            @csrf
            <div class="row">
                <div class="col-12">
                    <label for="about-block">About</label>
                    <textarea
                        name="about"
                        id="about-block"
                        cols="30"
                        rows="20"
                        class="form-control editor-plugin"
                    >{{ $aboutSettings }}</textarea>
                    @error('about')
                    <small class="text-danger"><strong>{{ $message }}</strong></small>
                    @enderror
                </div>
                <div class="col-12 mt-4">
                    <label for="user_agreement">User Agreement</label>
                    <textarea
                        name="user_agreement"
                        id="user_agreement"
                        cols="30"
                        rows="20"
                        class="form-control editor-plugin"
                    >{{ $userAgreement }}</textarea>
                    @error('user_agreement')
                    <small class="text-danger"><strong>{{ $message }}</strong></small>
                    @enderror
                </div>
                <div class="col-12 mt-4">
                    <label for="user_agreement_points">User Agreement Points</label>
                    <textarea
                        name="user_agreement_points"
                        id="user_agreement_points"
                        cols="30"
                        rows="20"
                        class="form-control editor-plugin"
                    >{{ $userAgreementPoints }}</textarea>
                    @error('user_agreement_points')
                    <small class="text-danger"><strong>{{ $message }}</strong></small>
                    @enderror
                </div>
            </div>
            <div class="row justify-content-center mt-3 mb-4">
                <div class="col-md-2 col-lg-2 col-sm-12">
                    <input
                        type="submit"
                        class="btn btn-primary d-block w-100"
                        value="Update"
                    >
                </div>
            </div>
        </form>
    </div>
@stop

@section('css')

@stop

@section('js')
    <script src="https://cdn.tiny.cloud/1/nnfvj0kbspvh5j6ydwa47qm4rpt8t90s75qszxsn28s1j35w/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        const editorItems = document.querySelectorAll('.editor-plugin');
        editorItems.forEach(item => {
            tinymce.init({
                selector: `textarea#${item.id}`,
                plugins: 'lists',
                toolbar: 'numlist bullist'
            });
        });
    </script>
@stop
