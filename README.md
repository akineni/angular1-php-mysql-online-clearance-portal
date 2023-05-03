# online-clearance-portal

#Angular.js (1.7.9)
#SPA
#PHP

Online Clearance Portal (OCP) is an implementation of a student (undergraduate) final year clearance where a student has to be cleared in necessary departments from the least up to the highest level in the institution. Clearance status are recorded online at the click of a button (Approve) instead of paper forms to be maintained by school and students.

A student must go through the following department to be finally cleared:
1.) Chief Security Officer   
2.) Hostel Manager   
3.) University Librarian   
4.) Head of Department    
5.) Dean of College      
6.) Academic Affairs (registry)    
7.) Dean of Student Affairs     
8.) Bursary     

Each department is identified by a unique id (integers: 1-8) and can login with their unique passwords to see approved and unapproved students. Also a smart search-filter functionality is provided to instantly search out students by any detail (name, matric number, level, email...).

Dashboard at all level also provides statistical numbers of total students, approved, unapproved, and expecting (number of students yet to reach their level)

At every APPROVAL, student's clearance level value in the database is incremented by 1 (implies next level), while at every DISAPPROVAL student clearance level value is reset to the current level.

When student completes the final level (Bursary), a notify button appears to send an EMAIL CLEARANCE FORM OF COMPLETION to that student, the email / completion clearance form has a print button to print into paper for necessary use.


* passwords: 12345678
* Turn on "less secure apps access" in your google account when using email
* Put in your email details in dashboard/send_mail.php file
