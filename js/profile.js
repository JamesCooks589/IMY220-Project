
$(document).ready(function () {
    $("#articles").click(function () {
        $(".articles").show();
        $(".lists").hide();
        $(".friends").hide();

        $("#articles").addClass("active");

        $("#lists").removeClass("active");
        $("#lists").addClass("inactive");

        $("#friends").removeClass("active");
        $("#friends").addClass("inactive");
    });

    $("#lists").click(function () {
        $(".articles").hide();
        $(".lists").show();
        $(".friends").hide();

        $("#articles").removeClass("active");
        $("#articles").addClass("inactive");

        $("#lists").addClass("active");

        $("#friends").removeClass("active");
        $("#friends").addClass("inactive");
    });

    $("#friends").click(function () {
        console.log("friends");
        $(".articles").hide();
        $(".lists").hide();
        $(".friends").show();

        $("#articles").removeClass("active");
        $("#articles").addClass("inactive");

        $("#lists").removeClass("active");
        $("#lists").addClass("inactive");
        
        $("#friends").addClass("active");
    });
});

