PhoneBook project in PHP

=> main file :- home.php //To run the project
    ->Execution process
        ->Open xamp cotroll
        ->Start Appache and press admin
        ->Start MySql and press admin
        ->In Browser enter localhost:rentomojo/
        ->Then it will open home.php (Home page)

=>Home page
    -> It displays
        ->Search bar //Search for names
        ->Below search bar, whatever contacts is there in database it displays in "Alphabetical order".
        ->Click on any name box. It displays all details of that user. //This done by using "JQery"
        ->In all details we provide "Edit" and "Remove" options. Therefore user can edit and remove his/her details.
    ->You can see "+" symbol at the right bottom. Press it and the button connect to add-contact.php.

=>Add new contact page
    ->It displays
        ->you can see a form for entering the details of user.
        ->All PHP validations are done for this form.
        ->Add new contact will have name and at least one mobile number as a required field
        ->Users can add multiple phone numbers and email IDs by clicking on the plus button
        ->In case user entered a already existed mobile number then browser will not that number and diplay the Validation error
        ->Save button should be clickable only when all required input fields have been filled
        ->At last save button will be used to store the data

=>Edit contact page
    ->It displays
        ->you can see a form with already what user entered in add-contact page.
        ->Whatever validations are used in add-contact.php page here also same validations added
        ->At last Update button will be used to update and store the data

=>In Home page (Remove button)
    ->User can see Remove button. 
    ->After clicking Remove button, then all details of that contact are deleted on database
        and display remaining contacts.

=>Function not working in my project
    ->Search bar
    ->User can enter multiple mobile numbers and emails. 
      But the first mobile number and first email will store in database and diplay in Home page.
      And the second, third mobile numbers and emils are not stored in database.
        ->Multiple mobile numbers and emails is not working because i use "Dynamically add/remove text-fields in php with JQuery"
        ->By using Ajax calls we can overwrite this problem. //Important
    ->In home page multiple contact names will visible,
      and if user clicks the any contact name. Inorder to display only that contact details
      It will display all contact details.
