
create table sys_admin(
tc_no				varchar(15)    		not null,
sifre				varchar(20)		not null,
ad				varchar(15)		not null,
soyad				varchar(15)     		not null,
primary key(tc_no)
);

create table kullanici(
tc_no				varchar(15)     		not null,
sifre				varchar(20)		not null,
ad				varchar(15)		not null,
soyad				varchar(15)     		not null,
rutbe				varchar(25)     		not null,
primary key(tc_no)
);

create table proje(
proje_ismi			varchar(20)		not null,
proje_yon			varchar(15)     		not null,
pbaslangic			date				not null,
pbitis			date				not null,
tamamlanmayuz		int(11)			not null,
BAC				int(11)			not null,
primary key(proje_yon),
foreign key (proje_yon) references kullanici(tc_no)
);

create table is_paketi(
ispaket_ismi		varchar(20)		not null,
ispaket_lid		varchar(15)     		not null,
proje_yont			varchar(15)     		not null,
isbaslangic		date				not null,
isbitis			date				not null,
tamamlanmayuzis		int(11)			not null,
maliyetisp			int(11)			not null,
primary key(proje_yont,ispaket_lid),
foreign key (proje_yont) references kullanici(tc_no),
foreign key (ispaket_lid) references kullanici(tc_no)
);

create table aktivite(
aktivite_ismi		varchar(20)		not null,
aktivite_cal		varchar(15)     		not null,
ispaket_lidr		varchar(15)     		not null,
proje_yontc		varchar(15)     		not null,
akbaslangic		date				not null,
akbitis			date				not null,
tamamlanmayuzcal		int(11)			not null,
maliyet			int(11)			not null,
primary key(proje_yontc,ispaket_lidr,aktivite_cal	),
foreign key (aktivite_cal) references kullanici(tc_no),
foreign key (proje_yontc) references kullanici(tc_no),
foreign key (ispaket_lidr) references kullanici(tc_no)
);