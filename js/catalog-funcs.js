// Custom Currency Stuff

var currencyInput = document.querySelector('input[type="currency"]')
var currency = 'USD'
onBlur({
    target: currencyInput
})
currencyInput.addEventListener('focus', onFocus)
currencyInput.addEventListener('blur', onBlur)
function localStringToNumber(s) {
    return Number(String(s).replace(/[^0-9.-]+/g, ""))
}
function onFocus(e) {
    var value = e.target.value;
    e.target.value = value ? localStringToNumber(value) : ''
}
function onBlur(e) {
    var value = e.target.value
    var options = {
        maximumFractionDigits: 2,
        currency: currency,
        style: "currency",
        currencyDisplay: "symbol"
    }
    e.target.value = value ?
        localStringToNumber(value).toLocaleString(undefined, options) :
        ''
}

// Custom popup

function functionAlert(msg, myYes) {
    var confirmBox = $("#confirm");
    confirmBox.find(".message").text(msg);
    confirmBox.find(".yes").unbind().click(function() {
        confirmBox.hide();
    });
    confirmBox.find(".yes").click(myYes);
    confirmBox.show();
}

// Input form validation

function validateInput() {
    pname = document.getElementById('product_title');
    select = document.getElementById('product_category');
    supplier = document.getElementById('product_supplier');
    price = document.getElementById('product_price');
    if (pname.value == "") {
        functionAlert("Please provide a product name!");
        return false;
   }
    else if (select.value == "") {
        functionAlert("Please select a product category!");
        return false;
    }
    else if (supplier.value == "") {
        functionAlert("Please provide the product supplier!");
        return false;
    }
    else if (price.value == "$0.00") {
        functionAlert("Please provide the product price!");
        return false;
    }
    else { return true; }
}

function validateModify() {
    dbItemSelect = document.getElementById('dbItemSelect');
    if (dbItemSelect.value == "default") {
        functionAlert("Please select an item!");
        return false;
    }
    else { return true; }
}

