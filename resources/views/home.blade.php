@extends('layouts.master')
@section('content')
            <div class="row">
                <div class="col-md-4">
                    <div class="main-box mb-red">
                        <a href="{{ route('edit_products_quantity_prices') }}">
                            <i class="fa fa-desktop "></i>
                            <h5>Актуализиране цени и количества</h5>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="main-box mb-dull">
                        <a href="{{ route('get_product_info') }}">
                            <i class="fa fa-search" aria-hidden="true"></i>
                            <h5>Търсене на продукти</h5>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="main-box mb-pink">
                        <a href="{{ route('add_new_products') }}">
                            <i class="fa fa-cloud-upload" aria-hidden="true"></i>
                            <h5>Въвеждане на нови продукти</h5>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="main-box mb-blue">
                        <a href="#">
                            <i class="fa fa-suitcase" aria-hidden="true"></i>
                            <h5>Прекатегоризация на продукти</h5>
                        </a>
                    </div>
                </div>

            </div>
            <!-- /. ROW  -->              
        </div>
    </div>
</div>
@endsection
