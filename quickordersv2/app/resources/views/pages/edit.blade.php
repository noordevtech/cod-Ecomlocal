@extends('layouts.default')
@section('content')
<div class="row">
<div class="m-portlet m-portlet--tabs col-xl-12">
   <div class="m-portlet__head">
      <div class="m-portlet__head-tools">
         <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
            <li class="nav-item m-tabs__item">
               <a class="nav-link m-tabs__link  active" data-toggle="tab" href="#m_builder_page" role="tab">
               Edit order
               </a>
            </li>
		 </ul>
		 
      </div>
   </div>
   <!--begin::Form-->
   <form class="m-form m-form--label-align-right m-form--fit" action="" method="POST">
      <div class="m-portlet__body">
         <div class="tab-content">
            <div class="tab-pane active" id="m_widget11_tab1_content">
               <!--begin::Widget 11-->
               <div class="m-widget11">
                  <div class="table-responsive">
                     <!--begin::Table-->
                     <table class="table">
                        <!--begin::Thead-->
                        <thead>
                           <tr>
                              <td class="m-widget11__label">
                                 #
                              </td>
                              <td>
                                 Client
                              </td>
                              <td class="m-widget11__app">
                                 Product
                              </td>
                              <td class="m-widget11__change">
                                 Size
                              </td>
                              <td class="m-widget11__price">
                                 Color
                              </td>
                              <td class="m-widget11__total m--align-right">
                                 Quantity
                              </td>
                              <td class="m-widget11__total m--align-right">
                                Status
                              </td>
                              <td class="m-widget11__total m--align-right">
                                Date
                              </td>
                              <td class="m-widget11__total m--align-right">
                                Actions
                              </td>
                           </tr>
                        </thead>
                        <!--end::Thead-->
                        <!--begin::Tbody-->
                        <tbody>
                            @foreach ($orders as $order)
                            <tr>
                              <td>
                                 {{ $order->order_id }}
                              </td>
                              <td>
                                 <span class="m-widget11__title">
                                       {{ $order->first_name }} {{ $order->last_name }}
                                 </span>
                                 <span class="m-widget11__sub">
                                       {{ $order->phone_number }}
                                 </span>
                                 
                              </td>
                              <td>
                                 <span class="m-widget11__title">
                                 {{ $order->product_name }}
                                 </span>
                                 <span class="m-widget11__sub">
                                    {{ $order->product_price }} DH
                                 </span>
                              </td>
                              <td>
                                 {{ $order->size }}
                              </td>
                              <td>
                                {{ $order->color }}
                              </td>
                              <td>
                                {{ $order->quantity}}
                              </td>
                              <td>
                                  Unfulfilled
                              </td>
                              <td>
                                {{ $order->date }}
                              </td>
                              <td>
                                <div class="dropdown m-dropdown--inline dropup">
                                    <button type="submit" id="builder_export" class="dropdown-toggle1 btn btn-accent m-btn m-btn--icon m-btn--wide m-btn--air m-btn--custom" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <span>
                                    <i class="la la-cog"></i>
                                    <span>Edit</span>
                                    <i class="la la-angle-down m-dropdown__arrow"></i>
                                    </span>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                       @if ( {{ $order->status == 0 }})
									   		<a class="dropdown-item" href="#"><i class="la la-download"></i> Fulfill</a>
									   @else
									   		<a class="dropdown-item" href="#"><i class="la la-download"></i> Mark as unfulfilled</a>
									   @endif
                                       <a class="dropdown-item" id="builder_export_html_static" data-demo="default" href="#"><i class="la la-download"></i> Delete</a>
                                    </div>
                                 </div>
                              </td>
                           </tr>
                           @endforeach
                        </tbody>
                        <!--end::Tbody-->
                     </table>
                     <!--end::Table-->
                  </div>
               </div>
               <!--end::Widget 11-->
            </div>
         </div>
      </div>
   </form>
   <!--end::Form-->
</div>
@stop