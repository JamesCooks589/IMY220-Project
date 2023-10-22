$(document).ready(() => {
    $("#goToProfile").click((event) => {
        //prevent the anchor tag from changing the url
        event.preventDefault();
    });

    let sent = false;

    // Function to check if an element is in view
    const isScrolledIntoView = (elem) => {
        const docViewTop = $(window).scrollTop();
        const docViewBottom = docViewTop + $(window).height();

        const elemTop = $(elem).offset().top;
        const elemBottom = elemTop + $(elem).height();

        return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
    };

    $(window).scroll(function () {
        if (isScrolledIntoView($(".userReview")) && !sent) {
            const articleId = $("#sentID").text();

            // Use AJAX to send the POST request
            $.ajax({
                type: "POST",
                url: "article.php",
                data: { id: articleId, read: true },
                success: function (response) {
                    // Handle the response here if needed
                    console.log("POST request successful");
                },
                error: function (xhr, status, error) {
                    // Handle errors here
                    console.error("POST request failed: " + error);
                }
            });

            sent = true;
        }
    });

        
});
