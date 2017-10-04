@extends('layouts.master')
@section('content')

    <div class="c-err">
        <div class="container">
        <!--Search Section Start-->
        <div class="row ">
            <div class="col-md-3 text-primary">  
                Въведете артикулен номер             
            </div> 
            
            {!! Form::open(['method'=>'POST', 'action' => 'ProductsController@get_product_info_by_model']) !!}
                <div class="form-group input-group col-md-6 col-md-offset-3"> 
                    {!! Form::text('model', old('model'),['class' => 'form-control', 'placeholder' => "Артикулен номер ...", 'id'=>'model']) !!}
                    <span class="input-group-btn">
                        {!! Form::submit('ТЪРСЕНЕ', ['class' => 'btn btn-primary', 'id'=>'submit-model']) !!}
                    </span>
                </div>
            {!! Form::close() !!}
            
            <div class="col-md-3">               
               ИЛИ
            </div>
        </div>
        <!--Search Section end-->
        <!--Search Section Start-->
        <div class="row">
            <div class="col-md-3">               
                Въведете име/част от името на продукт
            </div>

             {!! Form::open(['method'=>'POST', 'action' => 'ProductsController@get_product_info_by_name']) !!}
                <div class="form-group input-group col-md-6 col-md-offset-3"> 
                    {!! Form::text('name', old('name'),['class' => 'form-control', 'placeholder' => "Име на продукт ...", 'id'=>'name']) !!}
                    <span class="input-group-btn">
                        {!! Form::submit('ТЪРСЕНЕ', ['class' => 'btn btn-success', 'id'=>'submit-name']) !!}
                    </span>
                </div>
            {!! Form::close() !!}                  
        </div>
        <!--Search Section end-->
        </div>
    </div>    
    <div class="container">  
        <div class="col-md-10" id="product-info">
            
        </div>
    </div>

    <hr />
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                
                All Rights Reserved | &copy Yourdomain.com
            </div>

        </div>

    </div>

 

    <script type="text/javascript">
    var token = "{{ Session::token() }}";   
    var host = "{{URL::to('/')}}"; 

     $(document).ready(function() {
        $('#submit-name').on('click', function (e) {  
             e.preventDefault();

            var name = $('#name').val();
            $.ajax({
                type: "POST",
                url: host+'/search-product-by-name',
                data: {name:name, _token: token},
                success: function( obj ) { 
                // console.log(obj);
               drawTable(obj);
           }
            });             
        });
    });
    $(document).ready(function() {
        $('#submit-model').on('click', function (e) {  
             e.preventDefault();

            var model = $('#model').val();
            $.ajax({
                type: "POST",
                url: host+'/search-product-by-model',
                data: {model:model, _token: token},
                success: function( obj ) {
                    drawTable(obj);                 
                }
            });             
        });
    }); 
            
            function drawTable(obj){
                
                var len = obj.length,
                    tableInfo = $('<table class="table"></table>'),
                    tableRow = $('<tr class="bg-info"></tr>');
                        tableRow.append('<td> No</td>')                   
                                .append('<td> Id</td>')
                                .append('<td> модел </td>')
                                .append('<td> име </td>')
                                .append('<td> цена </td>')
                                .append('<td> количество </td>')                                              
                                .append('<td><a href="#" id="delete">x</a></td>');                                                
                    tableInfo.append(tableRow);
                
                for (var i = 0; i < len; i++){
                    tableRow = $('<tr></tr>').append('<td>'+ (i+1) +'</td>')                   
                                            .append('<td>'+ obj[i].id +'</td>')
                                            .append('<td>'+ obj[i].model +'</td>')
                                            .append('<td>'+ obj[i].name +'</td>')
                                            .append('<td>'+ obj[i].price +'</td>')
                                            .append('<td>'+ obj[i].quantity +'</td>')                                               
                                            .append('<td></td>');                                                
                    tableInfo.append(tableRow);
                }

                $('#product-info').append(tableInfo);
            }

                 
      $(document).on('click','#delete',function(e){

 e.preventDefault();

 console.log(1);

 

});
    </script>
    
    @endsection


