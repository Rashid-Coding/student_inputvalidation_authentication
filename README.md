# student_inputvalidation_authentication
SEM2 INFO 4345 WEB APPLICATION SECURITY_ASSINGMENT2

1. When open the login.php page, it will require you to fill in Student ID and password.
2. If you not sign up yet, please do so by clicking the Sign Up button there. This is register.php page
3. Insert your Student ID, email, password and confirm password. Then, the page will bring you back to login page.
4. If you are succesffully login, you will prompt to home.php page. If you failed, the system will show that student ID or password is not in database or not match.
5. Then, fill in the student details and submit (submit.php). ValidateInput.js will remind if there is error in Name when the student fill in the Name that not according to pattern.
6. If you click logout at home.php page, the system will bring you back to login page. If you want to return back to homepage, you need to login first. Otherwise, the system will block from doing so. 


#server.php is coding that related with database. It is to check either the user is exist or not, hash the email and password
#product.php is coding that connect the code with database
#errors.php help the developer when the errors occured
