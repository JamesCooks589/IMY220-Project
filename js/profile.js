//James Cooks u21654680
//When document is ready
$(document).ready(function () {
    //When user clicks button with id lists change its class "inactive" to "active" and change the class of the button with id "articles" to "inactive"
    $("#lists").click(function () {
        //If one of the classes of the button with id "lists" is "inactive"
        if ($("#lists").hasClass("inactive")) {
            //Change the class of the button with id "lists" to "active"
            $("#lists").removeClass("inactive").addClass("active");
            //Change the class of the button with id "articles" to "inactive"
            $("#articles").removeClass("active").addClass("inactive");
            //Show the div with class "lists"
            $(".lists").show();
            //Hide the div with class "bigArticles"
            $(".bigArticles").hide();
        }
    }
    );
    //When user clicks button with id articles change its class "inactive" to "active" and change the class of the button with id "lists" to "inactive"
    $("#articles").click(function () {
        //If one of the classes of the button with id "articles" is "inactive"
        if ($("#articles").hasClass("inactive")) {
            //Change the class of the button with id "articles" to "active"
            $("#articles").removeClass("inactive").addClass("active");
            //Change the class of the button with id "lists" to "inactive"
            $("#lists").removeClass("active").addClass("inactive");
            //Show the div with class "bigArticles"
            $(".bigArticles").show();
            //Hide the div with class "lists"
            $(".lists").hide();
        }
    }
    );

});
