@extends('layouts.master')
@section('title')
    {{ trans_choice('general.email',1) }} {{ trans_choice('general.client',1) }}
@endsection
@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans_choice('general.email',1) }} {{ trans_choice('general.client',1) }}</h3>

            <div class="box-tools pull-right">
                <button onclick="window.history.back()"  class="btn btn-info btn-sm">
                    {{ trans_choice('general.cancel',1) }}
                </button>
            </div>
        </div>
        <form method="post" action="{{Request::fullurl()}}" class="form-horizontal" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="box-body">
                <div class="form-group">
                    <label for="name"
                           class="control-label col-md-3">{{trans_choice('general.campaign',1)}} {{trans_choice('general.name',1)}}</label>
                    <div class="col-md-9">
                        <input type="text" name="name" class="form-control"
                               value="{{old('name')}}"
                               required id="name">
                    </div>

                </div>

                <div class="form-group">
                    <label for="subject"
                           class="control-label col-md-3">{{trans_choice('general.email',1)}} {{trans_choice('general.subject',1)}}</label>
                    <div class="col-md-9">
                        <input type="text" name="subject" class="form-control"
                               value="{{old('subject')}}"
                               required id="subject">
                    </div>

                </div>

                <div class="form-group">
                    <label for="message"
                           class="control-label col-md-3">{{trans_choice('general.message',1)}}</label>
                    <div class="col-md-9">
                        <textarea  name="message" class="form-control tinymce"
                                    id="message">{{old('message')}}</textarea>
                    </div>
                </div>

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <div class="heading-elements">
                    <button type="submit" class="btn btn-primary pull-right">{{trans_choice('general.save',1)}}</button>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('footer-scripts')
    <script>
        $(".form-horizontal").validate({
            rules: {
                name: {
                    required: true
                },
                subject: {
                    required: true
                }
            }, highlight: function (element) {
                $(element).closest('.form-group').addClass('has-error');
            },
            unhighlight: function (element) {
                $(element).closest('.form-group').removeClass('has-error');
            },
            errorElement: 'span',
            errorClass: 'help-block',
            errorPlacement: function (error, element) {
                if (element.parent('.input-group').length) {
                    error.insertAfter(element.parent());
                } else {
                    error.insertAfter(element);
                }
            }
        });
    </script>
@endsection