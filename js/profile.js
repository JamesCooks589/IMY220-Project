$(document).ready(function () {
    $("#articles").click(function () {
        $(".bigArticles").show();
        $(".lists").hide();
        $(".friends").hide();

        $("#articles").addClass("active");
        $("#articles").removeClass("inactive");

        $("#lists").removeClass("active");
        $("#lists").addClass("inactive");

        $("#friends").removeClass("active");
        $("#friends").addClass("inactive");

        //Call #createdArticles click event handler
        $("#createdArticles").click();
    });

    $("#createdArticles").click(function () {
        $("#createdArticles").addClass("active");
        $("#createdArticles").removeClass("inactive");

        $("#readArticles").removeClass("active");
        $("#readArticles").addClass("inactive");

        $(".createdArticles").show();
        $(".readArticles").hide();
    });

    $("#readArticles").click(function () {
        $("#createdArticles").removeClass("active");
        $("#createdArticles").addClass("inactive");

        $("#readArticles").addClass("active");
        $("#readArticles").removeClass("inactive");

        $(".createdArticles").hide();
        $(".readArticles").show();
    });

    $("#lists").click(function () {
        $(".bigArticles").hide();
        $(".lists").show();
        $(".friends").hide();

        $("#articles").removeClass("active");
        $("#articles").addClass("inactive");

        $("#lists").addClass("active");
        $("#lists").removeClass("inactive");

        $("#friends").removeClass("active");
        $("#friends").addClass("inactive");
    });

    $("#friends").click(function () {
        $(".bigArticles").hide();
        $(".lists").hide();
        $(".friends").show();

        $("#articles").removeClass("active");
        $("#articles").addClass("inactive");

        $("#lists").removeClass("active");
        $("#lists").addClass("inactive");

        $("#friends").addClass("active");
        $("#friends").removeClass("inactive");

        //Call #followers click event handler
        $("#followers").click();
    });

    $("#followers").click(function () {
        $(".followers").show();
        $(".following").hide();

        $("#followers").addClass("active");
        $("#followers").removeClass("inactive");

        $("#following").removeClass("active");
        $("#following").addClass("inactive");
    });

    $("#following").click(function () {
        $(".followers").hide();
        $(".following").show();

        $("#followers").removeClass("active");
        $("#followers").addClass("inactive");

        $("#following").addClass("active");
        $("#following").removeClass("inactive");
    });

    //List articles click event handler
    $(".article").click(function () {
        //If the article has the style of opacity 0.5, then alert the user this article has been deleted
        if ($(this).css("opacity") == 0.5) {
            alert("This article has been deleted.");
        } else {
            //Otherwise post the article id to the article page
            var articleId = $(this).find(".id").text();

            // Create a form dynamically and submit it with the POST data
            var form = $("<form>")
                .attr("method", "post")
                .attr("action", "article.php")
                .append($("<input>")
                    .attr("type", "hidden")
                    .attr("name", "id")
                    .val(articleId));

            $("body").append(form);
            form.submit();
        }
    });
    

});
