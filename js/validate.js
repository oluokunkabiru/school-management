
$().ready(function(){
  

    $(function(){
        $("#studentRegisterForm").validate({
            rules:{
                sname:{
                    required:true,
                    minlength:3
                },

                fname:{
                    required:true,
                    minlength:3
                },
                lname:{
                    required:true,
                    minlength:3
                },
                password:{
                    // password:true,
                    minlength:6,
                    required:true
                },
                repassword:{
                    // password:true,
                    required:true,
                    minlength:5,
                    equalTo:"#password"
                },
                phone:{
                    // password:true,
                    required:true,
                    minlength:8,
                },
                dob:{
                    required:true,
                    date:true,
                },
                email:{
                    // required:true,
                    email:true,
                },
                
            },
            messages:{
                    name:{
                        required:"Surname required",
                        minlength:"Name must be atleast 3 characters"
                    },
                    fname:{
                        required:"Firstname is required",
                        minlength:"Name must be atleast 3 characters"
                    },
                    phone:{
                        required:"Phone is required",
                        minlength:"Name must be atleast 8 digits"
                    },
                    dob:{
                        required:"Date of Birth is required",
                        date:"Enter valid date",
                    },
                    lname:{
                        required:"Last name required",
                        minlength:"Name must be atleast 5 characters"
                    },
                    password:{
                        required:"Password required",
                        minlength:"Your password must greater than 5 characters",
                        password:"Password must be combination of keys"
                    },
                    repassword:{
                        minlength:"Your password must greater than 5 characters",
                        equalTo:"Password Mismatched",
                        password:"password must be keys",
                        required:"password area must be filled"
                    },
                    email:{
                        required:"Email must not be empty",
                        email:"Please enter valid email address like eg@eample.com"
                    },
                    dob:{
                        required:"Date of birth is required"
                  }
            },
        })
    })
});


// staff register
$().ready(function(){
        $(function(){
            $("#staffRegisterForm").validate({
                rules:{
                    sname:{
                        required:true,
                        minlength:3
                    },
    
                    fname:{
                        required:true,
                        minlength:3
                    },
                    lname:{
                        required:true,
                        minlength:3
                    },
                    password:{
                        // password:true,
                        minlength:6,
                        required:true
                    },
                    repassword:{
                        // password:true,
                        required:true,
                        minlength:5,
                        equalTo:"#password"
                    },
                    phone:{
                        // password:true,
                        required:true,
                        minlength:8,
                    },
                    dob:{
                        required:true,
                        date:true,
                    },
                    email:{
                        // required:true,
                        email:true,
                    },
                    
                },
                messages:{
                        name:{
                            required:"Surname required",
                            minlength:"Name must be atleast 3 characters"
                        },
                        fname:{
                            required:"Firstname is required",
                            minlength:"Name must be atleast 3 characters"
                        },
                        phone:{
                            required:"Phone is required",
                            minlength:"Name must be atleast 8 digits"
                        },
                        dob:{
                            required:"Date of Birth is required",
                            date:"Enter valid date",
                        },
                        lname:{
                            required:"Last name required",
                            minlength:"Name must be atleast 5 characters"
                        },
                        password:{
                            required:"Password required",
                            minlength:"Your password must greater than 5 characters",
                            password:"Password must be combination of keys"
                        },
                        repassword:{
                            minlength:"Your password must greater than 5 characters",
                            equalTo:"Password Mismatched",
                            password:"password must be keys",
                            required:"password area must be filled"
                        },
                        email:{
                            required:"Email must not be empty",
                            email:"Please enter valid email address like eg@eample.com"
                        },
                        dob:{
                            required:"Date of birth is required"
                      }
                },
            })
        })
    });
    // admin
 $().ready(function(){
        $(function(){
            $("#adminRegisterForm").validate({
                rules:{
                    sname:{
                        required:true,
                        minlength:3
                    },
    
                    fname:{
                        required:true,
                        minlength:3
                    },
                    lname:{
                        required:true,
                        minlength:3
                    },
                    password:{
                        // password:true,
                        minlength:6,
                        required:true
                    },
                    repassword:{
                        // password:true,
                        required:true,
                        minlength:5,
                        equalTo:"#password"
                    },
                    phone:{
                        // password:true,
                        required:true,
                        minlength:8,
                    },
                    dob:{
                        required:true,
                        date:true,
                    },
                    email:{
                        // required:true,
                        email:true,
                    },
                    
                },
                messages:{
                        name:{
                            required:"Surname required",
                            minlength:"Name must be atleast 3 characters"
                        },
                        fname:{
                            required:"Firstname is required",
                            minlength:"Name must be atleast 3 characters"
                        },
                        phone:{
                            required:"Phone is required",
                            minlength:"Name must be atleast 8 digits"
                        },
                        dob:{
                            required:"Date of Birth is required",
                            date:"Enter valid date",
                        },
                        lname:{
                            required:"Last name required",
                            minlength:"Name must be atleast 5 characters"
                        },
                        password:{
                            required:"Password required",
                            minlength:"Your password must greater than 5 characters",
                            password:"Password must be combination of keys"
                        },
                        repassword:{
                            minlength:"Your password must greater than 5 characters",
                            equalTo:"Password Mismatched",
                            password:"password must be keys",
                            required:"password area must be filled"
                        },
                        email:{
                            required:"Email must not be empty",
                            email:"Please enter valid email address like eg@eample.com"
                        },
                        dob:{
                            required:"Date of birth is required"
                      }
                },
            })
        })
    });
    
 





$().ready(function(){
    $(function(){
        
        
        $("#studentLogin").validate({
            rules:{
                phone:{
                    required:true,
                    minlength:8
                },

                
                password:{
                    // password:true,
                    minlength:6,
                    required:true
                },
                
            },
            messages:{
                    phone:{
                        required:"Email or Phone Number required",
                        minlength:"Email or phone must be atleast 8 characters"
                    },
                    
                    password:{
                        required:"Password required",
                        minlength:"Your password must greater than 5 characters",
                        password:"Password must be combination of keys"
                    },
                    
            }
        })
    })
})


$('#addstaff').click(function(event){
    event.preventDefault();
$.ajax({
    type:'POST',
    url: 'newStaff.php',
    data: $('#staffRegisterForm').serialize(),
    success: function (data) {
    var result=data;
    $(".errorCreate").html(result);
    if(result=="<h2 class='text-success'>Register Successfully</h1>"){
        
        setInterval(function(){
          location.reload();
        }, 1000);
        // alert("Registered");
      }
    }
});

})
// add new student
$('#studentSignUp').click(function(event){
      event.preventDefault();
  $.ajax({
      type:'POST',
      url: '../student/SignUp.php',
      data: $('#studentRegisterForm').serialize(),
      success: function (data) {
      var result=data;
      $(".errorsignup").html(result);
      if(result=="<h2 class='text-success'>Register Successfully</h1>"){
        
        setInterval(function(){
          location.reload();
        }, 1000);
        // alert("Registered");
      }
      }
  });

  })

  // add new admin
  $('#addadmin').click(function(event){
      event.preventDefault();
  $.ajax({
      type:'POST',
      url: 'newAdmin.php',
      data: $('#adminRegisterForm').serialize(),
      success: function (data) {
      var result=data;
      $(".erroradmin").html(result);
      if(result=="<h2 class='text-success'>Register Successfully</h1>"){
        
        setInterval(function(){
          location.reload();
        }, 1000);
        // alert("Registered");
      }
      }
  });

  })

  // new faculty

  $('#addfaculty').click(function(event){
      event.preventDefault();
  $.ajax({
      type:'POST',
      url: 'newFaculty.php',
      data: $('#facultyRegisterForm').serialize(),
      success: function (data) {
      var result=data;
      $(".erroradmin").html(result);
      if(result=="<h2 class='text-success'>Register Successfully</h1>"){
        
        setInterval(function(){
          location.reload();
        }, 1000);
        // alert("Registered");
      }
      }
  });

  })

  $('#adddept').click(function(event){
      event.preventDefault();
  $.ajax({
      type:'POST',
      url: 'newdept.php',
      data: $('#deptRegisterForm').serialize(),
      success: function (data) {
      var result=data;
      $(".erroradmin").html(result);
      if(result=="<h2 class='text-success'>Register Successfully</h1>"){
        
        setInterval(function(){
          location.reload();
        }, 1000);
        // alert("Registered");
      }
      }
  });

  })


  // new course
  $('#addcourse').click(function(event){
      event.preventDefault();
  $.ajax({
      type:'POST',
      url: 'newCourse.php',
      data: $('#courseRegisterForm').serialize(),
      success: function (data) {
      var result=data;
      $(".erroradmin").html(result);
      if(result=="<h2 class='text-success'>Register Successfully</h1>"){
        
        setInterval(function(){
          location.reload();
        }, 1000);
        // alert("Registered");
      }
      }
  });

  })


   $('#studentSignUp').click(function(event){
      event.preventDefault();
  $.ajax({
      type:'POST',
      url: 'student/SignUp.php',
      data: $('#studentRegisterForm').serialize(),
      success: function (data) {
      var result=data;
      $(".errorsignup").html(result);
      if(result=="<h2 class='text-success'>Register Successfully</h1>"){
        setInterval(function(){
          location.reload();
        }, 1000);        }
      }
  });

  })