$(document).ready(function () {
    // When a user clicks on an article, get the article id (in a hidden paragraph) and send it to the article.php page as a post request
    $(".article").on("click", function () {
        const articleId = $(this).find(".id").text();

        // Create a form dynamically and submit it with the POST data
        const form = $("<form>")
            .attr("method", "post")
            .attr("action", "article.php")
            .append($("<input>")
                .attr("type", "hidden")
                .attr("name", "id")
                .val(articleId));

        $("body").append(form);
        form.submit();
    });

    $("#profile-pic").on("click", function () {

        //User id is in the div profilePicture in a hidden input with id userID
        const userID = $("#userID").val();

        const form = $("<form>")
            .attr("method", "post")
            .attr("action", "profile.php")
            .append($("<input>")
                .attr("type", "hidden")
                .attr("name", "userID")
                .val(userID));

        $("body").append(form);
        form.submit();
    });
});
