create schema Smooth_Serve;
use Smooth_Serve;
create table company_employee ( CEID tinyint unsigned auto_increment 
primary key, Officer_ID varchar(10), Fname varchar(25), 
Lname varchar(25),  National_ID varchar(15), 
unique(National_ID),
Role enum ("College", "H.Assistants", "Administrative")) ;


create table skills (SID tinyint unsigned auto_increment 
primary key,name varchar (50));


create table colleges( CoID tinyint unsigned auto_increment
 primary key, name varchar (50));
 
create table Contractslogin ( LogID tinyint unsigned auto_increment
 primary key, email varchar (50), password nvarchar(50), Category enum("College Management",
 "Contract Management", "Manager"));
 
 create table Collegeslogin ( LogID tinyint unsigned auto_increment
 primary key, email varchar (50), password nvarchar(50), Category enum("College Management",
 "Contract Management", "Manager"));
 
 create table Managerlogin ( LogID tinyint unsigned auto_increment
 primary key, email varchar (50), password nvarchar(50), Category enum("College Management",
 "Contract Management", "Manager"));


create table  employers( EID bigint unsigned auto_increment primary key, 
National_ID varchar(15), unique(National_ID),
Fname varchar (40), Lname varchar (40), 
Telephone_Number varchar (15), Email_Address varchar(50), 
Physical_Address varchar (50), No_PeopleHousehold tinyint, 
Working_Structure enum ("Commute","Stay in"), 
E_Contact varchar(12));


create table House_Assistant( HID bigint unsigned auto_increment
primary key, National_ID varchar(50), unique (National_ID),
 DOB date , Gender enum ("M","F"), 
 Fname varchar (40), Lname varchar (40),
 working_structure enum ("Commute","Stay in"),
 Telephone_Number varchar(15), E_Contact varchar(15), 
 Rating enum ("1","2","3","4","5"), 
 Good_Conduct_clearance enum ("Cleared","Pending","Not cleared"));
 
 create table employment( EID bigint unsigned, constraint FK_Employee 
 foreign key (EID)references employers(EID) on update cascade , 
 HID bigint unsigned, constraint FK_House foreign key (HID) 
 references House_Assistant(HID) on update cascade, 
 Date_Started date not null, Date_Ended date null, 
 constraint PK_Employment primary key(EID, HID),
 Status enum ("Terminated","Continuing")
 );
 
 create table  H_Assistant_Mgmt (HID bigint unsigned, 
 constraint FK_Help foreign key (HID) references 
 House_Assistant (HID) on update cascade,
 CEID tinyint unsigned, constraint FK_CE foreign key (CEID) 
 references company_employee(CEID) on update cascade,
 constraint PK_HMgmt primary key (HID, CEID),
 Status enum ("Terminated","Continuing"));
 
create table desired_skills ( SID tinyint unsigned,
constraint FK_Pskills foreign key (SID) 
references skills(SID) on update cascade, EID bigint unsigned,
constraint FK_ESkills foreign key (EID) references employers(EID)
on update cascade,constraint PK_Dskills primary key (SID,EID));

create table possesed_skills( SID tinyint unsigned,
constraint FK_Poskills foreign key (SID) 
references skills(SID) on update cascade, HID bigint unsigned,
constraint FK_HSkills foreign key (HID) references House_Assistant(HID)
on update cascade, constraint PK_Pskills primary key (SID,HID));

create table skills_taught (SID tinyint unsigned,
constraint FK_Tskills foreign key (SID) 
references skills(SID) on update cascade, 
CoID tinyint unsigned, constraint FK_Tcolleges foreign key (CoID) 
references colleges (CoID) on update cascade,
constraint PK_STaught primary key (SID,CoID));

create table college_tracking(CoID tinyint unsigned,
constraint FK_CETracking foreign key (CoID) 
references colleges (CoID) on update cascade,  
CEID tinyint unsigned,constraint FK_CoTracking foreign key (CEID) 
references company_employee(CEID) on update cascade,
constraint PK_STaught primary key (CoID,CEID));

create table payment ( TID bigint unsigned auto_increment 
primary key, HID bigint unsigned, EID bigint unsigned, CEID tinyint unsigned,
Month enum("January", "February", "March", "April", "May", "June" ,"July",
"August","September","October","November","December"),
time_stamp datetime not null, Amount smallint,
foreign key (CEID) references company_employee(CEID) on update cascade,
foreign key (HID) references House_Assistant (HID)on update cascade,
foreign key (EID) references employers (EID)on update cascade);

create table complaints ( Complaint_id bigint unsigned auto_increment
primary key ,
HID bigint unsigned, EID bigint unsigned, CEID tinyint unsigned,
date_entered date not null,date_solved date,
status enum("Solved", "Not solved", "In Progress") 
default "In Progress", Reporting_entity enum("Employer","H.Assistant"),
foreign key (CEID) references company_employee(CEID) on update cascade,
foreign key (HID) references House_Assistant (HID)on update cascade,
foreign key (EID) references employers (EID)on update cascade);
 
 create table training ( Training_id bigint unsigned auto_increment
 primary key,
 HID bigint unsigned,SID tinyint unsigned, CoID tinyint unsigned,
 Start_date date not null, Status enum ("Completed", "In Progress"),
 foreign key (HID) references House_Assistant (HID) on update cascade,
 foreign key (SID) references skills (SID) on update cascade,
 foreign key (CoID) references colleges(CoID)on update cascade);