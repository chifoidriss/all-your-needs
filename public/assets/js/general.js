$(document).ready(function () {
    bsCustomFileInput.init();
    
    $('.call-to-action-form').click(function (e) {
        e.preventDefault();
        $(this).next('form').trigger('submit');
    });
    
    $('.btn-search-input').click(function (e) {
        e.preventDefault();
        $('#search-block').toggleClass('d-none');
    });
})

function intTelInput(input) {
    return window.intlTelInput(input, {
        //   allowDropdown: false,
        // autoHideDialCode: false,
        //   autoPlaceholder: "off",
        //   dropdownContainer: document.body,
        // excludeCountries: ["us"],
        formatOnDisplay: true,
        geoIpLookup: function(callback) {
            $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
                var countryCode = (resp && resp.country) ? resp.country : "";
                callback(countryCode);
            });
        },
        hiddenInput: "full_number",
        initialCountry: "cm",
        localizedCountries: { 'cm': 'Cameroon' },
        nationalMode: false,
        // onlyCountries: ['cm', 'ci', 'ug', 'gh', 'zm', 'sz', 'bj', 'cg', 'gn'],
        placeholderNumberType: "MOBILE",
        // preferredCountries: ['cn', 'jp'],
        separateDialCode: true,
        utilsScript: "/assets/plugins/intTelInput/js/utils.js",
    });
}

function validatePhoneNumber(formElement, inputElementById, outputElementById, isRequired) {
    var number = intTelInput(document.querySelector(inputElementById));
	
    $(inputElementById).change(function () {
        if (number.isValidNumber()) {
            $(inputElementById).addClass('is-valid');
            $(inputElementById).removeClass('is-invalid');
            $(outputElementById).val(number.getNumber());
        } else {
            // $(inputElementById).addClass('is-invalid');
            $(inputElementById).removeClass('is-valid');
        }
    });

    $(formElement).submit(function(e) {
        var required = isRequired ? isRequired : $(inputElementById).attr('required');
        
        if (required) {
            if (number.isValidNumber()) {
                $(inputElementById).addClass('is-valid');
                $(inputElementById).removeClass('is-invalid');
                $(outputElementById).val(number.getNumber());
            } else {
                $(inputElementById).addClass('is-invalid');
                $(inputElementById).removeClass('is-valid');
                return false;
            }
        } else {
            if (number.isValidNumber() || $(inputElementById).val().trim() == '') {
                $(inputElementById).addClass('is-valid');
                $(inputElementById).removeClass('is-invalid');
                $(outputElementById).val(number.getNumber());
            } else {
                $(inputElementById).addClass('is-invalid');
                $(inputElementById).removeClass('is-valid');
                return false;
            }
        }
    });
}