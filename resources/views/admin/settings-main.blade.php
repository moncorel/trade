@extends('adminlte::page')

@section('title', 'Settings | Main Page')

@section('content_header')
@stop

@section('content')
    <div class="wrapper">
        <h2 class="mt-3">Main Page</h2>
        <hr>
        @include('includes.alerts')
        <form action="{{ route('admin.settings.main-page.update') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="main_welcome_header">Welcome Header</label>
                        <textarea
                            name="main_welcome_header"
                            id="main_welcome_header"
                            rows="10"
                            class="form-control editor-plugin @error('main_welcome_header') is-invalid border-danger @enderror"
                            required
                        >{{ $mainWelcomeHeader }}</textarea>
                        @error('main_welcome_header')
                        <small><strong>{{ $message }}</strong></small>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="main_welcome_desc">Welcome Description</label>
                        <textarea
                            name="main_welcome_desc"
                            id="main_welcome_desc"
                            rows="10"
                            class="form-control editor-plugin @error('main_welcome_desc') is-invalid border-danger @enderror"
                            required
                        >{{ $mainWelcomeDescription }}</textarea>
                        @error('main_welcome_desc')
                        <small><strong>{{ $message }}</strong></small>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="main_secured_deal">Secured Deal Description</label>
                        <textarea
                            name="main_secured_deal"
                            id="main_secured_deal"
                            rows="10"
                            class="form-control editor-plugin @error('main_secured_deal') is-invalid border-danger @enderror"
                            required
                        >{{ $securedDealDesc }}</textarea>
                        @error('main_secured_deal')
                        <small><strong>{{ $message }}</strong></small>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="main_trading">Trading Description</label>
                        <textarea
                            name="main_trading"
                            id="main_trading"
                            rows="10"
                            class="form-control editor-plugin @error('main_trading') is-invalid border-danger @enderror"
                            required
                        >{{ $mainTradingDesc }}</textarea>
                        @error('main_trading')
                        <small><strong>{{ $message }}</strong></small>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="protection_advantage">Protection Advantage</label>
                        <textarea
                            name="protection_advantage"
                            id="protection_advantage"
                            rows="10"
                            class="form-control editor-plugin @error('protection_advantage') is-invalid border-danger @enderror"
                            required
                        >{{ $protectionAdvantage }}</textarea>
                        @error('protection_advantage')
                        <small><strong>{{ $message }}</strong></small>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="safety_advantage">Safety Advantage</label>
                        <textarea
                            name="safety_advantage"
                            id="safety_advantage"
                            rows="10"
                            class="form-control editor-plugin @error('safety_advantage') is-invalid border-danger @enderror"
                            required
                        >{{ $safetyAdvantage }}</textarea>
                        @error('safety_advantage')
                        <small><strong>{{ $message }}</strong></small>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="support_advantage">24h Support Advantage</label>
                        <textarea
                            name="support_advantage"
                            id="support_advantage"
                            rows="10"
                            class="form-control editor-plugin @error('support_advantage') is-invalid border-danger @enderror"
                            required
                        >{{ $supportAdvantage }}</textarea>
                        @error('support_advantage')
                        <small><strong>{{ $message }}</strong></small>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="stability_advantage">Stability Advantage</label>
                        <textarea
                            name="stability_advantage"
                            id="stability_advantage"
                            rows="10"
                            class="form-control editor-plugin @error('stability_advantage') is-invalid border-danger @enderror"
                        >{{ $stabilityAdvantage }}</textarea>
                        @error('stability_advantage')
                        <small><strong>{{ $message }}</strong></small>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-2">
                    <input
                        type="submit"
                        class="btn btn-primary d-block w-100"
                        value="Save"
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
