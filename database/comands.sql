SET GLOBAL event_scheduler = ON;

select @@event_scheduler;

use convento_db;
create event exclusao 
	on schedule 
		every 24 HOUR 
	comment 'Testando mensagem de evento'
    do 
		update reservas set status = '3' where data_reservas < (current_date - interval 1 day);

drop event exclusao;
show events from convento_db;
set @@global.time_zone = '+3:00';
select now();

SELECT * FROM reservas;

set SQL_SAFE_UPDATES = 0;

alter table users add id int auto_increment primary key;

alter table users change id id int auto_increment first;

describe users;

update users set data = '2018-05-03' where nome = '29'; 

insert into users values ('31', 'Mariana', '2019-04-15');