$("#business_theme").on("show", function() {    // wire up the OK button to dismiss the modal when shown
    $("#business_theme a.btn").on("click", function(e) {
        console.log("btn Business Accoutn");   // just as an example...
        $("#business_theme").modal('hide');     // dismiss the dialog
        $("#business_profile_name").modal('show');

    });

    $("#business_profile_name a.btn").on("click", function(e) {
        console.log("button business_profile_name");   // just as an example...
        $("#business_profile_name").modal('hide');     // dismiss the dialog
        $("#section1").modal('show');     // dismiss the dialog
    });


    $("#section1 a.btn").on("click", function(e) {
        console.log("button sectino1");   // just as an example...
        $("#section1").modal('hide');     // dismiss the dialog
        $("#section2").modal('show');     // dismiss the dialog
    });

    $("#section2 a.btn").on("click", function(e) {
        console.log("button pressed");   // just as an example...
        $("#section2").modal('hide');     // dismiss the dialog
        $("#section3").modal('show');     // dismiss the dialog
    });

    $("#section3 a.btn").on("click", function(e) {
        console.log("button pressed");   // just as an example...
        $("#section3").modal('hide');     // dismiss the dialog
        $("#header_image").modal('show');     // dismiss the dialog
    });

    $("#header_image a.btn").on("click", function(e) {
        console.log("button pressed");   // just as an example...
        $("#header_image").modal('hide');     // dismiss the dialog
        $("#contact_address").modal('show');     // dismiss the dialog
    });

    $("#contact_address button.btn").on("click", function(e) {
        console.log("button pressed");   // just as an example...
        $("#contact_address").modal('hide');     // dismiss the dialog

    });

});

