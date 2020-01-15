$('form').validate({
    rules: {
        username: "required",
        password: "required",
    },
    messages: {
        username: "Please enter your username",
        password: "Please enter your password",
    },
    submitHandler: function (form) {
        form.submit();
    }
});