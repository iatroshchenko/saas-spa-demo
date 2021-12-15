# Foreword
This project is a prototype of a multi-tenant SaaS application (SPA) made with Laravel and Vue2. Vue part is built fully from scratch (even router), no pre-build templates (like laravel-vue-spa) were used. This code was written several years ago and contains minor bugs, small architecture flaws, and semantic errors. Some of the functionality may not work due to the fact that all real configurations and keys are replaced with examples. 
Credentials after initial DB seeding are the following:
usernames: admin@admin.com (superadmin), admin1@admin.com (business owner) 
password: password

To generate docs use php artisan scribe:generate
docs would be available as localhost/docs/index.html

# ExampleSaasApp    
 **ExampleSaasApp** is a SaaS platform for logistic companies to simply manage their business    
    
## Architecture and Concerns    
 This project is built with **Vue.js** as SPA on frontend and **Laravel** as an API    
    
In this project generally everything revolves around User, Shipper, Order and Load entities.     
    
- **User** describes literally users of our system. Any user can take one of the roles, described below.    
 User includes all users who interact with the system. User's interface and permissions change depending on user role.    
For example only business owner may change settings for its organization (Manager cannot)    
    
- **Shipper** describes organization, which provides logistic services.    
Shipper has an owner - User with a "Business Owner" role. This user, unlike users with another roles,    
does not directly "belong to" the Shipper (not mentioned in $shipper->users), but is mentioned as $shipper->owner (using "owner_id")    
    
- **Order** entity is currently named as **"Quote"**. Previously Quotes and Orders had been considered as separate entities, but now these mean the same. So we should do some code refactor and rename all code, working with Quotes (like QuoteRepository), replacing it with a correct Order-related option (for ex. *Quote* class -> would become *Order* class, *QuoteRepository* -> would become *OrderRepository*) 
So, the key thing to understand this - order currently has **9 statuses**, and as we navigate to Order Preview page - we see
the progress on this order
Order can be "deleted", "quote", "sent", "viewed", "approved", "paid", "assigned to load", "out for delivery", "delivered"
But cannot be actually removed - only status deleted (and then can be restored)

**When You update order status - always use these class constants:**
````php
<?php
// \App\Models\Quote.php

const STATUS_DELETED = -1;  
const STATUS_QUOTE = 0; // by default Order is a "quote" 
const STATUS_SENT = 1; // when quote email is sent to assigned client  
const STATUS_VIEWED = 2; // when client opens an email (tracking pixel used) 
const STATUS_APPROVED = 3; // when client signs a quote (Laravel temporary signed route used), but client cannot directly create an order
const STATUS_PAID = 4;  
const STATUS_ASSIGNED_TO_LOAD = 5;  
const STATUS_OUT_FOR_DELIVERY = 6;  
const STATUS_DELIVERED = 7;  

/*
On frontend - we split all Quote objects and have separately "Quotes" and "Orders"
On frontend - by "Orders" we mean "Approved Quotes"

Some of these statuses are Quote statuses - such statuses, entity is considered as "quote" with
These are: "Quote", "Sent", "Viewed", "Approved"

And the same about Order Statuses:
These are "Approved", "Paid", "Assigned to Load", "Out of Delivery", "Delivered"

So for both we have "Approved" status - so "Approved" quotes are under "Created" tab in Orders component
in Quotes component - they are under "Approved tab"


*/  

const STATUS_MAP = [  
  self::STATUS_DELETED => 'Deleted',  
 self::STATUS_QUOTE => 'Quote',  
 self::STATUS_SENT => 'Sent',  
 self::STATUS_VIEWED => 'Viewed',  
 self::STATUS_APPROVED => 'Approved',  
 self::STATUS_PAID => 'Paid',  
 self::STATUS_ASSIGNED_TO_LOAD => 'Assigned To Load',  
 self::STATUS_OUT_FOR_DELIVERY => 'Out for Delivery',  
 self::STATUS_DELIVERED => 'Delivered'  
];
````

So, The actual new quotes are currently described as Order with "quote" status.
The actual class name is "Quote", So to get all "quotes" we do 
````php
	<?php
	// getting all "quotes"
	Quote::where('status', Quote::STATUS_QUOTE)->get();
	
	// then for actual new "orders" it is 
	Quote::where('status', Quote::STATUS_APPROVED)->get();
````

After client confirms Shipper's Quote (agrees with a price to transport a vehicle) - this vehicle (and some another ones - from another orders) should be assigned to some *Car carrier trailer*, some truck, which is able to actually transport these vehicles, and complete the orders.

- **Load** entity describes this kind of truck.
Load is a couple of Orders - assigned to the driver (Load has driver_id -> User with a "Driver" role)
 Load as a Quote (an Order) belongs to client, but also has related Driver    
 (User with a "Driver" role) assigned (nullable "driver_id" field - "null" in case no driver assigned so far).    
 For better understanding the goal - Features planned to implement 
	 - realtime load position tracking and drawing it on map (along with another loads)
	 - building routes for drivers, optimally combining orders depending on orders Origins and Destinations
     
So, after understanding base concerns, it's time to consider user roles and permissions:     
    
There are following roles for User defined in the system:     
    
- Superadmin    
- Business Owner    
- Shipper Admin    
- Manager    
- Driver    
- Dispatcher    
- Client (Customer)    
    
*There is no full list of permissions so far, because requirements may change. This part of the file will be updated.*    
 So, users include staff and clients    
    
For staff we have:    
    
- **Supeadmin** has an ability to access every part of the system. This user will be granted with all permissions.    
- **Business owner** is a local superuser for controlled shipper (same as Superadmin but for a particular Shipper)    
- **Shipper Admin** - may edit managers (and inferior) data and has limited permissions (cannot directly change email for example).    
*Permissions for this role can be revised, and must be refined before the actual development of a particular feature.*  
  
- **Manager** - may edit dispatchers and drivers data and interact with clients (send email / assign quote to client / create client etc).  So, Manager can do all manager-related work    
- **Dispatcher** - interacts with Loads - can assign driver to Loads (can edit load - but not create or delete)    
*Permissions for this role can be revised, and must be refined before the actual development of a particular feature.* - **Driver** - interacts with Loads - can only view load data and put its driver notes there    
    
and for clients:    
    
- **Client** - interacts with its Loads and Quotes - granted with all permissions related to its Loads and Quotes, but cannot    
interact with staff data.    
*Permissions for this role can be revised, and must be refined before the actual development of a particular feature.* 

## Other concepts

There are some another entities (and concepts), that would be useful for you to know about :

Clients and Leads -> On frontend we also have Clients and Leads menu items in sidebar, so
This is the same entity - on backend side it is both users, we can assign a quote on -
but **"Client"** is a user with at least 1 Quote approved (1 Order)
and **"Lead"** - is a user with 0 approved quotes,  has no access to dashboard - company (Shipper) admins/managers/owners can add a Lead and send it a quote, and then, when Lead confirms the quote, it would become a Client, and get access to the dashboard by email (Credentials)

Contacts - contacts  is just a phonebook, and no more than a phonebook
   
## Project Structure   
Server:  
  
The best approach to understand the API structure is check the "routes/api.php" and "routes/web.php" files  
Main business logic is implemented using an approach, somewhat similar to Domain Driven, but Laravel-specific  
  
Most of general routes start with *shipper/{uuid}/*  
  
So far as most of logic is related to Shipper - and depends on Shipper  
so generally we have shipper/{uuid}/action - shipper-related logic  
  
and everything else -> *shipper/{uuid}/{domain}/{action}*   
SPA:  
  
Same for SPA: check out the "resources/js/router/index.js" file to understand main ideas  
custom Middlewares  are described in "resources/js/middleware/index.js"  

## Coding Conventions

1. Please write typed properties, types in arguments and return types  
2. Get rid of DB::query() - use eloquent Model::where()->...  
3. array() is outdated and will throw error in future PHP - use [] instead  
4. Use Dependency Injection instead of new Class() in __construct() body  
5. As we are talking about multi-tenance app - we almost always specify shipper_id in Requests which update shipper data in any way - but there is a trick: when I say shipper_id in request -> this means "uuid" - public id which we use to access shipper from frontend (for security reasons) - Check out UsesPublicUuid trait  
but when I link shipper in database -> i mean id (real id on backend side) 
So this is wrong because we link invoice by shippper uuid 
````php
<?php
// This is wrond
$data = $request->all(); // has public shipper_id (uuid)

$invoiceData = array("quote_id"=>$data["quote_id"],"shipper_id"=>$data["shipper_id"],"receipt_url"=>$charge->receipt_url,"status"=>$charge->status,"customer_id"=>$token,"payment_method_id"=>$charge->payment_method);
````
here we should find shipper  instead:
````php
<?php
/* Class InvoiceSerivce */
public function createInvoiceForShipper(Shipper $shipper) 
{
 /* Do something with Shipper $shipper */	
}


/* Class ... SomeClass */

public function __construct(ShipperRepository $shippers)
{
	$this->shippers = $shippers;
}

// This is right
$shipper = $this->shippers->findById("shipper_Id"); // and then get Shipper real id to save to db
// For ex:
$this->invoiceService->createInvoiceForShipper($shipper);

````

6. Conventions - by **$this->shippers** I mean **ShipperRepository class** - please check out the code and look at the following things: 
$this->quotes is QuoteRepository  $this->shippers is ShipperRepository
so if You work with entities - try always use repository pattern when work with large amount of changes - for small this can also be repository or $entity->update(['something' => 'new'] and then refactor when there is additional complex logic ) -  
but **don't do** DB::query(''Use raw queries only when logic is too complicated so Eloquent is really slow (most of cases it's not and currently there's no such complicated joins or smth)
7. migrations - if we need modify some field - please create another migration instead of modify existing - because 1. You are not alone here and 2. bitbucket pipeline on server works with migrate only, not with migrate:fresh. These 2 points require us to create new migrations)  
8. And the last one - Try to use objects instead of arrays when You share primitive data between methods/classes (check the **app/DTO** folder - DTO stands for Data Transfer Objects) - great example is **App\DTO\Credentials** and using it in **ClientManagement@createClientFromQuoteRequest** (read as Class@method)

## Before Publishing Your Changes
To get the full list of all available and required environment files - please check out the .env file on dev server

To make assets work properly on dev server - make sure You have these two lines in Your .env  before You build frontend using npm

APP_URL="https://dev.mydemosaasapp.com"
MIX_APP_URL="${APP_URL}"

If you build with APP_URL=localhost - dev server will try to look for "localhost" in several places,
so the project would not work as expected

To make npm see updated MIX_APP_URL, You should re-run npm run watch command (interrupt current watch and re-run)
    
## External Access

There's an iframe feature - any company working with APP - can setup our iframe on their website and get external access using
to our platform using their API key. To understand how this part of project works, check out api/v1 routes (routes/v1/api-v1.php)

To setup external api keys (to demonstrate how iframe works) - there's a database seeder - database/seeders/UserTokensSeeder.php  
    
## Local Setup
  
First of all You should know, that there is Makefile which contains some useful commands for a convenient development  
Check it out - this helps quickly setup local environment, run assets builder, or ssh to the server  
  
For docker users - check out the next section  
  
For fast local setup You'll need ***php***:  
https://laravel.com/docs/8.x/installation#server-requirements  
  
***MySQL***  
and ***NodeJs*** for assets compiling  
  
all Environment variables are mentioned in .env.example  
of course You should redefine them depending on your local setup  
  
For cookie-based authentication we use **Sanctum**  
**consider reading about it if never heard**:   
https://laravel.com/docs/8.x/sanctum  
  
> Don't forget to create **SANCTUM_STATEFUL_DOMAINS** env variable in  
> order to make authentication work properly  
  
After configuring an environment, the following commands should make things done:  
  
 composer install php artisan migrate --seed npm install npm run watch  
## Docker   
There's also a docker build for local development   
  
the fastest way to start a project - is run  
  
 make up  
  This command requires docker, docker-compose and docker-sync installed  
   
In case everything worked out successfully, switch to another tab and ssh to php-fpm container (docker build is nginx + php-fpm). *Some day we will do separate php-cli - but the time was short and there's only php-fpm*  
  
 make sh  
Like in previous section - the following commands should help You  
  
 composer install php artisan migrate --seed  
Because of docker-sync - it is better to build frontend assets on host machine - to avoid some strange undocumented mistakes  
  
On host machine run   
  
 npm install npm run watch  
If any file-permission-related issues are caused by docker-sync - ssh to fpm container and change file rights to quickly resolve the issue
