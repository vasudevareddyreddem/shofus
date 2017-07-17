/*
SQLyog Community v11.52 (64 bit)
MySQL - 10.1.16-MariaDB 
*********************************************************************
*/
/*!40101 SET NAMES utf8 */;

create table `orders` (
	`order_id` int (11),
	`item_id` int (11),
	`seller_id` int (11),
	`user_id` int (11),
	`product_name` varchar (750),
	`delivery_date` date ,
	`delivery_time` time ,
	`customer_name` varchar (300),
	`customer_email` varchar (300),
	`customer_phone` varchar (300),
	`customer_address` text ,
	`payment_mode` varchar (750),
	`order_status` int (11),
	`created_at` date ,
	`updated_at` date 
); 
insert into `orders` (`order_id`, `item_id`, `seller_id`, `user_id`, `product_name`, `delivery_date`, `delivery_time`, `customer_name`, `customer_email`, `customer_phone`, `customer_address`, `payment_mode`, `order_status`, `created_at`, `updated_at`) values('3','5','3','1','food','2017-03-01','10:48:55','test','abcd@gmail.com','8896325147','D.No: 403,\r\nFlat No:201,\r\n Ameerpet ,\r\nHyderabad.','cash on delivery','1','2017-03-13','2017-03-22');
insert into `orders` (`order_id`, `item_id`, `seller_id`, `user_id`, `product_name`, `delivery_date`, `delivery_time`, `customer_name`, `customer_email`, `customer_phone`, `customer_address`, `payment_mode`, `order_status`, `created_at`, `updated_at`) values('4','0','8','0','phone','2017-03-02','05:37:56','dddsd','gfdfd@gmail.com','7789632541','fhg hgh hghjgg hghjghj hgh','','1','2017-04-12','2017-03-02');
insert into `orders` (`order_id`, `item_id`, `seller_id`, `user_id`, `product_name`, `delivery_date`, `delivery_time`, `customer_name`, `customer_email`, `customer_phone`, `customer_address`, `payment_mode`, `order_status`, `created_at`, `updated_at`) values('5','0','8','0','moile','2017-03-01','08:40:55','bcgc','sad@gmail.com','89963255','dfvdfg','','3','2017-03-01','2017-03-30');
insert into `orders` (`order_id`, `item_id`, `seller_id`, `user_id`, `product_name`, `delivery_date`, `delivery_time`, `customer_name`, `customer_email`, `customer_phone`, `customer_address`, `payment_mode`, `order_status`, `created_at`, `updated_at`) values('6','0','8','0','grocery','2017-03-01','07:40:58','gggjgj','cfgfcg@gmail.com','8896325417','jhjjh hgjhguy','','1','2017-05-01','2017-03-24');
insert into `orders` (`order_id`, `item_id`, `seller_id`, `user_id`, `product_name`, `delivery_date`, `delivery_time`, `customer_name`, `customer_email`, `customer_phone`, `customer_address`, `payment_mode`, `order_status`, `created_at`, `updated_at`) values('7','0','8','0','hghgfg','2017-03-01','04:33:49','yuiuiu','j','thtr','htrhtr','','2','2017-05-03','0000-00-00');
insert into `orders` (`order_id`, `item_id`, `seller_id`, `user_id`, `product_name`, `delivery_date`, `delivery_time`, `customer_name`, `customer_email`, `customer_phone`, `customer_address`, `payment_mode`, `order_status`, `created_at`, `updated_at`) values('8','0','8','0','xxgfxgx','2017-03-10','04:30:56','ddcdf','dfsfs@zf.com','7789654123','xfgxf xfgfg','','1','2017-05-03','0000-00-00');
insert into `orders` (`order_id`, `item_id`, `seller_id`, `user_id`, `product_name`, `delivery_date`, `delivery_time`, `customer_name`, `customer_email`, `customer_phone`, `customer_address`, `payment_mode`, `order_status`, `created_at`, `updated_at`) values('9','15','4','1','grocery items','2017-04-29','00:00:10','ravali','ravali@kateit.in','88523697412','kphb','cash on delivery','0','2017-04-29','2017-04-29');
insert into `orders` (`order_id`, `item_id`, `seller_id`, `user_id`, `product_name`, `delivery_date`, `delivery_time`, `customer_name`, `customer_email`, `customer_phone`, `customer_address`, `payment_mode`, `order_status`, `created_at`, `updated_at`) values('10','25','8','1','chicken biryani','2017-04-29','00:00:20','dfs','afsd@kateit.in','7789654123','miyapur','cash on delivery','0','2017-05-06','0000-00-00');
