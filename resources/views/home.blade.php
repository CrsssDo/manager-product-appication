@extends('main')

@section('content')
    <!-- Product -->
    <section class="bg0 p-t-23 p-b-140">
        <div class="container">
            <div class="p-b-10">
                <h3 class="ltext-103 cl5">
                    Product Overview
                </h3>
            </div>

            <div class="flex-w flex-sb-m p-b-52">
                <div class="flex-w flex-c-m m-tb-10">
                    <div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
                        <i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
                        <i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                        Filter
                    </div>
                </div>

                <!-- Filter -->
                <div class="dis-none panel-filter w-full p-t-10">

                    <div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
                            <div class="filter-col1 p-r-15 p-b-27">

                                <form id="form_order" method="GET">

                                    <div class="mtext-102 cl2 p-b-15">
                                        <label> Sort By</label>
                                        <select name="sort" id="sort">
                                            <option value="price_up">Giá tăng dần</option>
                                            <option value="price_down">Giá giảm dần</option>
                                        </select>

                                    </div>

                                    <div class="col-2">
                                        <button type="submit" class="btn btn-primary">
                                            Tìm kiếm
                                        </button>
                                    </div>

                                </form>
                            </div>

                    </div>
                </div>
            </div>


            <div id="loadProduct">
                @include('app.product.list')
            </div>

        </div>
    </section>
@endsection


@push('scripts')
    <script>
        $(function(){
            $('.sort').change(function(){
                $("form_order").submit();
            })
        })
    </script>
@endpush

