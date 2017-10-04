@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                Добавете файл с информация
            </div>
            <div class="panel-body">                
                {!! Form::open(['route' => 'store_new_products', 'files' => true]) !!}  
                <div class="form-group">
                        <div class="">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                {!! Form::file('quantities_prices', array('class'=>'file')) !!}                                
                            </div>
                        </div>
                    </div> 
                </div>                  
                {!! Form::close() !!}   
            </div>
        </div>
    </div>
</div>

@endsection
