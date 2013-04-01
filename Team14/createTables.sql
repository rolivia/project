drop table if exists Applicant cascade;
create table Applicant(
  id int(5) auto_increment,
  pass varchar(10) NOT NULL,
  status varchar(15) NOT NULL,
  Email varchar(40) NOT NULL,
  PRIMARY KEY (id)
);

drop table if exists PInfo cascade;
create table PInfo(
  id int(5),
  fName varchar(30) NOT NULL,
  lName varchar(30) NOT NULL,
  SSN int NOT NULL,
  Address varchar(50) NOT NULL,
  City varchar(30) NOT NULL,
  A_State varchar(30) NOT NULL,
  Zip int NOT NULL,
  Country varchar(30) NOT NULL,
  Gender varchar(10) NOT NULL,
  Race varchar(20),
  Phone int,
  PRIMARY KEY(id),
  FOREIGN KEY(id) REFERENCES Applicant(id)
);

drop table if exists AInfo cascade;
create table AInfo(
  id int(5),
  DegreeSought varchar(15) NOT NULL,
  Work  varchar(100) NOT NULL,
  AdmitDate varchar(15) NOT NULL,
  AppDate date NOT NULL,
  AreaInterest varchar(30) NOT NULL,
  Transcript varchar(15) NOT NULL,
  PRIMARY KEY(id),
  FOREIGN KEY(id) REFERENCES Applicant(id)
);

drop table if exists PriorDegrees cascade;
create table PriorDegrees(
  id int(5),
  DegType varchar(15) NOT NULL,
  D_Year int NOT NULL,
  GPA numeric(1,2) NOT NULL,
  School varchar(50) NOT NULL,
  PRIMARY KEY(id,DegType),
  FOREIGN KEY(id) REFERENCES Applicant(id)
);

drop table if exists GRE cascade;
create table GRE(
  id int(5),
  Verbal int,
  Analytical int,
  Quantitative int,
  Total int,
  PRIMARY KEY(id),
  FOREIGN KEY(id) REFERENCES Applicant(id)
);

drop table if exists GRESubj cascade;
create table GRESubj(
  id int(5),
  Subject varchar(30),
  Score int,
  PRIMARY KEY(id, Subject),
  FOREIGN KEY(id) REFERENCES Applicant(id)
);


drop table if exists Recommender cascade;
create table Recommender(
  id int(5),
  RName varchar(30),
  Email varchar(40) NOT NULL,
  Title varchar(20) NOT NULL,
  Affiliation varchar(20) NOT NULL,
  Letter text(10000),
  PRIMARY KEY(id,RName),
  FOREIGN KEY(id) REFERENCES Applicant(id)
);

drop table if exists Administrator cascade;
create table Administrator(
  id int(5),
  AdName varchar(30) NOT NULL,
  pass varchar(10) NOT NULL,
  Ad_position varchar(20) NOT NULL,
  PRIMARY KEY(id)
);

drop table if exists Reviews cascade;
create table Reviews(
  AppId int(5),
  RevId int(5),
  Score int(4) NOT NULL,
  notes varchar(100),
  RecAdvisors varchar(50),
  PRIMARY KEY(AppId,RevId),
  FOREIGN KEY(AppId) REFERENCES Applicant(id),
  FOREIGN KEY(RevId) REFERENCES Administrator(id)
);
