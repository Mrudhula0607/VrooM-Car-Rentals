--
-- Database: `VrooM`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

create table if not exists admin_table
(
	id int unique not null auto_increment, 
	username varchar(30) primary key,
	password varchar(100) not null,
	creation_time timestamp default current_timestamp
);

insert into admin_table (username,password) values ('varsha','304ef52e15ec2bfd3718c61317bf0efa');
insert into admin_table (username,password) values ('mrudhula','304ef52e15ec2bfd3718c61317bf0efa');

--
-- Table structure for table `user_table`
--
create table if not exists user_table
(
	userID integer primary key AUTO_INCREMENT,
	username varchar(30) unique not null,
	password varchar(100) not null,
	email varchar(30)unique not null,
	phone_number bigint not null,
	address varchar(100) ,
	state varchar(40),
	creation_time timestamp default current_timestamp
);

insert into user_table values(1,'Ajay','81b28d909b5aee97c758ca0663fabe0e','aj19@gmail.com',9765413754,'No 14,adyar,chennai-6','Tamil Nadu',CURRENT_TIMESTAMP);
insert into user_table values(2,'Diya','16b7cee2c2cd7b28909384e88028cace','diya.ramesh@gmail.com',9856432109,'plot no 3,guindy,chennai-42','Tamil Nadu',CURRENT_TIMESTAMP);
insert into user_table values(3,'Gokul','e72b0802d77f8c2efc232cf0462b96ed','gok@gmail.com',8928665403,'plot no 14,nugngambakkam,chennai-24','Tamil Nadu',CURRENT_TIMESTAMP);
insert into user_table values(4,'Mahitha','e72b0802d77f8c2efc232cf0462b96ed','mahivj@gmail.com',9245789203,'No 8,kilpauk,chennai-67','Tamil Nadu',CURRENT_TIMESTAMP);
insert into user_table values(5,'Vedh','bbb32973e3e26ae5431d1dd2de7ad3f6','ved33@gmail.com',9887665442,'No 6,velacherry,chennai-54','Tamil Nadu',CURRENT_TIMESTAMP);


--
-- Table structure for table `brand`
--
create table if not exists brand
(
	brandID integer primary key AUTO_INCREMENT ,
	brand_name varchar(20) unique not null,
	creation_time timestamp default current_timestamp
);

insert into brand(brand_name) values ('Audi');
insert into brand(brand_name) values ('BMW');
insert into brand(brand_name) values ('Maruti Suzuki');
insert into brand(brand_name) values ('Hyundai');
insert into brand(brand_name) values ('Skoda');
insert into brand(brand_name) values ('Ford');
insert into brand(brand_name) values ('Toyota');
insert into brand(brand_name) values ('Mahindra');
insert into brand(brand_name) values ('Tata');

--
-- Table structure for table `vehicle_data`
--
create table if not exists vehicle_data
(
	vehicleID integer primary key auto_increment,
	name varchar(20) not null,
	brand integer references brand(brandID),
	overview longtext,
	price_per_day integer not null,
	fuel varchar(15),
	model_year integer,
	image1 longblob default NULL,
	image2 longblob default NULL,
	seating_capacity boolean default NULL,
	air_conditioner boolean default NULL,
	powerdoor_lock boolean default NULL,
	antibreaklocking_system boolean default NULL,
	breakassit boolean default NULL,
	power_steering boolean default NULL,
	air_bag boolean default NULL,
	power_window boolean default NULL,
	music_player boolean default NULL,
	crash_sensor boolean default NULL ,
	leather_seats boolean default NULL,
	central_locking boolean default NULL,
	registration_time timestamp default current_timestamp
);

--
-- Table structure for table `booking_details`
--
create table if not exists booking_details
(
	bookingID integer primary key auto_increment,
	vehicle_ID varchar(10) references vehicle_data(vehicleID),
	email_id varchar(30) references user_table(email),
	phone bigint references user_table(phone_number),
	from_date date not null,
	to_date date not null,
	number_of_days int default NULL,
	cost int default NULL,
	position varchar(20) default 'Pending',
	posting_date timestamp default current_timestamp
);

--
-- Table structure for table `contact_us`
--
create table contact_us
( id integer primary key AUTO_INCREMENT,
  name varchar(20),
  email varchar(30),
  phone integer,
  message varchar(200),
 );

-- --------------------------------------------------------
--
-- Procedures for table 'admin table'
--
delimiter $
create procedure update_password( IN temp_email varchar(30),IN new_password varchar(50))
begin
	update admin_table set password=new_password where email=temp_email;
end
$

delimiter $
create procedure create_admin(IN temp_name varchar(30),IN temp_password varchar(50),
							IN temp_email varchar(30), IN temp_phone bigint)
begin
	insert into admin_table values (temp_name,temp_password,temp_email,temp_phone,current_timestamp);
end
$

delimiter $
create procedure delete_admin(IN name varchar(30))
begin
	delete from admin_table where username=name;
end
$


--
-- Procedures for table 'user_table'
--
delimiter $
create procedure create_user(IN temp_name varchar(30),IN temp_password varchar(50),IN temp_email varchar(30),IN temp_phone bigint, IN temp_address varchar(100),IN temp_state varchar(40))
begin
	insert into user_table (username,password,email,phone_number,address,state,creation_time)values (temp_name,temp_password,temp_email,temp_phone,temp_address,temp_state,current_timestamp);
end
$
delimiter $
create procedure update_userpassword(IN temp_email varchar(30),IN new_password varchar(50), IN phone bigint)
begin
update user_table set password=new_password where email = temp_email and phone_number = phone;
end
$


delimiter $
create procedure update_usertable(IN temp_email int,IN temp_name varchar(30),IN temp_phone bigint,IN temp_dob date,IN temp_address varchar(50))
begin
	update user_table set username = temp_name, phone_number = temp_phone,dob = temp_dob,address=temp_address where email=temp_email;
end
$


delimiter $ 
create procedure delete_user(IN id integer)
begin
	delete from user_table where userID=id;
end
$

--
-- Procedures for table 'brand'
--
delimiter $
create procedure create_brand(IN brand_name varchar(20))
begin
	insert into brand(brand_name,creation_time) values(brand_name,current_timestamp());
end
$

delimiter $
create procedure update_brand(IN name1 varchar(20),IN id int)
begin
	update brand set brand_name = name1 where brandID=id;
end 
$

delimiter $
create procedure delete_brand(IN b_name varchar(20))
begin
	delete from brand where brand_name=b_name;
end
$

--
-- Procedures for table 'vehicles'
--

delimiter $
create procedure add_vehicle(
IN name varchar(20) ,
IN brand integer,
IN overview longtext,
IN price_per_day integer,
IN fuel varchar(15),
IN model_year integer,
IN image1 longblob,
IN image2 longblob,
IN seating_capacity boolean,
IN air_conditioner boolean,
IN powerdoor_lock boolean,
IN antibreaklocking_system boolean,
IN breakassit boolean,
IN power_steering boolean,
IN air_bag boolean,
IN power_window boolean,
IN music_player boolean,
IN crash_sensor boolean,
IN leather_seats boolean,
IN central_locking boolean)
begin 
	insert into vehicle_data( name ,brand ,overview,price_per_day ,fuel,model_year,image1,
	image2,seating_capacity,air_conditioner,powerdoor_lock,antibreaklocking_system ,breakassit,power_steering ,
	air_bag ,power_window,music_player,crash_sensor,leather_seats ,central_locking,registration_time ) 
	values( name ,brand ,overview,price_per_day ,fuel,model_year,image1,image2 ,
	seating_capacity,air_conditioner,powerdoor_lock,antibreaklocking_system ,breakassit,power_steering ,
	air_bag ,power_window,music_player,crash_sensor,leather_seats ,central_locking,current_timestamp );
end 
$

delimiter $
create procedure update_vehicle(IN tID integer,
IN tname varchar(20) ,
IN tbrand integer,
IN toverview longtext,
IN tprice_per_day integer,
IN tfuel varchar(15),
IN tmodel_year integer,
IN tseating_capacity boolean,
IN tair_conditioner boolean,
IN tantibreaklocking_system boolean,
IN tbreakassit boolean,
IN tpower_steering boolean,
IN tair_bag boolean,
IN tpower_window boolean,
IN tmusic_player boolean,
IN tcrash_sensor boolean,
IN tleather_seats boolean)
begin 
	update vehicle_data 
	set name = tname ,brand = tbrand ,overview = toverview ,
		price_per_day = tprice_per_day ,fuel = tfuel ,model_year = tmodel_year ,
		 seating_capacity = tseating_capacity ,air_conditioner = tair_conditioner ,
		 antibreaklocking_system = tantibreaklocking_system ,breakassit = tbreakassit ,
		 power_steering = tpower_steering , air_bag = tair_bag ,power_window = tpower_window,
		 music_player = tmusic_player ,crash_sensor = tcrash_sensor,leather_seats = tleather_seats
		  where vehicleID=tID;
end 
$

delimiter $
create procedure update_image1(IN id integer,IN new_image longblob)
begin 
	update vehicle_data set image1 = new_image where vehicleID=id;
end 
$

delimiter $
create procedure update_image2(IN id integer,IN new_image longblob)
begin 
	update vehicle_data set image2 = new_image where vehicleID=id;
end 
$

delimiter $
create procedure delete_vehicle(IN id integer)
begin 
	delete from vehicle_data where vehicleID=id;
end 
$


--
-- Procedures for table 'booking details'
--
delimiter $
create procedure insert_booking(IN  temp_veh_ID varchar(10), 
							   	 IN  temp_email varchar(30), 
							   	 IN  temp_phone bigint, 									   	   									   	     					 
							   	 IN  temp_from date,
							   	 IN  temp_to date,
								 IN  count int,
								 IN cost int)
begin
	insert into booking_details(vehicle_id,email_id, phone, from_date, to_date,position,number_of_days,cost,posting_date)
		 values (temp_veh_ID, temp_email, temp_phone, temp_from, temp_to, 'Pending',count,cost, CURRENT_TIMESTAMP());
end
$

delimiter $
create procedure accept_booking(in id int)
begin
	update booking_details set position = 'Accepted' where bookingID = id;
end 
$

delimiter $
create procedure cancel_booking(in id int)
begin
	update booking_details set position = 'Canceled' where bookingID = id;
end 
$
delimiter $
create procedure delete_booking(in id int)
begin
	delete from booking_details where bookingID = id;
end 
$

--
-- Procedures for table 'contact us'
--
delimiter $
create procedure answer_contact_us( IN cid integer,IN ans varchar(200))
begin 
update contact_us set answer=ans where id=cid;
end 
$

delimiter $
create procedure add_contactus(IN t_name varchar(20),IN t_email varchar(30),IN t_ph integer,IN text varchar(200))
begin
insert into contact_us(name,email,phone,message) values (t_name,t_email,t_ph,text);
end
$
