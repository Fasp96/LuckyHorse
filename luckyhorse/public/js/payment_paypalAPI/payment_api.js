//CREDENTIALS
//Email id: sb-478xtc824994@personal.example.com
//Password: ACR20202020

paypal.Buttons({
    createOrder: function(data, actions) {
        // This function sets up the details of the transaction, including the amount and line item details.
        return actions.order.create({
            purchase_units: [{
                amount: {
                    value: document.getElementById("add_balance").value
                }
            }]
        });
    },
    onApprove: function(data, actions) {
        //post the form with balace affter aprovement
        $("#add_balance_form").submit();
    }
}).render('#paypal-button-container');
    //This function displays Smart Payment Buttons on your web page.
