<?php
//defined a few routes "url"=>"controller,method"
$this->addRoute('', 'Home,index');

$this->addRoute('Customer/', 'Customer,index');
$this->addRoute('Customer/register', 'Customer,register');
$this->addRoute('Customer/login', 'Customer,login');
$this->addRoute('Customer/logout', 'Customer,logout');
$this->addRoute('Customer/update', 'Customer,update');
$this->addRoute('Customer/delete', 'Customer,delete');

$this->addRoute('Booking/create', 'Booking,create');
$this->addRoute('Booking/complete/{bookingID}', 'Booking,complete');
$this->addRoute('Booking/delete/{bookingID}', 'Booking,delete');
$this->addRoute('Booking/modify/{bookingID}', 'Booking,modify');

$this->addRoute('Reviews/', 'Reviews,index');
$this->addRoute('Reviews/create', 'Reviews,create');
$this->addRoute('Reviews/delete/{reviewID}', 'Reviews,delete');
$this->addRoute('Reviews/edit/{reviewID}', 'Reviews,edit');

$this->addRoute('Admin/', 'Admin,index');
$this->addRoute('Admin/modify/{bookingID}', 'Admin,modify');
$this->addRoute('Admin/delete/{bookingID}', 'Admin,delete');
$this->addRoute('Admin/login', 'Admin,login');

<<<<<<< HEAD
$this->addRoute('Payment/create', 'Payment,create');
=======
$this->addRoute('About_Us/','About_Us,index');
>>>>>>> 1be2952de32e5663c3274ed67ec1fcb41ce55296
