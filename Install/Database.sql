create table logs
(
    key_log bigint unsigned auto_increment,
    ts timestamp not null,
    tags varchar(1000) not null,
    data json not null,
    constraint logs_pk
        primary key (key_log)
);

create table config
(
    key_config varchar(100) not null,
    data json not null,
    constraint config_pk
        primary key (key_config)
);

create table maps
(
	key_map varchar(1000) not null,
	program text null,
	data json not null,
	constraint maps_pk
		primary key (key_map)
);

create table puzzles
(
    key_puzzle bigint unsigned not null auto_increment,
    id varchar(100) not null,
    title varchar(250) not null,
    status tinyint unsigned default 1 not null,
    type tinyint unsigned default 1 not null,
    program json not null,
    theory text not null,
    tags varchar(100) default '-' not null,
    dt datetime not null,
    constraint puzzles_pk
        primary key (key_puzzle)
);

create unique index puzzles_id_uindex
    on puzzles (id);

create table levels
(
    key_level tinyint unsigned auto_increment,
    title varchar(250) not null,
    status tinyint unsigned not null,
    program text null,
    goal varchar(250) not null default '-',
    constraint levels_pk
        primary key (key_level)
);

insert into levels VALUES (1, 'Padawan', 1, '-', '-');