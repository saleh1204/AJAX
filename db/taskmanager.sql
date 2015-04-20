use taskmanager;
drop table if exists task;

create table task (
 id int NOT NULL AUTO_INCREMENT primary key,
 description varchar(30),
 type varchar(50),
 duedate varchar(10)
);

insert into task (description, type, duedate) values ('Buy milk', 'Location: Supermarket', '11/23/2014');
insert into task (description, type, duedate) values ('Grade Homework', 'NextAction', '');
insert into task (description, type, duedate) values ('Create report', 'WaitingFor: Bob', '');
insert into task (description, type, duedate) values ('Visit Paris', 'Someday/Maybe', '');
insert into task (description, type, duedate) values ('Discuss project', 'TalkTo: Susan', '');
insert into task (description, type, duedate) values ('Buy Mazarati', 'Future', '');
