<footer class="m-grid__item m-footer ">
				<div class="m-container m-container--responsive m-container--xxl m-container--full-height m-page__container">
					<div class="m-footer__wrapper">
						<div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
							<div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
								<span class="m-footer__copyright">
									2018 &copy; 
									<a href="https://wisoo.ma" class="m-link">
										Wisoo.ma
									</a>
								</span>
							</div>
						</div>
					</div>
				</div>
			</footer>
		</div>
		<script src="{{ asset('/vendors/base/vendors.bundle.js') }}" type="text/javascript"></script>
		<script src="{{ asset('/demo/demo2/base/scripts.bundle.js') }}" type="text/javascript"></script>
		<script src="{{ asset('/app/js/dashboard.js') }}" type="text/javascript"></script>
		
        		
        <script>
            jQuery(document).ready( function(){
                
                var selectedOrders = [];
                
                $('.download-btn').click( function(){
                    $("input:checked").each(function () {
                        var order_id = $(this).attr("order_id");
                        selectedOrders.push( order_id );
                    });
                    console.log(JSON.stringify( selectedOrders ));
                    var dataForm = '<form action="/order/download" method="POST" class="dataForm"><input name="_token" value="{{ csrf_token() }}"> <input type="hidden" name="orders" value="' + selectedOrders.join( ',' ) + '"></form>';
                    $(document.body).append(dataForm);
                    $('.dataform').submit();
                } );
                
                $('.delete-link').click( function(){
                    $("input:checked").each(function () {
                        var order_id = $(this).attr("order_id");
                        selectedOrders.push( order_id );
                    });
                    console.log(JSON.stringify( selectedOrders ));
                    var dataForm = '<form action="/order/bulkdelete" method="POST" class="dataForm"><input name="_token" value="{{ csrf_token() }}"> <input type="hidden" name="orders" value="' + selectedOrders.join( ',' ) + '"></form>';
                    $(document.body).append(dataForm);
                    $('.dataform').submit();
                } );
                
            } );
        </script>
	</body>
</html>