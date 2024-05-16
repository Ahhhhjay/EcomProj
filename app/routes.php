<?php
//defined a few routes "url"=>"controller,method"
$this->addRoute('', 'Home,index');

$this->addRoute('Customer/', 'Customer,index');
$this->addRoute('Customer/register', 'Customer,register');
$this->addRoute('Customer/login', 'Customer,login');
$this->addRoute('Customer/logout', 'Customer,logout');
$this->addRoute('Customer/update', 'Customer,update');
$this->addRoute('Customer/delete', 'Customer,delete');
$this->addRoute('Customer/adminIndex', 'Customer,adminIndex');


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
$this->addRoute('Admin/customerModify/{customerID}', 'Admin,customerModify');
$this->addRoute('Admin/customerDelete/{customerID}', 'Admin,customerDelete');

$this->addRoute('Promotions/', 'Promotions,homePage');
$this->addRoute('Promotions/index', 'Promotions,index');
$this->addRoute('Promotions/create', 'Promotions,create');
$this->addRoute('Promotions/apply', 'Promotions,apply');
$this->addRoute('Promotions/modify/{promotionID}', 'Promotions,modify');
$this->addRoute('Promotions/delete/{promotionID}', 'Promotions,delete');


$this->addRoute('Payment/create', 'Payment,create');

$this->addRoute('About_Us/','About_Us,index');
