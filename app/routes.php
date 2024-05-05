<?php
//defined a few routes "url"=>"controller,method"
$this->addRoute('Home/index','Home,index');

$this->addRoute('Person/register','Person,register');
$this->addRoute('Person/complete_registration','Person,complete_registration');
$this->addRoute('Person/','Person,list');
$this->addRoute('Person/delete' , 'Person,delete');
$this->addRoute('Person/edit/{id}' , 'Person,edit');
$this->addRoute('Person/update' , 'Person,update');

$this->addRoute('User/register' , 'User,register');
$this->addRoute('User/login' , 'User,login');
$this->addRoute('User/logout' , 'User,logout');
$this->addRoute('User/update' , 'User,update');
$this->addRoute('User/delete' , 'User,delete');
$this->addRoute('User/securePlace' , 'Profile,index');

$this->addRoute('Profile/index' , 'Profile,index');
$this->addRoute('Profile/create' , 'Profile,create');
$this->addRoute('Profile/modify' , 'Profile,modify');
$this->addRoute('Profile/delete' , 'Profile,delete');

$this->addRoute('Friend/add/{id1}/{id2}','Friend,add');

$this->addRoute('Example/index' , 'Example,index');
$this->addRoute('Example/clock','Example,clock');
$this->addRoute('Example/passingData','Example,passingData');
$this->addRoute('Example/count','Example,count');

$this->addRoute('Customer/register' , 'Customer,register');
$this->addRoute('Customer/login' , 'Customer,login');
$this->addRoute('Customer/update' , 'Customer,update');
$this->addRoute('Customer/index' , 'Customer,index');
$this->addRoute('Customer/delete' , 'Customer,delete');

$this->addRoute('Booking/create' , 'Booking,create');
$this->addRoute('Booking/complete' , 'Booking,complete');
$this->addRoute('Booking/delete' , 'Booking,delete');
$this->addRoute('Booking/modify' , 'Booking,modify');

$this->addRoute('Reviews/index' , 'Reviews,index');
$this->addRoute('Reviews/create' , 'Reviews,create');
$this->addRoute('Reviews/delete{id}' , 'Reviews,delete');
$this->addRoute('Reviews/edit{id}' , 'Reviews,edit');

// $this->addRoute('Publication/modify/{publication_id}', 'Publication,modify');
