@extends('layouts.public')

@section('htmlheader_title')
 {{ trans('words.new_password') }}
@endsection

@section('contentheader_title')
    {{ trans('words.new_password') }}
@endsection

@section('sidebar')
    @include('layouts.partials.frontend.menu_categories')
@endsection

@section('main-content')



    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
        {!! csrf_field() !!}

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label class="col-md-4 control-label"> {{ trans('words.email') }}</label>

            <div class="col-md-6">
                <input type="email" class="form-control" name="email" placeholder=" {{ trans('words.email') }}" value="{{ $email or old('email') }}">

                @if ($errors->has('email'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label class="col-md-4 control-label"> {{ trans('words.password') }}</label>

            <div class="col-md-6">
                <input type="password" class="form-control" placeholder=" {{ trans('words.password') }}" name="password">

                @if ($errors->has('password'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            <label class="col-md-4 control-label"> {{ trans('words.confirm_password') }}</label>
            <div class="col-md-6">
                <input type="password" class="form-control" placeholder=" {{ trans('words.confirm_password') }}"name="password_confirmation">

                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                @endif
            </div>
        </div>


        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    {{ trans('words.submit') }}
                </button>
            </div>
        </div>
    </form>




@endsection

@section('styles')
    <link href="{{ asset('/public/plugins/validation/css/formValidation.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('/public/plugins/validation/js/formValidation.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/public/plugins/validation/js/framework/bootstrap.min.js') }}"></script>


    <script type="text/javascript">
        $(function () {

            $('#registerForm').formValidation({
                framework: 'bootstrap',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {

                    email: {
                        validators: {
                            notEmpty: {
                                message: '{{ trans('validation.email_is_required') }}'
                            },

                            regexp: {
                                regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                                message: '{{ trans('validation.email_invalid') }}'
                            }
                        }
                    }


                }
            });
        });
    </script>
@endsection