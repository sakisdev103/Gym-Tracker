$(document).ready(function(){

    //Login Page

    $("#login-btn").click(function(){
        $(".sign-up").hide();
        $(".login").toggle("");
    });

    $("#sign-btn").click(function(){
        $(".login").hide();
        $(".sign-up").toggle("");
    });

    $("#loginForm").submit(function(e){
        e.preventDefault();
        $.ajax({
            url: './actions/login_form.php',
            method: 'POST',
            data: $(this).serialize(),
            error: err=>{
                console.log(err);
            },
            dataType: 'json',
            cache: false,
            success: function(data){
                resp = $.parseJSON(data.response);
                if(resp == 1) {
                    $("#login-form").text('Loggin in...');
                    setTimeout(function(){window.location.replace("./index.php")}, 1000);
                }else if(resp == 0){
                    alert("Account does not exist.");
                    setTimeout(function(){window.location.reload()}, 1000);
                } else{
                    alert("Wrong Password");
                    setTimeout(function(){window.location.reload()}, 1000);
                }
            }
        });
        this.reset();
    });

    $("#signUp").submit(function(e){
        e.preventDefault();
        let email = $("#form-email").val();
        let password = $("#form-password").val();
        let submit = $(".submit-form").val();
        $.ajax({
            url: './actions/create_Account.php',
            type: 'POST',
            method: 'POST',
            data: {
                email: email,
                password: password,
                submit: submit
            },
            success: function(resp){ 
                resp = $.parseJSON(resp);
                if(resp === 1){
                    $(".form-message").show().text('User Created Successfully!').addClass("form-success"); 
                    setTimeout(function(){ $(".form-message").fadeOut(); },1000);
                    setTimeout(function(){window.location.reload()},2000);
                }else{
                    $(".form-message").show().text('Email already exists').addClass("form-error"); 
                    setTimeout(function(){ $(".form-message").fadeOut(); },1000);
                    setTimeout(function(){window.location.reload()},2000);
                }
            },
            error: function(){
                $(".form-message").text('Something went wrong.').addClass("form-error");
                setTimeout(function(){ $(".form-message").hide(); $(".modal").fadeOut },2000);
            }
        });
        this.reset();
    });

    $("#logOut").click(function(){
        $.ajax({
            url: './actions/logout.php',
            method: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            cache: false,
            error: err=>{
                console.log(err);
            },
            success: function(data){
                resp = data;
                if(resp == 1) {
                    alert("Successfully logged out!");
                    setTimeout(function(){window.location.replace('./login.php');});
                }else {
                    alert("Failed to log out");
                    setTimeout(function(){window.location.reload();})
                }
            }
        });
    });

    
    //Dom Manipulation

    $("#newExercise").click(function(){
        $("#workoutContainer").hide("");
        $("#modalNew").show("");
    });

    $("#newWorkout").click(function(){
        $("#workoutContainer").show("");
        $("#date").hide("");
        $(".right").hide("");
    });

    $(".close").click(function(){
        $(".modal").hide("");
        $("#date").show("");
        $(".right").show("");
        setTimeout(function(){location.reload()}, 0500);
    });

    //Add Workout

    $(".display-selected-category").submit(function(e){
        e.preventDefault();
        $.ajax({
            url: './actions/selected_category.php',
            method: 'POST',
            data: $(this).serialize(),
            error:err=>{
                console.log(err)
            }, 
            success: function(data){
                $(".select-workout").hide("");
                $(".display-selected-exercises-container").html(data);
            }
        });

    });


    $(".input-workout").submit(function(e){
        e.preventDefault();
        $.ajax({
            url: './actions/workout.php',
            method: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            cache: false,
            error:err=>{
                console.log(err)
            }, 
            success: function(data){
                resp = $.parseJSON(data);
                if(resp == 1){
                    $(".modal").hide("");
                    setTimeout(function(){$(".alerts").show().text("Workout added successfully").addClass("form-success")}, 1000);
                    setTimeout(function(){$(".alerts").hide("")}, 2000);
                    setTimeout(function(){location.reload()}, 3000);
                }
            }
        });
        this.reset();
    });

    //New exercise

    $("#add-exercise-form").submit(function(e){
        e.preventDefault();
        $.ajax({
            url: './actions/add_exercise.php',
            method: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            cache: false,
            error:err=>{
                console.log(err)
            },    
            success: function(data){
                resp = $.parseJSON(data);
                if(resp == 1){
                    $(".modal").hide("");
                    setTimeout(function(){$(".alerts").show().text("Exercise added successfully").addClass("form-success")}, 1000);
                    setTimeout(function(){$(".alerts").hide("")}, 2000);
                    setTimeout(function(){location.reload()}, 3000);
                }else{
                    $(".modal").hide("");
                    setTimeout(function(){$(".alerts").show().text("Failed to add exercise").addClass("form-error")}, 1000);
                    setTimeout(function(){$(".alerts").hide("")}, 2000);
                }
            }
        });
        this.reset();
    })

    //Date

    setInterval(function(){$("#onLoadClick").click()}, 0000);

    $("#date").submit(function(e){
        e.preventDefault();
        $.ajax({
           url: './actions/date.php',
           method: 'POST',
           data: $(this).serialize(),
           error:err=>{
                console.log(err)
           },  
           success: function(data){
                $("#workout").html(data);
           }
        });
    });

});    