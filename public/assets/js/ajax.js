function submitForm() {
    var username = $("input[name=username]").val();
    var message = $("textarea[name=message]").val();
    var id = $("input[name=post_id]").val();
    var _token = $('meta[name="csrf-token"]').attr("content");

    $.ajax({
        url: "/news/" + id,
        type: "POST",
        data: {
            post_id: id,
            username: username,
            message: message,
            _token: _token,
        },
        success: function (response) {
            if (response.code == 200) {
                $("#username").html(response.data.username);
                $("#comment-message").html(response.data.message);
                // $("#comment-date").html(response.data.title);
                $("#CommentForm")[0].reset();
            }
        },
        error: function (response) {
            console.log(response.responseJSON.errors);
            $("#nameError").text(response.responseJSON.errors.name);
            $("#emailError").text(response.responseJSON.errors.email);
        },
    });
}
