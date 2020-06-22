@extends('layouts.default')
@section('content')
   @if(Session::has('message'))
      <div class="alert alert-success" role="alert">
            <strong>Well done! </strong> {{ Session::get('message') }}
      </div>
   </p>
   @elseif(Session::has('error'))
      <div class="alert alert-danger" role="alert">
            <strong>Error! </strong> {{ Session::get('message') }}
      </div>
   @endif
<div class="row">
      
<div class="m-portlet m-portlet--tabs col-xl-12">
   <div class="m-portlet__head">
      <div class="m-portlet__head-tools">
         <div class="row align-items-center">
					<div class="col-lg-6 m--valign-middle" style="text-align: left;">
						List of orders
					</div>
					<div class="col-lg-6 m--align-right">
						<button type="button" class="btn btn-brand download-btn">Download</button>
					</div>
				</div>
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
                               <td class="">
                                 #
                              </td>
                              <td class="">
                                 ID
                              </td>
                              <td>
                                 Client
                              </td>
                              <td>
                                 Address
                              </td>
                              <td class="">
                                 Product
                              </td>
                              <td class="m-widget11__change">
                                 Variants
                              </td>
                              <td class="m-widget11__total m--align-right">
                                 Quantity
                              </td>
                              <td class="m-widget11__total m--align-right">
                                 Status
                              </td>
                              <td class="">
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
                            @if ( empty($order->first_name) or empty($order->phone_number) )
                                    <?php continue; ?>
                            @else
                            <tr>
                              <td>
                                 <label class="m-checkbox m-checkbox--success">
											<input type="checkbox" class="order_selector" order_id="{{ $order->order_id }}"> 
											<span></span>
								 </label>
                              </td>
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
                                       {{ $order->address }}
                                 </span>
                                 <span class="m-widget11__sub">
                                       {{ $order->city }}
                                 </span>
                              </td>
                              <td>
                                 <a href="https://wisoo.ma{{ $order->product_url }}" target="_blank"/>
                                    <span class="m-widget11__title">
                                    {{ $order->product_name }}
                                    </span>
                                 </a>
                                 <span class="m-widget11__sub">
                                    {{ $order->product_price }}
                                 </span>
                              </td>
                              <td>
                                 {{ $order->variants }}
                              </td>
                              <td>
                                {{ $order->quantity}}
                              </td>
                              <td>
                                 @if ( $order->status == 1 )
                                    <span class="m-badge m-badge--success"></span>
                                 @else
                                    <span class="m-badge m-badge--daner"></span>
                                 @endif
                              </td>
                              <td>
                                {{ $order->date }}
                              </td>
                              <td>
                                 <div class="dropdown m-dropdown--inline dropup">
                                    <button type="submit" id="builder_export" class="dropdown-toggle1 btn btn-accent m-btn m-btn--icon m-btn--wide m-btn--air m-btn--custom" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <span>
                                    <i class="la la-cog"></i>
                                    <span>Action</span>
                                    <i class="la la-angle-down m-dropdown__arrow"></i>
                                    </span>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="/order/restore/{{ $order->order_id }}"><i class="la la-reply-all"></i> Restore</a>
                                        <a class="dropdown-item" href="/order/destroy/{{ $order->order_id }}"><i class="la la-trash"></i> Drop</a>
                                    </div>
                                 </div>
                              </td>
                           </tr>
                           @endif
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

