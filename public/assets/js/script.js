$(document).on("click", "#saveLikeDislike", function () {
    var _post = $(this).data("post");
    var _type = $(this).data("type");
    var vm = $(this);

    // Ajax run
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $.ajax({
        url: "{{ url('likesystem') }}",
        type: "POST",
        dataType: "json",
        data: {
            post: _post,
            type: _type,
        },
        beforeSend: function () {
            vm.addClass("disabled");
        },
        success: function (data) {
            console.log(data);
            if (res.bool === true) {
                vm.removeClass("disabled").addClass("active");
                vm.removeAttr("id");
                var _prevCount = $("." + _type + "-count").text();
                _prevCount++;
                $("." + _type + "-count").text(_prevCount);
            }
        },
        error: function (data, textStatus, errorThrown) {
            console.log(data);
        },
    });
});
