$(document).ready(function () {
    $('#form').validate({
        rules:{
            username:{
                required:true,
                minlength:4
            },
            password:{
                required:true,
                minlength:5
            },
            confirm_password:{
                required:true,
                minlength:5,
                equalTo:'#password'
            },
            topic:{
                required:'#newsletter:checked',
                minlength:2
            },
            agree:"required"
        },
        messages:{
            username:{
                required:"Please Enter Your Name",
                minlength:"Name must be at least four characters"
            },
            password:{
                required:"Please provide a password",
                minlength:"Enter at least five characters"
            },
            confirm_password:{
                required:"Please Enter same password again",
                minlength:"Password must be at least five characters",
                equalTo:"Please Enter the same Password"
            },
            agree:{
                required:"Please accept our policies."
            }
        },
        tooltip_options: {
            username: {
                trigger: 'focus'
            },
            password: {
                trigger: 'focus'
            },
            confirm_password: {
                placement: 'right',
                html: true
            }
        }
    });
});