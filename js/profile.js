$(document).ready(function () {
    $("#articles").click(function () {
        $(".bigArticles").show();
        $(".lists").hide();
        $(".followers").hide();
        $(".following").hide();

        $("#articles").addClass("active");
        $("#articles").removeClass("inactive");

        $("#lists").removeClass("active");
        $("#lists").addClass("inactive");

        $("#followers").removeClass("active");
        $("#followers").addClass("inactive");

        $("#following").removeClass("active");
        $("#following").addClass("inactive");
    });

    $("#lists").click(function () {
        $(".bigArticles").hide();
        $(".lists").show();
        $(".followers").hide();
        $(".following").hide();

        $("#articles").removeClass("active");
        $("#articles").addClass("inactive");

        $("#lists").addClass("active");
        $("#lists").removeClass("inactive");

        $("#followers").removeClass("active");
        $("#followers").addClass("inactive");

        $("#following").removeClass("active");
        $("#following").addClass("inactive");
    });

    $("#followers").click(function () {
        console.log("followers");
        $(".bigArticles").hide();
        $(".lists").hide();
        $(".followers").show();
        $(".following").hide();

        $("#articles").removeClass("active");
        $("#articles").addClass("inactive");

        $("#lists").removeClass("active");
        $("#lists").addClass("inactive");

        $("#followers").addClass("active");
        $("#followers").removeClass("inactive");

        $("#following").removeClass("active");
        $("#following").addClass("inactive");
    });

    $("#following").click(function () {
        console.log("following");
        $(".bigArticles").hide();
        $(".lists").hide();
        $(".followers").hide();
        $(".following").show();

        $("#articles").removeClass("active");
        $("#articles").addClass("inactive");

        $("#lists").removeClass("active");
        $("#lists").addClass("inactive");
        
        $("#followers").removeClass("active");
        $("#followers").addClass("inactive");

        $("#following").addClass("active");
        $("#following").removeClass("inactive");
    });

});
