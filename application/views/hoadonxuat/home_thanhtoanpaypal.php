<div id="pl"></div>

<script>
    $(document).ready( function () {
        paypal.Buttons({
            createOrder: function(data, actions) {
            // This function sets up the details of the transaction, including the amount and line item details.
            return actions.order.create({
                purchase_units: [{
                amount: {
                    value: '<?=$data['TongTien']*0.000044?>'
                }
                }]
            });
            },
            onApprove: function(data, actions) {
            // This function captures the funds from the transaction.
            return actions.order.capture().then(function(details) {
                // This function shows a transaction success message to your buyer.
                $.post("ajax.php?controller=choadonxuat&action=xacnhanthanhtoanpaypal", {
                    "IDHoaDonPayPal" : details.id,
                    "Intent" : details.intent,
                    "Status" : details.status,
                    "Amount" : details.purchase_units[0]["amount"].value,
                    "CurrencyCode" : details.purchase_units[0]["amount"].currency_code,
                    "MerchantId" : details.purchase_units[0]["payee"].merchant_id,
                    "PayeeEmail" : details.purchase_units[0]["payee"].email_address,
                    "PayerId" : details.payer.payer_id,
                    "PayerName" : details.payer.name.given_name,
                    "AddressLine1" : details.purchase_units[0]["shipping"].address.address_line_1,
                    "AddressLine2" : details.purchase_units[0]["shipping"].address.address_line_2,
                    "AdminArea2" : details.purchase_units[0]["shipping"].address.admin_area_2,
                    "AdminArea1" : details.purchase_units[0]["shipping"].address.admin_area_1,
                    "PostalCode" : details.purchase_units[0]["shipping"].address.postal_code,
                    "CountryCode" : details.purchase_units[0]["shipping"].address.postal_code,
                    "PayerEmail" : details.payer.email_address,
                    "CreateTime" : details.create_time
                },function(data){
                    $("#detail-sanpham").html(data);
                });
            });
            }
        }).render('#pl');
    } );
</script>