CREATE TABLE moify (
  id integer auto_increment
  , twitter_username varchar(255) not null
  , imgur_of_original varchar(1024) not null
  , imgur_of_moified varchar(1024) not null
  , chosen_mo varchar( 50) not null
  , mo_top integer
  , mo_left integer
);

