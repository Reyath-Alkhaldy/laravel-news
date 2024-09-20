@extends('dashboard.layouts.layout')

@section('main')
    <div class="container-fluid">

        <div class="animated fadeIn">
            <form action="{{ route('dashboard.settings.update', $settings) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            {{ __('words.settings') }}
                        </div>
                        <div class="card-body">
                            <div class="card-block">


                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="logo">{{ __('words.logo') }}</label>
                                        <img src="{{ asset($settings->logo) }}" class="img-thumbnail "   alt="logo" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="favicon">{{ __('words.favicon') }}</label>
                                        <img src="{{ asset($settings->favicon) }}" class="img-thumbnail rounded-circle" alt="favicon" />

                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="logo">{{ __('words.logo') }}</label>
                                        <input type="file" class="form-control" name="logo" id="logo" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="favicon">{{ __('words.favicon') }}</label>
                                        <input type="file" class="form-control" name="favicon" id="favicon" />
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="instagram">instagram</label>
                                        <input type="text" class="form-control" name="instagram" id="instagram"
                                            placeholder="instagram" value="{{ $settings->instagram }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="facebook">facebook</label>
                                        <input type="text" class="form-control" name="facebook" id="facebook"
                                            placeholder="facebook" value="{{ $settings->facebook }}">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" name="email" id="email"
                                            placeholder="Email" value="{{ $settings->email }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="phone">phone</label>
                                        <input type="text" class="form-control" name="phone" id="phone"
                                            placeholder="phone" value="{{ $settings->phone }}">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>


                    <div class="card">
                        <div class="card-header">
                            {{ __('words.translations') }}
                        </div>
                        <div class="card-body">
                            <div class="card-block">

                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    @foreach (config('translatable.languages') as $key => $lang)
                                        <li class="nav-item">
                                            <a class="nav-link @if ($loop->index == 0) active @endif"
                                                id="home-tab" data-toggle="tab" href="#{{ $key }}"
                                                aria-controls="home" role="tab"
                                                aria-selected="true">{{ $lang }}</a>
                                        </li>
                                    @endforeach

                                </ul>

                                <dev class="tab-content" id="myTabContent">

                                    @foreach (config('translatable.languages') as $key => $lang)
                                        <div class="tab-pane fade  @if ($loop->index == 0) show active in @endif"
                                            id="{{ $key }}" role="tabpanel" aria-labelledby="home-tab">
                                            <br>

                                            <div class="form-group col-md-12">
                                                <label for="title"> {{ $lang }}</label>
                                                <input type="text" class="form-control"
                                                    name="{{ $key }}[title]" id="title"
                                                    placeholder="{{ $lang }}"
                                                    value="{{ $settings->translate($key)->title }}">
                                            </div>

                                            <div class="form-group col-md-12">
                                                <label for="content">{{ __('words.content') }}</label>
                                                <textarea type="text" class="form-control" name="{{ $key }}[content]" id="content"
                                                    placeholder="{{ $lang }}">{{ $settings->translate($key)->content }} </textarea>
                                            </div>

                                            <div class="form-group col-md-12">
                                                <label for="address">{{ __('words.address') }}</label>
                                                <input type="text" class="form-control"
                                                    name="{{ $key }}[address]" id="address"
                                                    placeholder="{{ $lang }}" value="{{ $settings->translate($key)->address }}">
                                            </div>

                                        </div>
                                    @endforeach
                                </dev>

                            </div>

                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-sm btn-primary">
                            <i class="fa fa-dot-circle-o"> </i>
                            submit
                        </button>
                        <button type="reset" class="btn btn-sm btn-danger">
                            <i class="fa fa-dot-circle-o"> </i>
                            reset
                        </button>
                    </div>





                </div>
                <!--/row-->
            </form>

        </div>

    </div>
    <!--/.container-fluid-->
    <!-- Bootstrap CSS -->
    {{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet"> --}}

    {{-- <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> --}}
@endsection
