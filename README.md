# Zibra Data Managment

![Logo](hospital/assets/imgs/logo.png "San Juan Mountains")


> Zibra is a web application for importing, exporting and editing data.<br>
>Its purpose is to facilitate its users to record their work data, through a simple and easy-to-use UI.<br>
>The app's release date is 14/2/2024 and it's still in beta.

<details close>
<summary>Offline Installation</summary>
<br>

1. [Download and install XAMPP](https://www.apachefriends.org/download.html)

2. Run Apache and MySQL from XAMPP Control Panel

3. [Go to http://localhost/phpmyadmin from your browser](http://localhost/phpmyadmin/)
 
4. Go to "User Accounts" and add a new user

    * Add User Account 
        * Username: your_username.
        * Host Name: localhost.
        * Password: your_password.
        * At "Global privileges" select "Check All".

5. Go to "Databases"

    * Select a name for your database.
        * *Current app name "hospital_db"*

    * Select "Create".

6. Create new table

    * Select a name for your table.
        * *Current app name "hospital_data"*

    * Select how many columns you need.
        * *Current app columns "10"*

7. Add the names and the types you will need for your entities.

    * *Current app entities:*

        * *id int(11) with A_I checked*
        * *department varchar(35)*
        * *speciality varchar(35)*
        * *phone varchar(10)*
        * *hardware varchar(35)*
        * *model varchar(35)*
        * *import_date date*
        * *note text*
        * *current_state varchar(35) Default as defined: Ανοιχτή*
        * *export_date date*

8. Your database is ready!

9. Go to your Drive:\xampp\httdocs\ and drop the app folder there

    * *Current app path: C:\xampp\htdocs\hospital*

10. Go to http://localhost/your_app_name from your browser

    * *Current app url: http://localhost/hospital/*

11. Enjoy!

</details>

<details close>
<summary>Changelog</summary>
<br>
14/2/2024 | Beta 1.0 | Changes: "Release Date"
</details>
