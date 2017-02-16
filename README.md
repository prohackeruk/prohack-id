prohack-id is a lightweight PHP-based identity service designed to be plugged into web apps in order to save myself (and possibly you!) the time involved.

DATABASE DETAILS: HIGHLY IMPORTANT, PLEASE READ
-----------------------------------------------
This is the whole README. It's not very long, and reading it could save you time bughunting if you don't set your database table up correctly.

This ID service requires a database to function.
If you look in database.php, you can change the connection details to hook up to your database.
You can change the name of your users table here, but it AT LEAST needs to have id, email, and password. You could theoretically go and change these throughout the code if you already set a table up with different names, or you could edit your table to use the names this service does. However, both of these introduce the possibility of breakage, so I HIGHLY RECOMMEND that you set things up as described here.
If you want to add additional data about your users (first name, last name, address, subscription type etc.), then you could add them to the table this service uses without breaking anything. However, for peace of mind, I generally prefer to make another table called 'userProfile' or something, and use the email as a foreign key to prevent your tables from being too unfocused. This service DOES ensure that multiple accounts can't be signed up for using the same email address, so your email addresses WILL be unique and are therefore safe to use as foreign keys.
Any changes you make to the code that break duplicate email checking are your responsibility, so be careful!