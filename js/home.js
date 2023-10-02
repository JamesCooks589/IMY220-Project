$(document).ready(function () {
    // When a user clicks on an article, get the article id (in a hidden paragraph) and send it to the article.php page as a post request
    $(".article").on("click", function () {
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
    });
});
